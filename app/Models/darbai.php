<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class darbai extends Model
{
    protected $table='darbai';
    protected $fillable = [
        "tel",
        "adresas",
        "email",
        "komentaras",
        "darbKoment",
        "isvykimo_data",
        "atvykimo_data",
        "baigimo_data",
        "darbuotojo_id",
    ];
    use HasFactory;
}
