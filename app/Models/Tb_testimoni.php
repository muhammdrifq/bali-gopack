<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_testimoni extends Model
{
    use HasFactory;

    public $fillable = ['name', 'instansi', 'testimoni', 'gambar'];

    public function gambar()
    {
        if (
            $this->gambar &&
            file_exists(public_path('images/testimoni/gambar/' . $this->gambar))
        ) {
            return asset('images/testimoni/gambar/' . $this->gambar);
        } else {
            return asset('images/no_image.png');
        }
    }

    public function deletegambar()
    {
        if (
            $this->gambar &&
            file_exists(public_path('images/testimoni/gambar/' . $this->gambar))
        ) {
            return unlink(
                public_path('images/testimoni/gambar/' . $this->gambar)
            );
        }
    }
}