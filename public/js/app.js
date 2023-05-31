var bioInput = document.querySelector('#bio-input');
var bioButton = document.querySelector('#bio-button');

var hideBio = () => {

    bioInput.style.display = 'none';

};

window.onload = hideBio;

var showBio = (event) => {
    
    event.preventDefault();
    bioInput.style.display = 'block';
    

};

bioButton.addEventListener('click', showBio);