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


//Animation des (icons) Avions

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

//Sad personnage

function sad(){
    let sad = document.getElementById('sad');
    sad.innerHTML="&#xf119";

    setTimeout(function() {
        sad.innerHTML="&#xf5b4"
    }, 2000);
    setTimeout(function() {
        sad.innerHTML="&#xf5b3"
    }, 4000);
    setTimeout(function() {
        sad.innerHTML="&#xf7a9"
    }, 6000);

}

sad();

setInterval(sad, 8000);


//Animation des photos section2

// var image1 = document.getElementById("image1");
// var image1 = document.getElementById("image1");
// var image1 = document.getElementById("image1");
// var image1 = document.getElementById("image1");
// var image1 = document.getElementById("image1");
// var image1 = document.getElementById("image1");
// var image1 = document.getElementById("image1");

var image1 = document.getElementById("image1");
var image3 = document.getElementById("image3");
var image6 = document.getElementById("image6");
var currentPos = 0;
var images = ["img/cirrus/cirrus3.jpg", "img/cessna/cessna1.jpg", "img/cessna/cessna3.jpg", "img/cessna/cessna4.jpg", "img/cessna/cessna5.jpg", "img/cessna/cessna7.jpg", "img/cessna/cessna8.jpg", "img/cessna/cessna9.jpg", "img/cessna/cessna12.jpg", "img/cessna/cessna13.jpg", "img/cirrus/cirrus5.jpg", "img/cirrus/cirrus6.jpg", "img/cirrus/cirrus7.jpg", "img/cirrus/cirrus8.jpg", "img/cirrus/cirrus9.jpg", "img/cirrus/cirrus11.jpg", "img/cirrus/cirrus12.jpg", "img/cirrus/cirrus14.jpg"];


// var images = ["image1", "image2", "image3", "image4", "image5", "image6", "image7", "image"]

function changeImg() {

    if (++currentPos >= images.Lenght)
        currentPos = 0;
    
        image1.src = images[currentPos];
}

setInterval(changeImg, 3000);

function changeImg3() {

    if (++currentPos >= images.Lenght)
        currentPos = 0;
    
        image3.src = images[currentPos];
}
setInterval(changeImg3, 3000);

function changeImg6() {

    if (++currentPos >= images.Lenght)
        currentPos = 0;
    
        image6.src = images[currentPos];
}
        
setInterval(changeImg6, 3000);

    // for (var i = 0; i < images.length; i++) {
    //     image1.src = images[i];
    // }

    


//section pourquoi choisir DonKair
//apparition de texte au passage de la souris

let divrow1 = document.querySelector('.row1');
let text1 = document.querySelector('.row1 .hidden-text');


divrow1.addEventListener('mouseover',appearancetext1);


function appearancetext1(){
    hidden.style.visibility = 'none';
}
