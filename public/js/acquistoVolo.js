//funzione che calcola la data attuale
function calculateDate(){
    let date = new Date();
    let day = date.getDate();
    let month = date.getMonth() + 1;
    if(month < 10){
        month = '0' + month;
    }
    let year = date.getFullYear();
    dateValue = year + '-' + month + '-' + day;

    return dateValue;
}

//funzione che calcola l'orario
function calculateTime(){
    let data = new Date();
    let hours = data.getHours()
    let minutes = data.getMinutes()
    let time = hours + ':' + minutes;

    return time;
}

/* funzione che, in base alla data e all'orario correnti, aggiorna l'informazione 
   sullo stato di un volo, il quale è invece memorizzata nel database */
function updateStatus(dataPartenza, oraArrivo, stato){
    let status;

    let currentTime = new Date();
    currentTime = calculateTime();
    //console.log("Current time: " + currentTime); 

    let expectedArrivalTime = new Date();
    expectedArrivalTime = oraArrivo;
    //console.log("Expected arrival time: " + expectedArrivalTime);

    let dbDepartureDate = new Date();
    dbDepartureDate = dataPartenza;
    console.log("departureDate: " + dbDepartureDate);

    let currentDate = new Date();
    currentDate = calculateDate();
    console.log("Current date: " + currentDate);

    if (dataPartenza === calculateDate()){
        if(currentTime > expectedArrivalTime){
            status = 'atterrato';
        }
        else {
            status = stato;
        }
    }
    else if(currentDate > dbDepartureDate){
        status = 'atterrato';
    }
    else{
        status = stato;
    }

    return status;
}

//funzione che elimina messaggio di errore
function hideError(string){
    const error = document.querySelector('.testoRosso');
    error.textContent = string;
    error.classList.add('hidden');
}

//funzione che genera messaggio di errore
function showError(string){
    const error = document.querySelector('.testoRosso');
    error.textContent = string;
    error.classList.remove('hidden');
    /* Nascondo l'intestazione della tabella */
    const heading = document.querySelector('#heading');
    heading.style.display = 'none';
    const rows = document.querySelectorAll('#flightTable tr');
    for(row of rows){
        if(row.dataset.type !== 'heading'){
            row.innerHTML = '';
        }
    }

}

function hide(event){
    event.currentTarget.removeEventListener('click', hide);
    event.currentTarget.textContent = 'Acquista';

    const buy = document.querySelector('.buy');
    buy.style.display = 'none';

    event.currentTarget.addEventListener('click', buyFlight);
}

function buyFlight(event){
    console.log('sono entrato qui forza italy')
    const flightID = event.currentTarget.parentNode.childNodes[0].textContent;
    console.log(flightID);
    buy_form.flightID.value = flightID;
    event.currentTarget.removeEventListener('click', buyFlight);
    event.currentTarget.textContent = 'Nascondi';

    const buy = document.querySelector('.buy');
    buy.style.display = 'flex';

    event.currentTarget.addEventListener('click', hide);
}

//funzione che riceve un flight e lo aggiunge dinamicamente nella tabella dei voli, inizialmente nascosta
function addFlight(json){
    //console.log('La funzione addFlight() è stata chiamata.\n');
    hideError("");

    /* Se tale funzione viene chiamata, significa che è stata trovata almeno una corrispondenza,
       dunque rendo visibile l'intestazione della tabella */
    const heading = document.querySelector('#heading');
    heading.style.display = 'table-row';

    const flightTable = document.querySelector('#flightTable');
    
    //creo una nuova riga (vuota) e la aggiungo alla tabella
    const flightRow = document.createElement('tr');
    flightRow.style.backgroundColor = 'rgba(13, 40, 121, 0.856)';
    flightRow.style.color = 'white';
    flightTable.appendChild(flightRow);

    //creo cella per N. Volo
    const flightID = document.createElement('td');
    flightID.classList.add('td');
    flightID.textContent = json.flightID;
    flightRow.appendChild(flightID);

    //creo cella per Aeroporto di Partenza
    const departureAirport = document.createElement('td');
    departureAirport.classList.add('td');
    departureAirport.textContent = json.aeroportoPartenza;
    flightRow.appendChild(departureAirport);

    //creo cella per Aeroporto di Arrivo
    const arrivalAirport = document.createElement('td');
    arrivalAirport.classList.add('td');
    arrivalAirport.textContent = json.aeroportoArrivo;
    flightRow.appendChild(arrivalAirport);

    //creo cella per Data di Partenza
    const departureDate = document.createElement('td');
    departureDate.classList.add('td');
    departureDate.textContent = json.dataPartenza;
    flightRow.appendChild(departureDate);

    //creo cella per Orario di Partenza
    const departureTime = document.createElement('td');
    departureTime.classList.add('td');
    departureTime.textContent = json.oraPartenza;
    flightRow.appendChild(departureTime);

    //creo cella per Data di Arrivo
    const arrivalDate = document.createElement('td');
    arrivalDate.classList.add('td');
    arrivalDate.textContent = json.dataArrivo;
    flightRow.appendChild(arrivalDate);

    //creo cella per Orario di Arrivo
    const arrivalTime = document.createElement('td');
    arrivalTime.classList.add('td');
    arrivalTime.textContent = json.oraArrivo;
    flightRow.appendChild(arrivalTime);

    //creo p per acquisto
    const buy = document.createElement('td');
    buy.classList.add('tdB');
    buy.textContent = 'Acquista';
    flightRow.appendChild(buy);
    
    const tdBs = document.querySelectorAll('.tdB');
    for(tdB of tdBs){
    tdB.addEventListener('click', buyFlight);
}
    return;
}

//funzione di ricerca dei voli in base alla data di Partenza
function searchByDate(event){
    event.preventDefault();

    const date = encodeURIComponent(searchByDate_form.date.value);
    console.log(date);
    
    const url = 'acquistoVolo/search/'+date;
    fetch(url).then(onResponse).then(onJson);
}

//funzione di ricerca dei voli in base all'aeroporto di partenza e alla data di partenza
function searchByDepartureAirportDate(event){
    event.preventDefault();
    
    const departureAirport = encodeURIComponent(searchByDepartureAirportDate_form.departureAirport.value);
    console.log(departureAirport);

    const date = encodeURIComponent(searchByDepartureAirportDate_form.date.value);
    console.log(date);
    
    const url = 'acquistoVolo/search/'+departureAirport+'/'+date;
    fetch(url).then(onResponse).then(onJson);
}

/******************************************************************************************/

//funzione che gestisce la risposta in formato .json restituita dalla pagina 'searchByAirportsDate.php' in seguito a richiesta
function onJson(json){
    console.log(json.length);
    console.log(json);

    if(json.length > 0){
        console.log("La ricerca tramite Aeroporto di Partenza, Aeroporto di Arrivo e Data è avvenuta con esito positivo");

        const rows = document.querySelectorAll('#flightTable tr');
        for(row of rows){
            if(row.dataset.type !== 'heading'){
                row.innerHTML = '';
            }
        }
        for(let i=0; i < json.length; i++){
            let doc = json[i];
            console.log('Ho trovato la seguente corrispondenza: ');
            console.log('Numero di volo: ' + doc.flightID + '\n');
            console.log('Aeroporto di Partenza: ' + doc.aeroportoPartenza + '\n');
            console.log('Aeroporto di Arrivo: ' + doc.aeroportoArrivo + '\n');
            console.log('Data Partenza: ' + doc.dataPartenza + '\n');
            console.log('Ora Partenza: ' + doc.oraPartenza + '\n');
            console.log('Data Arrivo: ' + doc.dataArrivo + '\n');
            console.log('Ora Arrivo: ' + doc.oraArrivo + '\n');
            console.log('Stato: ' + doc.stato + '\n');
        
            //aggiungo dinamicamente il volo per cui ho trovato una corrispondenza
            addFlight(doc); //chiamata alla funzione che gestisce l'inserimento di una nuova riga (volo) in tabella
        }
    }
    else if (json.exists === false){
        const string = 'Non è stato trovato nessun volo corrispondente ai parametri specificati. Si prega di riprovare inserendo altri valori!';
        showError(string);
    }
    else if(json.wrongDate){
        const string = 'Data non valida! In fase di acquisto occorre inserire una data di partenza successiva alla data odierna. Si prega di riprovare!';
        showError(string);
    }
}

function onResponse (response){
    console.log(response.status);
    return response.json();
}

//funzione di ricerca dei voli in base ad aeroporto di partenza, aeroporto di arrivo e data
function searchByAirportsDate(event){
    event.preventDefault();
    
    const departureAirport = encodeURIComponent(searchByAirportsDate_form.departureAirport.value);
    console.log(departureAirport);
    const arrivalAirport = encodeURIComponent(searchByAirportsDate_form.arrivalAirport.value);
    console.log(arrivalAirport);
    const date = encodeURIComponent(searchByAirportsDate_form.date.value);
    console.log(date);

     //Se aeroporto di partenza e aeroporto di arrivo coincidono...
     if(departureAirport === arrivalAirport){
        const string = "Aeroporto di Partenza ed Aeroporto di Arrivo devono essere diversi fra loro. Si prega di riprovare con un'altra coppia di aeroporti.";
        showError(string);
    }
    else{
        hideError(""); 
        //Preparo richiesta
        const url = 'acquistoVolo/search/'+departureAirport+'/'+arrivalAirport+'/'+date;


        //Effettuo richiesta alla pagina 'searchByAirportsDate.php'
        fetch(url).then(onResponse).then(onJson);
        
    }
    
    /* Al fine di verificare che l'utente selezioni una data nel form di ricerca,
       non effettuo il controllo che segue, bensì in HTML specifico che
       l'elemento input  di tipo "date" è required */
}
/******************************************************************************************/

function onSelectedOption(event){
    const option = event.currentTarget;

    const heading = document.querySelector('#heading');
    heading.style.display = 'none';

    const rows = document.querySelectorAll('#flightTable tr');
    for(row of rows){
        if(row.dataset.type !== 'heading'){
            row.innerHTML = '';
        }
    }

    //console.log(value);
    if(option.value === 'departureAirportDate'){
        searchByDepartureAirportDate_form.style.display = 'flex';
        searchByDate_form.style.display = 'none';
        searchByAirportsDate_form.style.display = 'none';
    }
    else if (option.value === 'date'){
        searchByDepartureAirportDate_form.style.display = 'none';
        searchByDate_form.style.display = 'flex';
        searchByAirportsDate_form.style.display = 'none';
    }
    else if (option.value === 'airportsDate'){
        searchByDepartureAirportDate_form.style.display = 'none';
        searchByDate_form.style.display = 'none';
        searchByAirportsDate_form.style.display = 'flex';
    }
}

const searchOptions = document.querySelectorAll('input[type=radio]');
for(searchOption of searchOptions){
    searchOption.addEventListener('click', onSelectedOption);
}

//seleziono i due form di ricerca e associo loro il relativo handler di ricerca dei voli
const searchByDepartureAirportDate_form = document.forms['searchByDepartureAirportDate'];
const searchByDate_form = document.forms['searchByDate'];
const searchByAirportsDate_form = document.forms['searchByAirportsDate'];
const buy_form = document.forms['buy'];
searchByDepartureAirportDate_form.addEventListener('submit', searchByDepartureAirportDate);
searchByDate_form.addEventListener('submit', searchByDate);
searchByAirportsDate_form.addEventListener('submit', searchByAirportsDate);

