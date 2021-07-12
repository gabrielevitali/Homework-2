<html>
    <head>
        <meta charset="utf-8">
        <title> Infinity Airways </title>
        <link rel="stylesheet" href="{{ url('css/homepage.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/destinazioni.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/login_signup.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/check_in.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/joinClub.css') }}"/>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet"> <!-- importo il font Raleway da Google Fonts -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ url('js/joinClub.js') }}" defer> </script>
    </head>
    
    <body>
        <header>
            <nav>
                <a href='{{ url("homepage") }}'> Home </a>
                <a href='{{ url("checkin") }}'> Check-in </a>
                <a href='{{ url("infoVoli") }}'> Info Voli </a>
                <a href='{{ url("acquistoVolo") }}'> Acquista </a>
                <a href='{{ url("login_signup") }}' class="button"> Area Riservata </a>
            </nav>
            <a href="homepage.html" id="title"> <h1> INFINITY AIRWAYS </h1> </a>
            <div class="overlay"> </div>   
        </header>
        <main>
            <!-- Immagine -->
            <section class = 'mainLeft'>
                <p> Benvenuto nella pagina dedicata al Privilege Club di Infinity Airways! </p>
                <img src="{{ url('images/club.jpg') }}">
            </section>

            <!-- Check-in -->
            <section class = 'mainRight'>
                <p> Entra a far parte del nostro Club e scopri un mondo di vantaggi esclusivi disegnati su misura per te: imbarco prioritario, accesso alle nostre lussuose lounge, posti privilegiati e tanto altro ti aspettano! </p>
                <p> Occorre solo inserire il proprio Username e scegliere il piano cui si desidera aderire. </p>
                
                <!-- Bottone per creare un nuovo account  -->
                <form name='joinClub' method='get'>
                    <input type = 'text' name = "username" placeholder = 'Il tuo username' @if(isset($oldUsername)) value='{{$oldUsername}}' @endif>
                    <select id = 'plan'> 
                        <option value = '' disabled selected> Seleziona un piano </option>
                        <option value = 'Bronzo'> Bronzo </option>
                        <option value = 'Argento'> Argento </option>
                        <option value = 'Oro'> Oro </option>
                        <option value = 'Platino'> Platino </option>
                    </select>
                    <input type = 'submit' name = "joinClub" value = 'Iscriviti al Privilege Club'>
                </form>
                <span class='disclaimer testoVerde hidden'>  </span>
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