<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Working_hour extends Model
{
    use HasFactory;

    protected $fillable = [
        'currentDate',
        'user_id',
        'event'

    ];

    public function user(){
        return $this->belongsTo(User::class);//um ou mais expedientes vai pertencer a um único usuário - N:1

    }
    public function record(){
        return $this->belongsTo(Record::class);//Um registro pertence a vários usuários 

    }
}
