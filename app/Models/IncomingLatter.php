<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
{
return $this->belongsTo(Category::class);
}
}
