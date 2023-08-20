<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengantin extends Model
{
    use HasFactory;
    protected $table = "pengantins";
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {
                if ($model->getKey() == null) {
                    $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
                }
            }
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'mempelai_pria',
        'mempelai_wanita',
        'nama_putra',
        'ibu_mempelai_pria',
        'bapak_mempelai_pria',
        'ibu_mempelai_wanita',
        'bapak_mempelai_wanita',
        'nama_ibu',
        'nama_bapak',
        'tanggal_acara',
        'alamat',
        'acara_id',
    ];

    public function acara()
    {
        return $this->belongsTo(Acara::class);
    }

    public function tugasPanitias()
    {
        return $this->hasMany(TugasPanitia::class);
    }

    public function sumbangans()
    {
        return $this->hasMany(Sumbangan::class);
    }
}
