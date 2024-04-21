//fetch users
const container = document.querySelector(".container");
const searchForm = document.getElementById("search-form")
// Add users 
const addUser = document.querySelector("a.add-user");
const addUserFormContainer = document.querySelector(".addUser");
const addUserForm = document.querySelector(".addUserForm");

const regEx = /^[\p{L} ]+$/u;
const cneRegEx = /^[A-Z]+[0-9]+$/;
const filRegExp = /^[A-Z]+$/;
const emailRegEx = /^\S+@\S+\.\S+$/;

const fields = [
    { id: "nom", errorMessage: "Nom invalide." },
    { id: "prenom", errorMessage: "Prénom invalide." },
    { id: "email", errorMessage: "Email invalide." },
    { id: "password", errorMessage: "Le mot de passe doit contenir au moins 8 caractères." },
];


const exits = document.querySelectorAll(".exit");
exits.forEach((exit)=>{
    clearOverlayOnClick(exit,overlay);
})
