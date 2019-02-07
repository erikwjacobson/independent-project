<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class SentenceExport implements FromCollection, WithMapping, WithHeadings, WithStrictNullComparison
{
    use Exportable;

    public $sheet = [];
    public $sentences;

    public function __construct($sentences)
    {
        $this->sentences = $sentences;
    }

    public function map($sentence): array
    {
        $this->sheet = [
            $sentence->text,
            $sentence->value,
            $sentence->style->name,
            $sentence->style->id,
            $sentence->emotion->name,
            $sentence->averageScore,
        ];

        return $this->sheet;
    }

    public function headings(): array
    {
        $a = ['Sentence', 'Sent_Value', 'Style', 'Style_Dummy_Var', 'Emotion', 'Avg_Score'];

        return $a;
    }

    public function collection()
    {
        return $this->sentences;
    }
}
