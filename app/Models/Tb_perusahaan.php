<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_perusahaan extends Model
{
    use HasFactory;

    public $protected = ['id'];

    public function gambar()
    {
        if (
            $this->gambar &&
            file_exists(
                public_path('images/perusahaan/gambar/' . $this->gambar)
            )
        ) {
            return asset('images/perusahaan/gambar/' . $this->gambar);
        } else {
            return asset('images/no_image.png');
        }
    }

    public function deletegambar()
    {
        if (
            $this->gambar &&
            file_exists(
                public_path('images/perusahaan/gambar/' . $this->gambar)
            )
        ) {
            return unlink(
                public_path('images/perusahaan/gambar/' . $this->gambar)
            );
        }
    }
}