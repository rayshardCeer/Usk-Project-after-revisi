<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'pesertas';
    protected $guarded = ['id'];

    protected $fillable = [
        'skema_id',
        'nama',
        'instansi',
        'kelas',
        'email',
        'alamat',
    ];

    public function skema(){
        return $this->belongsTo(Skema::class, 'skema_id');
    }
}
