<?php

namespace App\Exports;

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

class UserExport implements FromCollection, WithMapping, WithHeadings, WithStrictNullComparison
{
    use Exportable;

    public $sheet = [];

    public function map($user): array
    {
        $this->sheet = [
            $user->id,
            $user->username,
            $user->created_at,
            $user->computer,
            $user->researcher_initials,
            $user->overtime,
            $user->credit_granted,
            $user->comments,
        ];

        return $this->sheet;
    }

    public function headings(): array
    {
        $a = ['ID', 'Username', 'Date', 'Computer', 'Researcher', 'Overtime', 'Credit_Granted', 'Comments'];

        return $a;
    }

    public function collection()
    {
        return User::where('admin', false)->get();
    }
}
