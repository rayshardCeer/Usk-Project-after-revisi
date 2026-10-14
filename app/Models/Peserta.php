<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'pesertas';
    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'skema_id',
        'nama',
        'nik',
        'no_hp',
        'instansi',
        'status',
        'email',
        'alamat',
    ];

    public function skema(){
        return $this->belongsTo(Skema::class, 'skema_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
