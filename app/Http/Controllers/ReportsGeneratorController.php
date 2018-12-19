<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\AllMembersExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportsGeneratorController extends Controller
{
    public function allMembers() {
        return new AllMembersExport();
    }
}
