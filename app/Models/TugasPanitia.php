<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TugasPanitia extends Model
{
    use HasFactory;
    protected $table = "tugas_panitias";
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
        'nama_tugas',
        'jabatan',
        'pengantin_id',
    ];

    public function panitias()
    {
        return $this->hasMany(Panitia::class);
    }

    public function pengantin()
    {
        return $this->belongsTo(Pengantin::class);
    }
}
