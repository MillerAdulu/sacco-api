<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class PostOffice extends Model
  {
    protected $primaryKey = 'post_office_id';

    protected $fillable = ['post_office_code', 'post_office_code'];
  }
