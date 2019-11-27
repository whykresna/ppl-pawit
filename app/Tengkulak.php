<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tengkulak extends Model
{
    use SoftDeletes;

    public $table = 'tengkulaks';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'tanggal_masuk',
    ];

    protected $fillable = [
        'updated_at',
        'created_at',
        'deleted_at',
        'tanggal_masuk',
        'nama_tengkulak',
        'email_tengkulak',
        'alamat_tengkulak',
        'nomor_telepon_tengkulak',
    ];

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class, 'tengkulak_id', 'id');
    }

    public function getTanggalMasukAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setTanggalMasukAttribute($value)
    {
        $this->attributes['tanggal_masuk'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
