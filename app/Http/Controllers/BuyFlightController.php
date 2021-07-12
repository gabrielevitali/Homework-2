<?php

use Illuminate\Routing\Controller;

class BuyFlightController extends Controller{

    public function index(){
        return view('acquistoVolo')
            ->with('csrf_token', csrf_token());
    }

    # Ricerca volo in base ad aeroporto di partenza, aeroporto di arrivo e data
    public function searchByAirportsDate($aeroportoPartenza, $aeroportoArrivo, $dataPartenza){
        $todayDate = date('Y-m-d');

        if($dataPartenza > $todayDate){ //la data di partenza è antecedente la data odierna
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
        else {
            return ['wrongDate' => true];
        }
    } //fine searchByAirportsDate(...)

    # Ricerca volo in base ad aeroporto di partenza e data di partenza
    public function searchByDepartureAirportDate($aeroportoPartenza, $dataPartenza){
        $todayDate = date('Y-m-d');

        if($dataPartenza > $todayDate){ //la data di partenza è antecedente la data odierna
            $flight = Volo::where('aeroportoPartenza', $aeroportoPartenza)
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
        else {
            return ['wrongDate' => true];
        }
    } //fine searchByDepartureAirportDate(...)

    # Ricerca volo in base alla data di partenza
    public function searchByDate($dataPartenza){
        $todayDate = date('Y-m-d');

        if($dataPartenza > $todayDate){ //la data di partenza è antecedente la data odierna
            $flight = Volo::where('dataPartenza', $dataPartenza)->get() -> toArray();
        
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
        else {
            return ['wrongDate' => true];
        }
    } //fine searchByDate(...)

    public function buyFlight(){
        // Verifichiamo se l'utente ha già fatto il login
        if(session('username') != null){

            $acquistoVoloId = AcquistoVolo::all()->count();
            $newAcquistoVolo =  AcquistoVolo::create([
                'id' => $acquistoVoloId+1,
                'username' => session('username'),
                'flightID' => request('flightID'),
                ]);
            
            $checkInID = CheckIn::all()->count();
            $newCheckIn = CheckIn::create([
                'id' => $checkInID+2,
                'ticketID' => NULL,
                'codiceFiscale' => request('codiceFiscale'),
                'flightID' => request('flightID')
            ]);
            
            $passenger = Passeggero::where('codiceFiscale', request('codiceFiscale'))->exists();
            if(!$passenger){
                $newPassenger = Passeggero::create([
                    'codiceFiscale' => request('codiceFiscale'),
                    'nome' => request('nome'),
                    'cognome' => request('cognome'),
                    'nazione' => request('nazione'),
                    'dataNascita' => request('dataNascita'),
                    'via' => request('via'),
                    'numero' => request('numero'),
                    'cap' => request('CAP'),
                    'documento' => request('documento'),
                    'numeroTelefono' => request('telefono'),
                ]);
            
                if ($newAcquistoVolo && $newCheckIn && $newPassenger) {
                        $disclaimer = "Il tuo acquisto è andato a buon fine. Accedi all'area riservata per visualizzare e gestire la prenotazione! Ti aspettiamo a bordo!";
                        return view('acquistoVolo')
                            ->with('csrf_token', csrf_token())
                            ->with('disclaimer', $disclaimer);
                } 
            }
            else{
                if ($newAcquistoVolo && $newCheckIn) {
                    $disclaimer = "Il tuo acquisto è andato a buon fine. Accedi all'area riservata per visualizzare e gestire la prenotazione! Ti aspettiamo a bordo!";
                    return view('acquistoVolo')
                        ->with('csrf_token', csrf_token())
                        ->with('disclaimer', $disclaimer);
                } 
            }
        }
        else {
            return redirect('login_signup')
                ->with('csrf_token', csrf_token())
                ->withInput();
        }
    }
}

?>