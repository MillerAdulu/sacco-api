<?php
  
  namespace App;
  
  use Laravel\Passport\HasApiTokens;
  use Illuminate\Notifications\Notifiable;
  use Illuminate\Foundation\Auth\User as Authenticatable;
  
  class User extends Authenticatable
  {
    use HasApiTokens,Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name', 'email', 'phone_number', 'password', 'access_level', 'member_id',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'remember_token', 'password'
    ];
  }
