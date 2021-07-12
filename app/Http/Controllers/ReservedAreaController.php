<?php

use Illuminate\Routing\Controller;

class ReservedAreaController extends Controller {

    public function home(){
        // Leggiamo l'utente connesso
        $user = Utente::find(session('username'));
        // Abbonamento al Club dell'utente
        $subscription = $user->subscription()->first();

        // Prenotazioni dell'utente
        $bookings = $user->bookings()->get();
        $numBookings = $user->bookings()->count();
        $flights = array();
        for($i=0; $i < $numBookings; $i++){
            $key = $bookings[$i]['flightID']; # è un flightID, chiave primaria del Model Volo
            $result = Volo::find($key); # può essere restituito al più un risultato

            if(isset($result)){
                $flights[$i] = $result;
            }
        }
        if(isset($subscription) && isset($bookings)){
            return view('reservedArea')
            ->with('username', $user->username)
            ->with('subscription', $subscription)
            ->with('bookings', $flights);
        }
        else {
            return view('reservedArea')
            ->with('username', $user->username);
        }
        
    }
    
    public function deleteBooking($flightID){
        $user = Utente::find(session('username'));
        $username = $user -> username;

        $deleteBooking = AcquistoVolo::where('username', $username)->where('flightID', $flightID)->first();
        if(isset($deleteBooking)){
            $deleteBooking -> delete();
            return ['bookingDeleted' => true,
                    'flightID' => $flightID];
        }
        else{
            return ['bookingDeleted' => false,
                    'flightID' => $flightID];
        }
    }

    public function searchAlbumOnSpotify($album){
        $token = Http::withHeaders(['Authorization' => 'Basic ' . base64_encode(env('SPOTIFY_CLIENT_ID') . ':' . env('SPOTIFY_CLIENT_SECRET'))])
            ->asForm()
            ->post('https://accounts.spotify.com/api/token', [
                //'code' => trim($code),
                //'redirect_uri' => env('REDIRECT_URI'),
                'grant_type' => 'client_credentials'
            ]);
            if($token->failed()){
                echo 'NON OKAY';
                abort(500);
            }
            

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token['access_token']
            ])->get("https://api.spotify.com/v1/search", [
                'q' => $album,
                'type' => 'playlist',
                'limit' => 5
            ]);

            if($response->failed()) abort(500);

            return $response->body(); 

        /*
        $token = Http::get('https://accounts.spotify.com/api/token', [
            'Authorization' => 'Basic ' .base64_encode("159a3880bf1f4adab3aa681bb8b33389" . ':' . "db95a3d882ec42c9a85b5501d82bfd33")
        ])->post( "https://accounts.spotify.com/api/token", [
            'grant_type' => 'client_credentials'
        ]);

        if($token->failed()){
            echo 'NON OKAY';
            abort(500);
        }
        else{
            echo 'okay';
        }
        */
    }
}

?>
