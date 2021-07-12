<html>
    <head>
        <meta charset="utf-8">
        <title> Infinity Airways </title>
        <link rel="stylesheet" href="{{ url('css/homepage.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/destinazioni.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/infoVoli.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/acquistoVolo.css') }}"/>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet"> <!-- importo il font Raleway da Google Fonts -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ url('js/acquistoVolo.js') }}" defer> </script>
    </head>
    
    <body>
        <header>
            <nav>
            <a href='{{ url("homepage") }}'> Home </a>
                <a href='{{ url("checkin") }}'> Check-in </a>
                <a href='{{ url("infoVoli") }}'> Info Voli </a>
                <a href='{{ url("abbonamentoClub") }}'> Club </a>
                <a href='{{ url("login_signup") }}' class="button"> Area Riservata </a>
            </nav>
            <a href="homepage.html" id="title"> <h1> INFINITY AIRWAYS </h1> </a>
            <div class="overlay"> </div>   
        </header>

        <section>
            <p class="testoBlu"> Resta aggiornato sui voli di tuo interesse: effettua una ricerca in base ai parametri di tuo interesse! </p>
            <div class='container'>
                <div class ='searchOptions'>
                    <p class="testoBianco"> Cerca in base a: </p>
                    <label> <input type='radio' name='option' value='departureAirportDate'> Aeroporto di Partenza, Data </label> 
                    <label> <input type='radio' name='option' value='date'> Data </label> 
                    <label> <input type='radio' name='option' value='airportsDate'> Aeroporto di Partenza, Aeroporto di Arrivo, Data </label> 
                </div>
                <form name='searchByDepartureAirportDate' class='form' method='get'> <!-- Inizialmente nascosto -->
                <label> Aeroporto di Partenza
                        <select name = 'departureAirport'> 
                            <option value = 'MAD'> Madrid (Spagna) Barajas MAD </option>
                            <option value = 'MXP'> Milano (Italia) Malpensa MXP </option>
                            <option value = 'LHR'> Londra (UK) Heathrow LHR </option>
                            <option value = 'CPH'> Copenaghen (Danimarca) Kastrup CPH </option>
                            <option value = 'CDG'> Parigi (Francia) Charles de Gaulle CDG </option>
                        </select>
                        <!-- Selezione Data -->
                        <input type="date" name="date" required>
                        <!-- Bottone per inviare -->
                        <input type="submit" name="searchByDepartureAirportDate" value="Cerca Volo">
                </label>
                </form>
                <form name='searchByDate' class='form' method='get'> <!-- Inizialmente nascosto -->
                <label> Data di Partenza
                        <!-- Selezione Data -->
                        <input type="date" name="date" required>
                        <!-- Bottone per inviare -->
                        <input type="submit" name="searchByDate" value="Cerca Volo">
                </label>
                </form>
                <form name="searchByAirportsDate" class='form' method='get'> <!-- Inizialmente nascosto -->
                    <!-- Scelta Aeroporto di Partenza -->
                    <label> Aeroporto di Partenza
                        <select name = 'departureAirport'> 
                            <option value = 'MAD'> Madrid (Spagna) Barajas MAD </option>
                            <option value = 'MXP'> Milano (Italia) Malpensa MXP </option>
                            <option value = 'LHR'> Londra (UK) Heathrow LHR </option>
                            <option value = 'CPH'> Copenaghen (Danimarca) Kastrup CPH </option>
                            <option value = 'CDG'> Parigi (Francia) Charles de Gaulle CDG </option>
                        </select>
                    </label>
                    <!-- Scelta Aeroporto di Arrivo -->
                    <label> Aeroporto di Arrivo
                        <select name = 'arrivalAirport'> 
                            <option value = 'MAD'> Madrid (Spagna) Barajas MAD </option>
                            <option value = 'MXP'> Milano (Italia) Malpensa MXP </option>
                            <option value = 'LHR'> Londra (UK) Heathrow LHR </option>
                            <option value = 'CPH'> Copenaghen (Danimarca) Kastrup CPH </option>
                            <option value = 'CDG'> Parigi (Francia) Charles de Gaulle CDG </option>
                        </select>
                    </label>
                    <!-- Selezione Data -->
                    <input type="date" name="date" required>
                    <!-- Bottone per inviare -->
                    <input type="submit" name="searchByAirportsDate" value="Cerca Volo">
                </form>
            </div>
            
            <!-- Tabella inizialmente non visibile e contenente solo l'intestazione;
                 viene riempita dinamicamente in seguito a richiesta a endpoint di AviationStack-->
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
            </table>
            <span class='testoRosso hidden'>  </span>
            <!-- Form di Registrazione -->
            <section class = 'buy'> <!-- Inizialmente nascosta -->
            <p class = 'testoBlu'> Compila il form e completa l'acquisto del volo da te selezionato! </p>
            <div class ='box'>
                <div class = 'labelContainer'>
                    <label> Nome </label>
                    <label> Cognome </label> 
                    <label> Codice Fiscale </label>   
                    <label> Nazione </label> 
                    <label> Data di Nascita </label> 
                    <label> Via </label> 
                    <label> Numero </label> 
                    <label> CAP </label> 
                    <label> Documento </label> 
                    <label> Telefono </label>  
                </div> <!-- Chiusura labelContainer -->
                <div class = 'buyFormContainer'>
                    <form name='buy' method='post' autocomplete="off">
                                <input type='hidden' name='_token' value='{{ $csrf_token }}'>
                                <input type = 'hidden' name='flightID' value=''>
                                <input type = 'text' name = 'nome' placeholder = 'Inserisci Nome' @if((request('nome')) !== NULL ) value = "{{ request('nome') }}" @endif>
                                <input type = 'text' name = 'cognome' placeholder = 'Inserisci Cognome' @if((request('cognome')) !== NULL ) value = "{{ request('cognome')}}" @endif>
                                <input type = 'text' name = 'codiceFiscale' placeholder = 'Inserisci Codice Fiscale (16 cifre)'>
                                <input type = 'text' name = 'nazione' placeholder = 'Inserisci Nazione'>
                                <input type="date" name="dataNascita" required>
                                <input type = 'text' name = 'via' placeholder = 'Inserisci Via'>
                                <input type = 'text' name = 'numero' placeholder = 'Inserisci numero'>
                                <input type = 'text' name = 'CAP' placeholder = 'Inserisci CAP (5 cifre)'>
                                <input type = 'text' name = 'documento' placeholder = 'Inserisci documento'>
                                <input type = 'text' name = 'telefono' placeholder = 'Inserisci numero di telefono'>
                                <!-- Bottone per inviare i dati e procedere con l'acquisto -->
                                <input type="submit" name="signup" value="Acquista">
                    </form>
                </div> <!-- Chiusura buyFormContainer -->
            </div> <!-- Chiusura box -->
        </section>
        @if(isset($disclaimer))
                    <span class='testoVerde'> {{$disclaimer}}  </span>
        @endif
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