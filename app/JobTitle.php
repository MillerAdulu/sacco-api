<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class JobTitle extends Model
  {
    protected $primaryKey = 'job_title_id';

    protected $fillable = ['job_title'];
    
    public function employment_details () {
      
      return $this->belongsToMany (
        EmploymentDetail::class,
        'employment_detail_job_title',
        'job_title_id',
        'job_title_id'
      );
      
    }
    
  }
