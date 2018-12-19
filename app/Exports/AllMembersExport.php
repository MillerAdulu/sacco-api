<?php

namespace App\Exports;

use App\Member;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\Support\Responsable;

class AllMembersExport implements FromView, Responsable, ShouldAutoSize
{
    use Exportable;

    private $fileName = 'allmembers.xlsx';

    public function view(): View {
        return view('exports.members.members', [
            'members' => Member::all()
        ]);
    }
}
