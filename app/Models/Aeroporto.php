<?php

use Illuminate\Database\Eloquent\Model;

class Aeroporto extends Model {
    protected $table = "aeroporto";
    protected $primaryKey = "airportID";
    protected $autoIncrement = false;
    protected $keyType = "string";

    public $timestamps = false;

}

?>