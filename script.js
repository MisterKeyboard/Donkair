'use strict';

let btnPopup1 = document.querySelector('.btnPopup1');
let overlay1 = document.querySelector('.overlay1');
let btnClose1 = document.querySelector('.btnClose1');


let btnPopup2 = document.querySelector('.btnPopup2');
let overlay2 = document.querySelector('.overlay2');
let btnClose2 = document.querySelector('.btnClose2');

btnPopup1.addEventListener('click',openModal1);
btnClose1.addEventListener('click',closePopup1);

btnPopup2.addEventListener('click',openModal2);
btnClose2.addEventListener('click',closePopup2);




function openModal1(){
    overlay1.style.display = 'block';
}

function closePopup1(){
    overlay1.style.display = 'none';
}



function openModal2(){
    overlay2.style.display = 'block';
}

function closePopup2(){
    overlay2.style.display = 'none';
}
