<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpeakedLanguage extends Model
{
    protected $fillable = [
    'Id_User', 'id_lang', 'id_niveau'
    ];

    public $timestamps = false;

    public function from()
    {
        return $this->belongsTo(User::class, 'from_id');
    }
}
