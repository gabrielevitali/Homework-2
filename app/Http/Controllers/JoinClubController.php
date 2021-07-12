<?php

use Illuminate\Routing\Controller;

class JoinClubController extends Controller{

    public function index(){
        return view('abbonamentoClub');
    }

    public function joinClub($username, $plan){
        $oldUsername = $username;

        if(strlen($username) < 5){
            return redirect('abbonamentoClub')
                        ->with('oldUsername', $oldUsername);
        }
        
        $userExists = Utente::where('username',$username)->exists();
        if(!$userExists){
            return redirect('abbonamentoClub')
                        ->with('oldUsername', $oldUsername);
        }

        // Verifichiamo se esista già un abbonamento in corso al Privilege Club
        $subscription = AbbonamentoClub::where('username', $username)->first(); //potrà essere restituita al più un'occorrenza

        if(!isset($subscription)){ //Non esiste un abbonamento in corso ed effettuo l'iscrizione al Club
            $numSubscriptions = AbbonamentoClub::all()->count();

            #calcolo data di scadenza (equivale alla data di iscrizione + 1 anno)
            $todayDate = date('d-m-Y');
            $addtime = strtotime('+365 days', strtotime($todayDate));
            $expireDate = date('d-m-Y', $addtime);
         
            $newSubscription =  AbbonamentoClub::create([
                'cardID' => $numSubscriptions+1,
                'username' => $username,
                'tipoAbbonamento' => $plan,
                'dataAbbonamento' => $todayDate,
                'scadenzaAbbonamento' => $expireDate,
                ]);
            if ($newSubscription) {
                return ['existed' => false,
                        'username' => $username,
                        'cardID' => $numSubscriptions+1,
                        'tipoAbbonamento' => $plan,
                        'scadenzaAbbonamento' => $newSubscription-> scadenzaAbbonamento
                        ];
            } 
            else {
                return redirect('abbonamentoClub')
                    ->with('oldUsername', $oldUsername);
            }
        }
        else { //Esiste già un abbonamento in corso...
                return ['existed' => true,
                        'dataAbbonamento' => $subscription->dataAbbonamento,
                        'tipoAbbonamento' => $subscription->tipoAbbonamento,
                        'scadenzaAbbonamento' => $subscription-> scadenzaAbbonamento
                        ];
        } 
    }
}

?>