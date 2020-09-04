// Affichage du mot de passe

// Sélection 
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#pass');

// Écoute le clic et remplace le type par password ou text selon le cas
togglePassword.addEventListener('click', function (e) {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});