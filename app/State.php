<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //

    protected $fillable = ['name', 'capital', 'population', 'longitude', 'latitude', 'admission', 'cases', 'recovered', 'death', 'first_occur', 'contact_name', 'contact_phone', 'contact_email'];

    protected $casts = [
        'updated_at' => 'datetime'
    ];
}
