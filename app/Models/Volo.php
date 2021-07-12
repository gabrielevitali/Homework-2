<?php

use Illuminate\Database\Eloquent\Model;

class Volo extends Model {
    protected $table = "voli";
    protected $primaryKey = "flightID";
    protected $autoIncrement = false;

    public $timestamps = false;
    
}

?>