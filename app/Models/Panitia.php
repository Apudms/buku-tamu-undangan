<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Panitia extends Model
{
    use HasFactory;
    protected $table = "panitias";
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
        'nama_panitia',
        'jabatan',
        'tugas_panitia_id',
    ];

    public function tugasPanitia()
    {
        return $this->belongsTo(TugasPanitia::class);
    }
}
