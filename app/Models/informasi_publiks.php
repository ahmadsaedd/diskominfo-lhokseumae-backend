<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class informasi_publiks extends Model
{
    protected $fillable = [
        'informasi',
        'judul',
        'dibuat',
        'tanggal_dokumen',
        'ukuran',
        'url'
    ];
}
