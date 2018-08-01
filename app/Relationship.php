<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $primaryKey = 'relationship_id';

    protected $fillable = [
        'relationship_name'
    ];

    public function nominees() {
        return $this->hasMany(
            Nominee::class,
            'relationship_id',
            'relationship_id'
        );
    }
}
