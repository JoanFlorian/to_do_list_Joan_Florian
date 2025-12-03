<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    protected $fillable = [
        'name',
        'description',
        'id_user',
        'id_state'
    ];
        public function user()
{
    return $this->belongsTo(User::class,'id_user','id');
}
public function role()
{
    return $this->belongsTo(states::class,'id');
}
}
