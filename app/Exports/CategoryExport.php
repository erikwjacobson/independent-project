<?php

namespace App\Exports;

use App\Emotion;
use App\Record;
use App\Style;
use App\User;
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

class CategoryExport implements FromCollection, WithMapping, WithHeadings, WithStrictNullComparison
{
    use Exportable;

    public $sheet = [];
    public $styles;
    public $emotions;
    public $users;

    public function __construct()
    {
        $this->styles = Style::all();
        $this->emotions = Emotion::all();
        $this->users = User::where('admin', false)->get();
    }

    public function map($user): array
    {
        $styles = $this->styles;
        $emotions = $this->emotions;

        $this->sheet = [
            $user->username,
            $user->complete,
        ];
        foreach($styles as $style) {
            foreach($emotions as $emotion) {
                $value = $user->computeScore($style, $emotion);
                array_push($this->sheet, $value);
            }
        }
        return $this->sheet;
    }

    public function headings(): array
    {
        return [
            'User',
            'Completed',
            'Abbr_Pos',
            'Abbr_Neu',
            'Abbr_Neg',
            'Gramm_Pos',
            'Gramm_Neu',
            'Gramm_Neg',
            'Emoji_Pos',
            'Emoji_Neu',
            'Emoji_Neg',
        ];
    }

    public function collection()
    {
        return $this->users;
    }
}
