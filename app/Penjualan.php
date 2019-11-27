<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penjualan extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'penjualans';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'tanggal_pengiriman',
    ];

    protected $fillable = [
        'updated_at',
        'created_at',
        'deleted_at',
        'tengkulak_id',
        'harga_penjualan',
        'pajak_penjualan',
        'jumlah_permintaan',
        'tanggal_pengiriman',
    ];

    public function tengkulak()
    {
        return $this->belongsTo(Tengkulak::class, 'tengkulak_id');
    }

    public function getTanggalPengirimanAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalPengirimanAttribute($value)
    {
        $this->attributes['tanggal_pengiriman'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
