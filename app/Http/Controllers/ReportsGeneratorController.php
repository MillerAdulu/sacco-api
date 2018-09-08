<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\MembersExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportsGeneratorController extends Controller
{
    public function members() {
        return (new MembersExport)->download('members.xlsx');
    }
}
