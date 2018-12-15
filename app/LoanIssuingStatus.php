<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class LoanIssuingStatus extends Model
  {
    protected $primaryKey = 'loan_issuing_status_id';

    protected $fillable = ['loan_issuing_status'];
  }
