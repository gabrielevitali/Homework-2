<?php

use Illuminate\Database\Eloquent\Model;

class Utente extends Model {
    protected $table = "utente";
    protected $primaryKey = "username";
    protected $autoIncrement = false;
    protected $keyType = "string";

    public $timestamps = false;

    protected $fillable = ['username', 'pwd', 'email'];

    public function subscription(){
        return $this->hasOne('AbbonamentoClub', 'username');
    } 

    public function bookings(){
        return $this->hasMany('AcquistoVolo', 'username');
    } 
}

?>