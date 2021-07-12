<?php

use Illuminate\Database\Eloquent\Model;

class Passeggero extends Model {
    protected $table = "passeggero";
    protected $primaryKey = "codiceFiscale";
    protected $autoIncrement = false;
    protected $keyType = "string";

    public $timestamps = false;

    protected $fillable = ['codiceFiscale',
                           'nome',
                           'cognome',
                           'nazione',
                           'dataNascita',
                           'via',
                           'numero', 
                           'cap',
                           'documento',
                           'numeroTelefono'
                        ];

}

?>