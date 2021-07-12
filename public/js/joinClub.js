function insertAfter(referenceNode, newNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
  }

//funzione che elimina messaggio di errore
function hideDisclaimer(){
    const disclaimer = document.querySelector('.disclaimer');
    const main = document.querySelector('main');
    disclaimer.classList.add('hidden');
    main.style.minHeight = '480px';
}

//funzione che genera messaggio di errore
function showDisclaimer(string){
    const disclaimer = document.querySelector('.disclaimer');
    const main = document.querySelector('main');
    disclaimer.textContent = string;
    disclaimer.classList.remove('hidden');
    main.style.minHeight = '520px';

    const mainLeft = document.querySelector('.mainLeft');
    const mainRight = document.querySelector('.mainRight');
    mainLeft.style.borderRight = 'none';
    mainRight.style.borderLeft = 'solid rgb(6, 20, 61) 3px';
}

function onUsernameJson(json) {
    // Controllo il campo exists ritornato dal JSON
    const usernameError = document.querySelector('.usernameError');
    if (json.exists) {
        if(usernameError !== null){
            usernameError.remove();
        }
        form.username.style.border = '2px solid green';
    } 
    else {
        form.username.style.border = '2px solid red';
        if(usernameError === null){
            let usernameErrorDisclaimer = document.createElement('span');
            usernameErrorDisclaimer.textContent = "L'username inserito non è registrato. Riprovare con un altro."
            usernameErrorDisclaimer.classList.add('usernameError');
            insertAfter(form.username, usernameErrorDisclaimer);
        }
    }
}

function onUsernameResponse(response) {
    console.log(response.status);
    return response.json();
}

/* funzione che verifica la correttezza dell'username inserito dall'utente, in fase di registrazione */
//effettuo fetch() alla route dedicata
function checkUsername(event) {
    const input = event.currentTarget;
    //console.log(input.value);

    const usernameError = document.querySelector('.usernameError');
    if(!/^[a-zA-Z0-9_]{5,15}$/.test(input.value)) { //caso di errore
        //console.log('Il formato dell'username è errato');
        event.currentTarget.style.border = '2px solid red';
        if(usernameError === null){
            let usernameErrorDisclaimer = document.createElement('span');
            usernameErrorDisclaimer.textContent = "Sono ammesse lettere, numeri e underscore. min 5, MAX. 15"
            usernameErrorDisclaimer.classList.add('usernameError');
            insertAfter(input, usernameErrorDisclaimer);
        }
    } else { //caso di successo
        //console.log('Il formato dell'username è corretto');
        if(usernameError !== null){
            usernameError.remove();
        }
        fetch("abbonamentoClub/username/"+encodeURIComponent(input.value)).then(onUsernameResponse).then(onUsernameJson);

        event.currentTarget.style.border = '2px solid green';
    }  
}


function onJsonSubmit(json){
    console.log(json);

    if(json.existed){
        const string = "Avevi già sottoscritto un abbonamento al Privilege Club, in data " + json.dataAbbonamento + ", scegliendo un piano di tipo '" + json.tipoAbbonamento + "'. La tua sottoscrizione scadrà in data " + json.scadenzaAbbonamento + '.';
        showDisclaimer(string);
    }
    else {
        console.log("Sono dentro l'else: cardID = " + json.cardID);
        const string = "Ciao " + json.username + "! Da adesso fai parte del nostro Privilege Club (cardID: " + json.cardID + ") e potrai usufruire di tutti i vantaggi del piano '" + json.tipoAbbonamento + "'! La tua sottoscrizione scadrà in data " + json.scadenzaAbbonamento + '.';
        showDisclaimer(string);
    }
}

function onResponseSubmit (response){
    console.log(response.status);
    return response.json();
}

function onSubmit(event){
    event.preventDefault();
    hideDisclaimer();

    const username = encodeURIComponent(form.username.value);
    const plan = encodeURIComponent(form.plan.value);
    console.log(username);
    console.log(plan);
    const url = "abbonamentoClub/data/" + username + '/' + plan;
    fetch(url).then(onResponseSubmit).then(onJsonSubmit);
}

//seleziono il form di registrazione
const form = document.forms['joinClub'];
form.username.addEventListener('blur', checkUsername);
form.addEventListener('submit', onSubmit);