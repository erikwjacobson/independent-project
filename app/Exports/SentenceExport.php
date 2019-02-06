<?php

namespace App\Exports;

use App\Record;
use App\Sentence;
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

class SentenceExport implements FromCollection, WithMapping, WithHeadings, WithStrictNullComparison
{
    use Exportable;

    public $sheet = [];
    public $sentences;

    public function __construct()
    {
        $this->sentences = Sentence::with('emotion', 'style', 'records')->get();
    }

    public function map($sentence): array
    {
        $this->sheet = [
            $sentence->text,
            $sentence->value,
            $sentence->style->name,
            $sentence->emotion->name,
            $sentence->averageScore,
        ];

        return $this->sheet;
    }

    public function headings(): array
    {
        $a = ['Sentence', 'Sent_Value', 'Style', 'Emotion', 'Avg_Score'];

        return $a;
    }

    public function collection()
    {
        return $this->sentences;
    }
}
