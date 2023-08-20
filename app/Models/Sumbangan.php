<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sumbangan extends Model
{
    use HasFactory;
    protected $table = "sumbangans";
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
        'jenis_sumbangan',
        'nama_barang',
        'nominal',
        'jumlah',
        'tamu_undangan_id',
    ];

    public function tamuUndangan()
    {
        return $this->belongsTo(TamuUndangan::class);
    }
}
