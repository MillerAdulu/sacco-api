<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class BusinessNature extends Model
  {
    protected $primaryKey = 'business_nature_id';

    protected $fillable = ['nature_of_business'];
  }
