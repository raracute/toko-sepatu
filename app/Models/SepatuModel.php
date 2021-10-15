<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SepatuModel extends Model
{
    use HasFactory;

    protected $table = 'tb_sepatu';

    protected $primaryKey = 'id_sepatu';
}
