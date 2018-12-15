<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class EmploymentDetail extends Model
  {
    protected $primaryKey = 'employment_details_id';

    protected $fillable = ['employer_id', 'member_id', 'job_title_id', 'work_station', 'commencement_date', 'salary', 'payroll_number', 'termination_date'];
    
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
