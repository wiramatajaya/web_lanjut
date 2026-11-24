<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomingLatter extends Model
{
      protected $table = 'incoming_letters';
        protected $fillable = [
        'nomor_surat',
        'tanggal',
        'pengirim',
        'perihal',
        'keterangan',
    ];
}
