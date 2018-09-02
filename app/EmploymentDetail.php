<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class EmploymentDetail extends Model
  {
    protected $primaryKey = 'employment_details_id';
    
    public function employers () {
      
      return $this->belongsTo(
        Employer::class,
        'employer_id',
        'employer_id'
      );
      
    }
    
    public function member () {
      
      return $this->belongsTo(
        Member::class,
        'member_id',
        'member_id'
      );
      
    }
    
    public function job_title () {
      
      return $this->belongsTo (
        JobTitle::class,
        'job_title_id',
        'job_title_id'
      );
      
    }
  }
