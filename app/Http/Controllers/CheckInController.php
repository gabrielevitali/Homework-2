<?php

use Illuminate\Routing\Controller;

class CheckInController extends Controller{

    public function index(){
        return view('checkin');
    }

    public function checkIn($codiceFiscale, $flightID){
        // Verifichiamo che esista una prenotazione presente in DB
        $checkIn = CheckIn::where('codiceFiscale', $codiceFiscale)
                            ->where('flightID', $flightID)
                            ->first(); //potrà essere restituita al più un'occorrenza

        if(!isset($checkIn)){ //Non esiste alcuna prenotazione corrispondente ai dati inseriti...
            return ['exists' => false];
        }
        else{
            if($checkIn -> ticketID != NULL){ //Esiste una prenotazione e un ticketID...
                return ['exists' => true,
                        'ticketExisted' => true,
                        'ticketID' => $checkIn -> ticketID
                        ];
            }
            else { //Esiste una prenotazione, ma non è ancora stato generato un ticketID...
                do{
                    $newTicketID = rand(100, 999) . rand(100, 999) . rand(10, 99); //genero un nuovo ticketID

                    $ticket_id = CheckIn::where('ticketID', $newTicketID)->first(); 
                } while($ticket_id !== NULL);
                
                //$checkIn = CheckIn::where('codiceFiscale', $codiceFiscale)->where('flightID', $flightID)->first();
                $checkIn -> ticketID = $newTicketID;
                $checkIn -> save();

                return ['exists' => true,
                        'ticketExisted' => false,
                        'ticketID' => $checkIn -> ticketID
                        ];
            }
        } 
    }
}

?>