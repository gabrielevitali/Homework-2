const lengthSpotify = 5;

//funzione che genera un messaggio
function showDisclaimer(string){
    const disclaimer = document.querySelector('.disclaimer');
    const errorDisclaimer = document.querySelector('.errorDisclaimer');
    disclaimer.textContent = string;
    disclaimer.classList.remove('hidden');
    errorDisclaimer.classList.add('hidden');
}

//funzione che genera un messaggio di errore
function showErrorDisclaimer(string){
    const disclaimer = document.querySelector('.disclaimer');
    const errorDisclaimer = document.querySelector('.errorDisclaimer');
    errorDisclaimer.textContent = string;
    disclaimer.classList.add('hidden');
    errorDisclaimer.classList.remove('hidden');
}

function onDeleteJson(json){
    console.log(json);

    if(json.bookingDeleted){
        const string = 'La tua prenotazione, riferita al volo ' + json.flightID + ' è stata cancellata.';
        showDisclaimer(string);
    }
    else{
        const string = 'La cancellazione della tua prenotazione, riferita al volo ' + json.flightID + ' non è andata a buon fine.';
        showErrorDisclaimer(string);
    }
}

function onDeleteResponse(response){
    console.log(response.status);
    return response.json();
}

function deleteBooking(event){
    event.preventDefault();

    const flightID = event.currentTarget.parentNode.childNodes[1].textContent;
    console.log(flightID);

    event.currentTarget.parentNode.innerHTML = '';

    url = 'reservedArea/' + flightID;
    fetch(url).then(onDeleteResponse).then(onDeleteJson);   
}

function onSpotifyJson(json){
    console.log(json);
    //console.log(json.playlists.items[0].images[0].url);
    //console.log(json.playlists.items[0].external_urls.spotify);

    const box = document.querySelector('.musicAlbum');
    box.innerHTML = '';
    const section = document.querySelector('#music');
    section.style.height = '420px';

    for(i = 0; i < lengthSpotify; i++){      

        const a = document.createElement('a');
        a.href = json.playlists.items[i].external_urls.spotify;

        const image = document.createElement('img');
        image.src = json.playlists.items[i].images[0].url;
        
        a.appendChild(image);
        box.append(a);
        
    }
   
    

}

function onSpotifyResponse(response){
    console.log(response.status);
    return response.json();
}

//funzione di ricerca album su Spotify in base a input dell'utente
function searchAlbum(event){
    event.preventDefault();
    
    const album = encodeURIComponent(searchAlbumForm.album.value);
    console.log(album);

    //Effettuo richiesta
    url = 'reservedArea/spotify/' + album;
    fetch(url).then(onSpotifyResponse).then(onSpotifyJson);
}

//seleziono il form di ricerca dell'album e gli associo il relativo handler
const searchAlbumForm = document.forms['searchAlbumForm'];
searchAlbumForm.addEventListener('submit', searchAlbum);

const deleteButtons = document.querySelectorAll('.deleteBooking');
for(deleteButton of deleteButtons){
    deleteButton.addEventListener('click', deleteBooking);
}