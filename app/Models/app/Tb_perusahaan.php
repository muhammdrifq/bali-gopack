<?php
namespace App\Models\app;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_perusahaan extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
       'alamat',
       'kode_pos',
       'no_telepon',
       'bidang_usaha' 
    ];

    public $connection = 'mysql2';
}
