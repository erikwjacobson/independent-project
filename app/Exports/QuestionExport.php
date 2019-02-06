<?php

namespace App\Exports;

use App\Demographic;
use App\Emotion;
use App\Record;
use App\Sentence;
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
    public $demographics;
    public $sentences;
    public $records;
    public $users;

    public function __construct()
    {
        $this->sentences = Sentence::with('emotion', 'style')->get();
        $this->records = Record::with('sentence')->get();
        $this->users = User::where('admin', false)->with('demographics')->get();
        $this->demographics = Demographic::all();
    }

    public function map($user): array
    {
        $sentences = $this->sentences;
        $records =  $this->records;

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
        foreach($user->demographics as $demographic) {
            array_push($this->sheet, $demographic->value);
        }

        return $this->sheet;
    }

    public function headings(): array
    {
        $sentences = $this->sentences;

        $a = ['User'];
        foreach($sentences as $index => $sentence) {
            array_push($a, 'Q' . ($index + 1) . ' - ' . $sentence->text);
        }

        foreach($this->demographics as $demographic) {
            array_push($a, $demographic->name);
        }

        return $a;
    }

    public function collection()
    {
        return $this->users;
    }
}
