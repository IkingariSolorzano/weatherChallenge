const button = document.getElementById('search');
const searchbar = document.getElementById('searchbar');
const spin = document.getElementById('loader');
const resultado = document.getElementById('results');
let resultadoMsj = document.createElement('div');
let latitude;
let longitude;

document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        spin.remove();
    }, 5500);

    
}




);

button.addEventListener('click', function (e) {
    e.preventDefault();
    ciudad = searchbar.value;
    window.location.href = `./search?ciudad=${ciudad}`;
});

window.addEventListener('keyup', function (e) {
    e.preventDefault();
    if (e.code == 'Enter') {
        button.click();

    }
});






