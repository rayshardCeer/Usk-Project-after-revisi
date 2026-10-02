<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    protected $table = 'skemas';
    protected $guarded = ['id'];

    protected $fillable = [
        'kode_skema',
        'nama_skema',
        'deskripsi_skema',
    ];

    protected static function booted(){
        static::creating(function ($skema){
            $latest = self::latest('id')->first();
            $nextId = $latest ? $latest->id + 1 : 1;
            $skema->kode_skema = 'SKM' . str_pad($nextId,3, '0', STR_PAD_LEFT);
        });
    }

    public function pesertas(){
        return $this->hasMany(Peserta::class, 'skema_id');
    }
}
