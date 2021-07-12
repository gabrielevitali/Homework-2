<?php

use Illuminate\Database\Eloquent\Model;

class AcquistoVolo extends Model {
    protected $table = "acquistovolo";
    public $timestamps = false;

    protected $fillable = ['id', 'username', 'flightID'];

    public function user(){
        return $this->belongsTo('Utente');
    } 
    
}

?>