<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Panen extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'panens';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'tanggal_panen',
    ];

    protected $fillable = [
        'pot',
        'bruto',
        'tarra',
        'gross',
        'netto',
        'lahan_id',
        'keterangan',
        'created_at',
        'updated_at',
        'deleted_at',
        'jumlah_buah',
        'tanggal_panen',
    ];

    public function getTanggalPanenAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalPanenAttribute($value)
    {
        $this->attributes['tanggal_panen'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function lahan()
    {
        return $this->belongsTo(Lahan::class, 'lahan_id');
    }
}
