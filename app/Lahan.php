<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lahan extends Model
{
    use SoftDeletes;

    public $table = 'lahans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama_lahan',
        'luas_lahan',
        'created_at',
        'updated_at',
        'deleted_at',
        'jumlah_bibit',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'lahan_id', 'id');
    }

    public function panens()
    {
        return $this->hasMany(Panen::class, 'lahan_id', 'id');
    }
}
