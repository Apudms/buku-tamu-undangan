<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TamuUndangan extends Model
{
    use HasFactory;
    protected $table = "tamu_undangans";
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
        'nama_tamu',
        'alamat',
        'pengantin_id',
    ];

    public function sumbangans()
    {
        return $this->hasMany(Sumbangan::class);
    }

    public function pengantin()
    {
        return $this->belongsTo(Pengantin::class);
    }
}
