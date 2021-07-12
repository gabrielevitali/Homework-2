<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Infinity Airways </title>
        <link rel="stylesheet" href="{{ url('css/homepage.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/destinazioni.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/login_signup.css') }}"/>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet"> <!-- importo il font Raleway da Google Fonts -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ url('js/login_signup.js') }}" defer> </script>
    </head>
    
    <body>
        <header>
            <nav>
                <a href='{{ url("homepage") }}'> Home </a>
                <a href='{{ url("checkin") }}'> Check-in </a>
                <a href='{{ url("infoVoli") }}'> Info Voli </a>
                <a href='{{ url("acquistoVolo") }}'> Acquista </a>
                <a href='{{ url("abbonamentoClub") }}'> Club </a>
            </nav>
            <a href="homepage.html" id="title"> <h1> INFINITY AIRWAYS </h1> </a>
            <div class="overlay"> </div>   
        </header>
        <main>
            <!-- Accedi -->
            <section class = 'mainLeft'>
                <p> Accedi alla tua Area Riservata </p>
                <!-- form di accesso all'area riservata -->
                <form name='login' method='post' autocomplete="off">
                    <input type='hidden' name='_token' value='{{ $csrf_token }}'>
                    <input type = 'text' name = 'loginUsername' placeholder = 'Il tuo username' @if(isset($oldLoginUsername)) value='{{$oldLoginUsername}}' @endif>
                    <input type = 'password' name = 'loginPassword' placeholder = 'La tua password'>

                    <!-- Bottone per inviare i dati e accedere -->
                    <input type="submit" name="login" value="Accedi">
                </form>
            </section>

            <!-- Registrati -->
            <section class = 'mainRight'>
                @if(isset($disclaimer))
                    <p color='green'> {{$disclaimer}}  </p>
                @else
                <p> Non hai ancora un account? </p>
                <p> Registrati! Gestisci le tue prenotazioni e visualizza contenuti personalizzati per te </p>
                @endif
                <!-- Bottone per creare un nuovo account  -->
                <button type='button' id="createAccount"> Crea un nuovo account </button>
            </section>
        </main>

        <!-- Form di Registrazione -->
        <section class = 'signup'> <!-- Inizialmente nascosta -->
            <p class = 'testoBlu'> Compila il form e completa la registrazione ad Infinity Airways! </p>
            <form name='signup' method='post' autocomplete="off">
                        <input type='hidden' name='_token' value='{{ $csrf_token }}'>
                        <input type = 'text' name = 'signupUsername' placeholder = 'Inserisci username' @if(isset($oldSignupUsername)) value='{{$oldSignupUsername}}' @endif>
                        <input type = 'text' name = 'email' placeholder = 'Inserisci email' @if(isset($oldEmail)) value='{{$oldEmail}}' @endif>
                        <input type = 'password' name = 'signupPassword' placeholder = 'Inserisci password' @if(isset($oldSignupPassword)) value='{{$oldSignupPassword}}' @endif>
                        <input type = 'password' name = 'confirmPassword' placeholder = 'Conferma password' @if(isset($oldConfirmPassword)) value='{{$oldConfirmPassword}}' @endif>

                        <!-- Bottone per inviare i dati e accedere -->
                        <input type="submit" name="signup" value="Registrati">
            </form>
        </section>


        <!-- Apertura footer -->
        <footer>
            <div class="footerContent">
                <!-- Chi siamo? -->
                <div class="footerItem">
                    <p> Chi Siamo </p>
                    <a href="storia.html"> La nostra Storia </a>
                    <a href="mission.html"> La nostra Mission </a>
                    <a href="flotta.html"> La nostra Flotta </a>
                    <a href="recensioni.html"> Dicono di Noi </a>
                </div>
                <!-- Dove voliamo? -->
                <div class="footerItem">
                    <p> Dove voliamo? </p>
                    <a href='{{ url("infoVoli") }}'> Destinazioni </a>
                    <a href='{{ url("infoVoli") }}'> Info Voli </a>
                    <a href='{{ url("infoVoli") }}'> Promozioni </a>
                    <a href='{{ url("infoVoli") }}'> Proposte di Viaggio </a>
                </div>
                <!-- Privilege Club -->
                <div class="footerItem">
                    <p> Privilege Club </p>
                    <a href='{{ url("abbonamentoClub") }}'> Servizi </a>
                    <a href='{{ url("abbonamentoClub") }}'> Abbonamenti </a>
                    <a href='{{ url("abbonamentoClub") }}'> Lounge </a>
                    <a href='{{ url("abbonamentoClub") }}'> Iscriviti al Club </a>
                </div>
                <!-- Link Utili -->
                <div class="footerItem">
                    <p> Link Utili </p>
                    <a href='{{ url("checkin") }}'> Check-in Online </a>
                    <a href="bagagli.html"> Info Bagagli </a>
                    <a href='{{ url("login_signup") }}'> Area Riservata </a>
                    <a href="contatti.html"> Contatti </a>
                </div>
            </div>
            <p> Gabriele Vitali 1000010255 </p>
        </footer> 
        <!-- Chiusura footer -->    
 
    </body>
</html>