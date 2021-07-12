<html>
    <head>
        <meta charset="utf-8">
        <title> Infinity Airways </title>
        <link rel="stylesheet" href="{{ url('css/homepage.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/destinazioni.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/infoVoli.css') }}"/>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet"> <!-- importo il font Raleway da Google Fonts -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ url('js/infoVoli.js') }}" defer> </script>
    </head>
    
    <body>
        <header>
            <nav>
                <a href='{{ url("homepage") }}'> Home </a>
                <a href='{{ url("checkin") }}'> Check-in </a>
                <a href='{{ url("acquistoVolo") }}'> Acquista </a>
                <a href='{{ url("abbonamentoClub") }}'> Club </a>
                <a href='{{ url("login_signup") }}' class="button"> Area Riservata </a>
            </nav>
            <a href="homepage.html" id="title"> <h1> INFINITY AIRWAYS </h1> </a>
            <div class="overlay"> </div>   
        </header>

        <section>
            <p class="testoBlu"> Resta aggiornato sui voli di tuo interesse: effettua una ricerca in base ai parametri di tuo interesse! </p>
            <div class = 'container'>
                <div class ='searchOptions'>
                    <p class="testoBianco"> Cerca in base a: </p>
                    <label> <input type='radio' name='option' value='id'> Codice Volo </label>
                    <label> <input type='radio' name='option' value='airportsDate'> Aeroporto di Partenza, Aeroporto di Arrivo, Data </label>
                </div>
                <form name='searchByID' class='form' method='get'> <!-- Inizialmente nascosto -->
                <label> Codice del Volo (flightID)
                        <input type='text' name='flightID' required placeholder = '(4 cifre es. 4015)'>
                        <!-- Bottone per inviare -->
                        <input type="submit" name="searchByID" value="Cerca Volo">
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
                    <th> Stato </th>
                </tr> <!-- Chiusura Intestazione -->
            </table>
            <span class='testoRosso hidden'>  </span>
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