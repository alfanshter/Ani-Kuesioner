<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuesioner extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jawaban()
    {
        return $this->hasOne(Jawaban::class, 'kuesioner_id', 'id');
    }

    public function semua_jawaban()
    {
        return $this->hasMany(Jawaban::class, 'kuesioner_id', 'id');
    }
}
