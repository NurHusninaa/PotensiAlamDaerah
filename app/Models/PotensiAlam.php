<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PotensiAlam extends Model
{
    protected $guarded = ['id'];
    protected $table = 'potensi_alam';

    public function daerah() {
        return $this->belongsTo(Daerah::class, 'id_daerah');
    }

    public function kategoriPotensi() {
        return $this->belongsTo(KategoriPotensi::class, 'id_kategori');
    }
}
