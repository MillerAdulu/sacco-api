<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class Nominee extends Model
  {
    protected $primaryKey = 'nominee_id';
    
    protected $fillable = [
      'identification_number', 'first_name', 'last_name',
      'other_name', 'member_id', 'relationship_id', 'phone_number',
      'email'
    ];
    
    public function relationship() {
      return $this->belongsTo(
        Relationship::class,
        'relationship_id',
        'relationship_id'
      );
    }
  }
