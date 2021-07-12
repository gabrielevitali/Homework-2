<html>
    <head>
        <meta charset="utf-8">
        <title> Infinity Airways </title>
        <link rel="stylesheet" href="{{ url('css/homepage.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/destinazioni.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/login_signup.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/check_in.css') }}"/>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet"> <!-- importo il font Raleway da Google Fonts -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ url('js/check_in.js') }}" defer> </script>
    </head>
    
    <body>
        <header>
            <nav>
                <a href='{{ url("homepage") }}'> Home </a>
                <a href='{{ url("infoVoli") }}'> Info Voli </a>
                <a href='{{ url("acquistoVolo") }}'> Acquista </a>
                <a href='{{ url("abbonamentoClub") }}'> Club </a>
                <a href='{{ url("login_signup") }}' class="button"> Area Riservata </a>
            </nav>
            <a href="homepage.html" id="title"> <h1> INFINITY AIRWAYS </h1> </a>
            <div class="overlay"> </div>   
        </header>
        <main>
            <!-- Immagine -->
            <section class = 'mainLeft'>
                <p> Benvenuto nel servizio di Online Check-In di Infinity Airways! </p>
                <img src="{{ url('images/check_in.jpg') }}">
            </section>

            <!-- Check-in -->
            <section class = 'mainRight'>
                <p> Mettiti comodo e risparmia tempo in aeroporto effettuando il check-in online, senza alcuna spesa aggiuntiva. </p>
                <p> Occorre solo inserire il proprio Codice Fiscale e il Codice del Volo per cui effettuare il Check-In. </p>
                
                <!-- Bottone per creare un nuovo account  -->
                <form name='check_in' method='get'>
                    <input type = 'text' name = "codiceFiscale" placeholder = 'Il tuo codice fiscale'>
                    <input type = 'text' name = "flightID" placeholder = 'Il codice del volo (4 cifre)'>
                    <input type = 'submit' name = "check_in" value = 'Effettua il Check-In'>
                </form>
                <span class='disclaimer testoVerde hidden'>  </span>
                <span class='errorDisclaimer testoRosso hidden'>  </span>
            </section>
        </main>

        
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