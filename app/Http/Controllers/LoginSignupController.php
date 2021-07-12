<?php

use Illuminate\Routing\Controller;

class LoginSignupController extends Controller {
    
    public function index() {
        $request = request();
        if($request['signupUsername'] != '' && $request['signupPassword'] != '' && $request['confirmPassword']&& $request['email'] != ''){
        //signup    
            return view('login_signup')
            ->with('csrf_token', csrf_token());
        }
        else{ //login
            // Verifichiamo se l'utente ha già fatto il login
            if(session('username') != null){
                // Redirect all'area riservata
                return redirect('reservedArea');
            }
            else {
                // Verifichiamo se c'è stato un errore nel login
                $oldLoginUsername = Request::old('loginUsername');
                return view('login_signup')
                    ->with('csrf_token', csrf_token())
                    ->with('oldLoginUsername', $oldLoginUsername);
            }
        }
    }

    public function loginOrSignup(){
        $request = request();
        if($request['signupUsername'] != '' && $request['signupPassword'] != '' && $request['confirmPassword']&& $request['email'] != ''){

            $newUser =  Utente::create([
                'username' => $request['signupUsername'],
                'pwd' => password_hash($request['signupPassword'], PASSWORD_DEFAULT),
                'email' => $request['email'],
                ]);
            if ($newUser) {
                    //Session::put('username', ($newUser -> username));
                    //return redirect('home');
                    $disclaimer = "Ciao " . $request['signupUsername'] . "! Infinity Airways ti dà il benvenuto! Abbiamo inviato un'email a " . $newUser->email . ". Non vediamo l'ora di incontrarti a bordo!";
                    return view('login_signup')
                        ->with('csrf_token', csrf_token())
                        ->with('disclaimer', $disclaimer);
            } 
            else {
                return redirect('login_signup')
                    ->with('csrf_token', csrf_token())
                    ->withInput();
            }
        }
        else {
            // Verifichiamo che l'utente esista
            $user = Utente::where('username', request('loginUsername'))->first();
            if(isset($user) && password_verify(request('loginPassword'), $user -> pwd)){
                // Credenziali valide
                Session::put('username', $user->username); //creo sessione
                return redirect('reservedArea');
            }
            else {
                // Credenziali non valide
                return redirect('login_signup') -> withInput();
            }
        }
    }

    public function checkUsername($query) {
        $exist = Utente::where('username', $query)->exists();
        return ['exists' => $exist];
    }

    public function checkEmail($query) {
        $exist = Utente::where('email', $query)->exists();
        return ['exists' => $exist];
    }

    public function logout(){
        // Eliminiamo i dati di sessione
        Session::flush();
        // Torniamo al login
        return redirect('login_signup');
    }
}

?>