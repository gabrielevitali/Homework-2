<html>
    <head>
        <meta charset="utf-8">
        <title> Infinity Airways </title>
        <link rel="stylesheet" href="{{ url('css/homepage.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/reservedArea.css') }}"/>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet"> <!-- importo il font Raleway da Google Fonts -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ url('js/reservedArea.js') }}" defer> </script>
    </head>
    
    <body>
        <header>
        <nav>
            <a href='{{ url("homepage") }}'> Home </a>
                <a href='{{ url("checkin") }}'> Check-in </a>
                <a href='{{ url("infoVoli") }}'> Info Voli </a>
                <a href='{{ url("acquistoVolo") }}'> Acquista </a>
                <a href='{{ url("abbonamentoClub") }}'> Club </a>
                <a href='{{ url("logout") }}'>Logout</a>
            </nav>
            <a href="homepage.html" id="title"> <h1> INFINITY AIRWAYS </h1> </a>
            <div class="overlay"> </div>   
        </header>
        <div id = 'welcome'>
        <p> Benvenuto/a, {{ $username }} !</p>
        <div class='album'>
            <img src="{{ url('images/check_in.jpg') }}">
            <img src="{{ url('images/onBoard.jpg') }}">
            <img src="{{ url('images/club.jpg') }}">
        </div>
        </div>
        <section id = 'club'>
            <p> Club Privilege </p>
            <table id='clubTable'>
                <tr data-type ="heading"> <!-- Apertura Intestazione -->
                    <th> CardID </th> 
                    <th> Tipo di Abbonamento </th> 
                    <th> Data di Iscrizione </th>
                    <th> Data di Scadenza </th>
                </tr> <!-- Chiusura Intestazione -->
                <tr>
                    <td> @if (isset($subscription)) {{ $subscription['cardID'] }} @endif</td>
                    <td> @if (isset($subscription)) {{ $subscription['tipoAbbonamento'] }} @endif</td> 
                    <td> @if (isset($subscription)) {{ $subscription['dataAbbonamento'] }} @endif</td> 
                    <td> @if (isset($subscription)) {{ $subscription['scadenzaAbbonamento'] }} @endif</td> 
                </tr>    
            </table>         
        </section>
        <section id = 'bookings'>
            <span class=testoBlu> Le tue prenotazioni </span>
            <!-- Tabella costruita dinamicamente riempita con le informazioni sulle prenotazioni dell'utente,
                se queste informazioni sono effettivamente presenti in database -->
            <table id = 'flightTable'>
                <tr data-type ="heading" id = heading> <!-- Apertura Intestazione -->
                    <th> N. Volo </th>
                    <th id = 'from'> 
                        Da
                        <img src="https://image.flaticon.com/icons/png/512/68/68380.png">
                    </th> 
                    <th id = 'to'> 
                        A
                        <img src="https://image.flaticon.com/icons/png/512/68/68542.png">
                    </th> 
                    <th> Data Partenza </th> 
                    <th> Ora Partenza </th> 
                    <th> Data Arrivo </th>
                    <th> Ora Arrivo </th> 
                </tr> <!-- Chiusura Intestazione -->
                @if (isset($bookings))
                @foreach($bookings as $booking)
                <tr>
                    <td id='tr_flightID'> {{ $booking['flightID'] }} </td>
                    <td> {{ $booking['aeroportoPartenza'] }} </td>
                    <td> {{ $booking['aeroportoArrivo'] }} </td>
                    <td> {{ $booking['dataPartenza'] }} </td>
                    <td> {{ $booking['oraPartenza'] }} </td>
                    <td> {{ $booking['dataArrivo'] }} </td>
                    <td> {{ $booking['oraArrivo'] }} </td>
                    <td class='deleteBooking'> Cancella </td>
                </tr>
                @endforeach
                @endif
            </table>
            <span class='disclaimer testoVerde hidden'>  </span>
            <span class='errorDisclaimer testoRosso hidden'>  </span>
        </section>
        <section id = 'music'>
            <p> Cerca una playlist per il tuo viaggio </p>
            <form name='searchAlbumForm' class='form' method='get'>
                <label> Nome della Playlist
                        <input type='text' name='album'>
                        <!-- Bottone per inviare -->
                        <input type="submit" name="searchAlbum" value="Cerca Album">
                </label>
            </form>
            <div class = musicAlbum> </div> <!-- Inizialmente vuoto -->
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
