<html>
    <head>
        <meta charset="utf-8">
        <title> Infinity Airways </title>
        <link rel="stylesheet" href="{{ url('css/homepage.css') }}"/>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet"> <!-- importo il font Roboto Slab da Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet"> <!-- importo il font Raleway da Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet"> <!-- importo il font Poppins -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    
    <body>
        <header>
            <nav>
                <a href='{{ url("checkin") }}'> Check-in </a>
                <a href='{{ url("infoVoli") }}'> Info Voli </a>
                <a href='{{ url("acquistoVolo") }}'> Acquista </a>
                <a href='{{ url("abbonamentoClub") }}'> Club </a>
                <a href='{{ url("login_signup") }}' class="button"> Area Riservata </a>
            </nav>
            <a href="homepage.html" id="title"> <h1> INFINITY AIRWAYS </h1> </a>
            <div class="overlay"> </div>   
        </header>

        <!-- Prima sezione orizzontale -->
        <section>
            <h1 class='sectionTitle'> Hai già in mente quale sarà la tua prossima meta? Pianifica insieme a noi il tuo viaggio! </h1>
            <div class="sectionContent">
                <div class="sectionItem">
                    <a href="{{ url('acquistoVolo') }}"> <img src="https://siviaggia.it/wp-content/uploads/sites/2/2016/07/img_2264052580100158.jpg"> </a>
                    <h1> Prenota il tuo prossimo volo con Infinity Airways, scegliendo fra decine di possibili destinazioni!</h1>
                </div>
                <div class="sectionItem">
                    <a href='{{ url("checkin") }}'> <img src="https://5minutidinglese.it/wp-content/uploads/2018/05/iStock-882390522.jpg"> </a>
                    <h1> Prova il nostro servizio di online check-in, direttamente da casa, senza alcuna spesa extra!</h1>
                </div>
                <div class="sectionItem">
                    <a href="{{ url('acquistoVolo') }}"> <img src="https://www.familyvacationcritic.com/wp-content/uploads/sites/19/2019/07/baggage-claim-suitcase.jpg"> </a>
                    <h1> Trova tutte le informazioni relative ai bagagli, a mano e da stiva, dai pesi consentiti alle tariffe applicate!</h1>
                </div>
            </div>      
        </section>
        
        <!-- Seconda sezione orizzontale -->
        <section>
            <h1 class='sectionTitle'> Entra anche tu a far parte del nostro Club Esclusivo! </h1>
            <div class="sectionContent">
                <div class="sectionItem">
                    <a href='{{ url("abbonamentoClub") }}'> <img src="https://vimsaviation.com/img/course-1.jpg"> </a> 
                    <h1> Il nostro Staff si prenderà cura di te, attraverso numerosi servizi: scoprili tutti qui sul nostro sito!</h1>
                </div>
                <div class="sectionItem">
                    <a href='{{ url("abbonamentoClub") }}'> <img src="https://onlineairlinesbooking.com/wp-content/uploads/2021/03/0a1a1a-35.jpg"> </a>
                    <h1> Puoi scegliere fra diversi tipi di abbonamento: Bronzo, Argento, Oro e Platino. Che aspetti? </h1>
                </div>
                <div class="sectionItem">
                    <a href='{{ url("abbonamentoClub") }}'> <img src="https://images.squarespace-cdn.com/content/v1/5aab623e266c075216773200/1521313234197-AYG4BLV4VLZRR2DN36EE/ke17ZwdGBToddI8pDm48kG4sWXxm5MLGzYXxhI3Emb8UqsxRUqqbr1mOJYKfIPR7LoDQ9mXPOjoJoqy81S2I8N_N4V1vUb5AoIIIbLZhVYxCRW4BPu10St3TBAUQYVKcDFrDsapgIo0q8jUcW8rNPjhtZThjXNYUQzTwr7Xuxi1NR1RJqyZivqtN160e7oMj/Qatar+Airways+Privilege+Club1097+-+DM+RETOUCH+RD2_preview.jpg"> </a>
                    <h1> Trascorri il tuo tempo nelle nostre esclusive loung in aeroporto, all'insegna del lusso e del comfort!</h1>
                </div>
            </div>      
        </section>

        <!-- Terza sezione orizzontale -->
        <section>
            <h1 class='sectionTitle'> Ecco le nostre proposte di viaggio per te! </h1>
            <div class="sectionContent">
                <div class="sectionItem">
                    <a href="{{ url('acquistoVolo') }}"> <img src="https://www.10cose.it/wp-content/uploads/2015/09/madrid.jpg"> </a> 
                    <h1> Parti alla scoperta della vivace Madrid, tra uno spettacolo di flamenco e una tipica paella mista!</h1>
                </div>
                <div class="sectionItem">
                    <a href="{{ url('acquistoVolo') }}"> <img src="https://www.turismo.it/typo3temp/pics/5f4bd66941.jpg"> </a>
                    <h1> Dublino coniuga modernità ed innovazione ad una grande tradizione: vola in Irlanda!</h1>
                </div>
                <div class="sectionItem">
                    <a href="{{ url('acquistoVolo') }}"> <img src="https://siviaggia.it/wp-content/uploads/sites/2/2018/08/copenaghen.jpg"> </a>
                    <h1> Lasciati ammaliare dall'incantevole fascino di Copenaghen e vivi la tradizione danese!</h1>
                </div>
            </div>      
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