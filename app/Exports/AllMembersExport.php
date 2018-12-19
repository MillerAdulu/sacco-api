<?php

namespace App\Exports;

use App\Member;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\Support\Responsable;

class AllMembersExport implements FromCollection, Responsable, ShouldAutoSize
{
    use Exportable;

    private $fileName = 'allmembers.xlsx';

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Member::all();
    }
}
