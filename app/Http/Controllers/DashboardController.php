<?php
  
  namespace App\Http\Controllers;
  
  use Illuminate\Http\Request;
  use App\Member;
  use App\MemberDeposit;
  use App\MemberLoan;
  
  class DashboardController extends Controller
  {
    public function members() {
      return Member::count();
    }
    
    public function contributions() {
      return MemberDeposit::sum('contribution_amount');
    }
    
    public function memberLoans() {
      return MemberLoan::sum('loan_amount');
    }
    
  }
