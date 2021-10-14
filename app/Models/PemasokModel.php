<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasokModel extends Model
{
    use HasFactory;

    protected $table = 'tb_pemasok';

    protected $fillable = [
        'nama',
        'no_telp',
        'alamat',
        'desc',
        'kd_sepatu',
    ];

    public function sepatu()
    {
        return $this->hasOne(SepatuModel::class, 'id_sepatu', 'kd_sepatu');
    }
}
