<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LetExport extends Model
{
    public $fillable = [
      'id_leta','polazna_dest_icao', 'dolazna_dest_icao',
      'vreme_poletanja', 'vreme_sletanja', 'kapetan', 'kopilot',
      'stjuardesa', 'registracija_aviona'
    ];

    
}
