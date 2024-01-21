import './bootstrap';
import '~resources/scss/app.scss';
import.meta.glob([
    '../img/**'
])
import * as bootstrap from 'bootstrap';
import { method } from 'lodash';



// prendere btnDelete da id
let btnDelete = document.getElementById('btnDelete');
//prendere comifmDelete id
let confirmDelete = document.getElementById('confirmDelete');
//inizializzare variabile del comic id
let comicId;

//event listener x btnDelete x prendere id del comic da cancellare
btnDelete.addEventListener('click', function() {
    comicId = this.getAttribute('data-id');

});

//event listener su conferma cancellazione
confirmDelete.addEventListener('click', function() {
    //invia delete request al server
    fetch(`/comics/${comicId}`, {
        method: 'DELETE',  //specificare metodo http
        headers: {
            //headers necessari
            'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content'), //csrf token x laravel
            'Accept' : 'application/json', //accetta risposta json
            'Content-Type' : 'application/json' //content type json

        }
    })
    .then(response => {
        //dopo risposta, redirect su comics ilist
        window.location.href = '/comics'; 
    })
});

