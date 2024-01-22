import './bootstrap';
import '~resources/scss/app.scss';
import.meta.glob([
    '../img/**'
]);
import * as bootstrap from 'bootstrap';
import { method } from 'lodash';



// // prendere btnDelete da id
// let btnDelete = document.getElementById('btnDelete');
// //prendere comifmDelete id
// let confirmDelete = document.getElementById('confirmDelete');
// //inizializzare variabile del comic id
// let comicId;

// //event listener x btnDelete x prendere id del comic da cancellare
// btnDelete.addEventListener('click', function() {
//     comicId = this.getAttribute('data-id');

// });

// //event listener su conferma cancellazione
// confirmDelete.addEventListener('click', function() {
//     //invia delete request al server
//     fetch(`/comics/${comicId}`, {
//         method: 'DELETE',  //specificare metodo http
//         headers: {
//             //headers necessari
//             'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content'), //csrf token x laravel
//             'Accept' : 'application/json', //accetta risposta json
//             'Content-Type' : 'application/json' //content type json

//         }
//     })
//     .then(response => {
//         //dopo risposta, redirect su comics ilist
//         window.location.href = '/comics'; 
//     })
// });


//aspetta che il dom sia correttamente caricato prima di eseguire
document.addEventListener('DOMContentLoaded', (event) => {
    //seleziona il modale tramite l'id
  const deleteModal = document.getElementById('deleteModal');
  //controlla che il modale esista
  if (deleteModal) {
    //aggiungi event listener per show bs modal
    deleteModal.addEventListener('show.bs.modal', function (event) {
        //event related target si riferisce all'elemento che triggera il modal(btn)
      const button = event.relatedTarget;
      //prendi id da data-id
      const comicId = button.getAttribute('data-id');
      //contesto dell'event listener
      const modal = this;
      //trova il primo form all'interno del modale
      const form = modal.querySelector('form');
      //punta ad attributo action del form che punta alla route destroy
      form.setAttribute('action', '/comics/' + comicId);
    });
  }
});