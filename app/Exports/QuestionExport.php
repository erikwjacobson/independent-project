<?php

namespace App\Exports;

use App\Emotion;
use App\Record;
use App\Style;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class QuestionExport implements FromCollection, WithMapping, WithHeadings, WithStrictNullComparison
{
    use Exportable;

    public $sheet = [];

    public function map($user): array
    {
        $sentences = Cache::get('sentences');
        $records = Cache::get('records');

        $this->sheet = [
            $user->username,
        ];

        foreach($sentences as $sentence) {
            $record = $records->where('user_id', $user->id)->where('sentence_id', $sentence->id)->first();

            if ($record) {
                if ($record->answer == 0) {
                    $value = 9; // Signals that the question timed out
                } else {
                    // Gives value of 1 if correct and 0 if incorrect
                    $value = $record->answer == $sentence->emotion_id ? 1 : 0;
                }
            }
            else {
                $value = "NA"; // Question not yet answered
            }
            array_push($this->sheet, $value);
        }
        return $this->sheet;
    }

    public function headings(): array
    {
        $sentences = Cache::get('sentences');

        $a = ['User'];
        foreach($sentences as $sentence) {
            array_push($a, 'Q' . $sentence->id);
        }

        return $a;
    }

    public function collection()
    {
        return User::all();
    }
}
