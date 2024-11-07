<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surats';

    protected $fillable = [
        'no_register',
        'tanggal_diterima',
        'asal_surat',
        'nomor_surat',
        'perihal',
        'ditujukan',
        'tanggal_diteruskan',
        'keterangan',
        'file_path',
    ];
}
