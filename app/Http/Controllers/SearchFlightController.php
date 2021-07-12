<?php

use Illuminate\Routing\Controller;

class SearchFlightController extends Controller{

    public function index(){
        return view('infoVoli');
    }

    # Ricerca volo in base al flightID
    public function searchByID($query){
        //$flight = Volo::where('flightID', request('flightID'))->get(); //ci può essere al più un'occorrenza
        //$flight = Volo::find(request('flightID')); //ci può essere al più un'occorrenza
        //$flight = Volo::find($request['flightID']); //ci può essere al più un'occorrenza
        $flight = Volo::find($query); //ci può essere al più un'occorrenza

        if(isset($flight)){
            $partenzaIATA = Aeroporto::find($flight -> aeroportoPartenza); //recupero istanza della tabella aeroporto in base al codice IATA
            $arrivoIATA = Aeroporto::find($flight -> aeroportoArrivo);
            if(isset($partenzaIATA) && isset($arrivoIATA)){
                $aeroportoPartenza = $partenzaIATA -> città . ' ' . $partenzaIATA -> denominazione;
                $aeroportoArrivo = $arrivoIATA -> città . ' ' . $arrivoIATA -> denominazione;
            }
            else{
                $aeroportoPartenza = $flight -> aeroportoPartenza;
                $aeroportoArrivo = $flight -> aeroportoArrivo;
            }
            
            return ['exists' => true,
                    'flightID' => $flight -> flightID,
                    'aeroportoPartenza' => $aeroportoPartenza, //non uso $flight -> aeroportoPartenza
                    'aeroportoArrivo' => $aeroportoArrivo, //non uso $flight -> aeroportoArrivo
                    'dataPartenza' => $flight -> dataPartenza,
                    'oraPartenza' => $flight -> oraPartenza,
                    'dataArrivo' => $flight -> dataArrivo,
                    'oraArrivo' => $flight -> oraArrivo,
                    'stato' => $flight -> stato,
                   ];
        }
        else {
            return ['exists' => false];
        }
    }   

    # Ricerca volo in base ad aeroporto di partenza, aeroporto di arrivo e data
    public function searchByAirportsDate($aeroportoPartenza, $aeroportoArrivo, $dataPartenza){
        $flight = Volo::where('aeroportoPartenza', $aeroportoPartenza)
                      ->where('aeroportoArrivo', $aeroportoArrivo)
                      ->where('dataPartenza', $dataPartenza)
                      ->get() -> toArray();
        
        $numFlights = count($flight);
        if($numFlights > 0){

            $array = array();
            for($i=0; $i < $numFlights; $i++){

                $partenzaIATA = Aeroporto::find($flight[$i]['aeroportoPartenza']); //recupero istanza della tabella aeroporto in base al codice IATA
                $arrivoIATA = Aeroporto::find($flight[$i]['aeroportoArrivo']);
                if(isset($partenzaIATA) && isset($arrivoIATA)){
                    $aeroportoPartenza = $partenzaIATA -> città . ' ' . $partenzaIATA -> denominazione;
                    $aeroportoArrivo = $arrivoIATA -> città . ' ' . $arrivoIATA -> denominazione;
                }
                else{
                    $aeroportoPartenza = $flight[$i]['aeroportoPartenza'];
                    $aeroportoArrivo = $flight[$i]['aeroportoArrivo'];
                }


                $array[$i] = [
                       'flightID' => $flight[$i]['flightID'],
                       'aeroportoPartenza' => $aeroportoPartenza,
                       'aeroportoArrivo' => $aeroportoArrivo,
                       'dataPartenza' => $flight[$i]['dataPartenza'],
                       'oraPartenza'=> $flight[$i]['oraPartenza'],
                       'dataArrivo'=> $flight[$i]['dataArrivo'],
                       'oraArrivo'=> $flight[$i]['oraArrivo'],
                       'stato'=> $flight[$i]['stato']
                        ];
            }
            return $array;
        }
        else {
            return ['exists' => false];
        }
    } 
}

?>