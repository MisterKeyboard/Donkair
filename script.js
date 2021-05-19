'use strict';
//MODAL CONTACTER PAR MAIL
let btnPopup1 = document.querySelector('.btnPopup1');
let overlay1 = document.querySelector('.overlay1');
let btnClose1 = document.querySelector('.btnClose1');

btnPopup1.addEventListener('click',openModal1);
btnClose1.addEventListener('click',closePopup1);

function openModal1(){
    overlay1.style.display = 'block';
}

function closePopup1(){
    overlay1.style.display = 'none';
}



//MODAL CONTACTER PAR TELEPHONE
let btnPopup2 = document.querySelector('.btnPopup2');
let overlay2 = document.querySelector('.overlay2');
let btnClose2 = document.querySelector('.btnClose2');

btnPopup2.addEventListener('click',openModal2);
btnClose2.addEventListener('click',closePopup2);

function openModal2(){
    overlay2.style.display = 'block';
}

function closePopup2(){
    overlay2.style.display = 'none';
}

//TITRE h2 Votre recherche
let titreVotreRecherche = document.querySelector('.recherche');



function openModal2(){
    overlay2.style.display = 'block';
}



//Animation des Avions

function takeOff(){
    let takeOff = document.getElementById('takeOff');
    takeOff.innerHTML="&#xf5b0";

    setTimeout(function() {
        takeOff.innerHTML="&#xf072"
    }, 2000);
    setTimeout(function() {
        takeOff.innerHTML="&#xf072"
    }, 3000);
    setTimeout(function() {
        takeOff.innerHTML="&#xf5af"
    }, 5000);

}

takeOff();

setInterval(takeOff, 7000);

