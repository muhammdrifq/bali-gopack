<?php

namespace App\Models\app;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_personalia extends Model
{
    use HasFactory;

    protected $fillable = [
        'kuota',
        'bulan',
        'harga'
    ];

    public $connection = 'mysql2';
}
