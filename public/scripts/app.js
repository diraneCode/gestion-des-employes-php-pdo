//Heure et Date

const date = document.querySelector('.date');
const day = new Date();
date.textContent = `${day.getDay()}/${day.getDate()}/${day.getFullYear()}`;
const h2 = document.querySelector('.card-logo h2');

setInterval(()=>{
    const date = new Date();
    h2.textContent = `${date.getHours()} : ${date.getMinutes()} : ${date.getSeconds()} AM`;
}, 1000)

//Modal Form
const btnShowForm = document.querySelector('.btnShowForm');
const formAddEmploye = document.querySelector('form.add');
const container = document.querySelector('.container');
const btnCloseForm = document.querySelector('form.add .close');
btnShowForm.addEventListener('click', () => {
    formAddEmploye.classList.add('show');
    container.style.opacity = '0.5';
});

btnCloseForm.addEventListener('click', () => {
    formAddEmploye.classList.remove('show');
    container.style.opacity = '1';
})