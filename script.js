'use strict';

//const { Carousel } = require("bootstrap");

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
var currentPos2 = 0;
var currentPos3 = 0;
var currentPos4 = 0;
var images = ["img/cirrus/cirrus3.jpg", "img/cessna/cessna9.jpg", "img/cessna/cessna1.jpg", "img/cessna/cessna3.jpg", "img/cessna/cessna4.jpg", "img/cessna/cessna5.jpg"];
var images2 = [ "img/cirrus/cirrus6.jpg", "img/cirrus/cirrus14.jpg","img/cirrus/cirrus7.jpg", "img/cirrus/cirrus9.jpg", "img/cirrus/cirrus11.jpg"];
var images3 = [ "img/cessna/cessna8.jpg", "img/cessna/cessna9.jpg", "img/cessna/cessna12.jpg", "img/cessna/cessna13.jpg" , "img/cirrus/cirrus5.jpg",];

function changeImg() {

    if (++currentPos >= images.length)
        currentPos = 0;
    
        image1.src = images[currentPos];

    console.log(currentPos)
}
setInterval(changeImg, 3000);

function changeImg3() {

    if (++currentPos2 >= images2.length)
        currentPos2 = 0;
    
        image3.src = images2[currentPos2];
}
setInterval(changeImg3, 3000);

function changeImg6() {

    if (++currentPos3 >= images3.length)
        currentPos3 = 0;
    
        image6.src = images3[currentPos3];
}
setInterval(changeImg6, 3000);


