<?php

use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model {
    protected $table = "checkin";
    public $timestamps = false;

    protected $fillable = ['id', 'ticketID', 'codiceFiscale', 'flightID'];

}

?>