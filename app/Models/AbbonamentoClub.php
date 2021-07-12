<?php

use Illuminate\Database\Eloquent\Model;

class AbbonamentoClub extends Model {
    protected $table = "abbonamentoclub";
    protected $primaryKey = "cardID";

    public $timestamps = false;

    protected $fillable = ['cardID', 'username', 'tipoAbbonamento', 'dataAbbonamento', 'scadenzaAbbonamento'];

    public function user(){
        return $this->belongsTo('Utente');
    } 

}

?>