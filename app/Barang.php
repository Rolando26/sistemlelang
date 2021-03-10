<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barang";

    protected $guarded = [];

    public function lelang()
    {
        return $this->hasOne(Lelang::class);
    }
}
