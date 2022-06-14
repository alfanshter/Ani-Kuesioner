<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pertanyaan()
    {
        return $this->belongsTo(Kuesioner::class, 'kuesioner_id', 'id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id_pelanggan');
    }
}
