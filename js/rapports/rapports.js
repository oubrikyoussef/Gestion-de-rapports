const exits = document.querySelectorAll(".exit");
exits.forEach((exit)=>{
    clearOverlayOnClick(exit,overlay);
})

//fetch rapports
const reportsContainer = document.querySelector(".container");
const searchForm = document.getElementById("search-form");
//add rapports
const addRapport = document.querySelector("a.add-rapport");
const addRapportFormContainer = document.querySelector(".addRapport");
const addRapportForm = document.querySelector(".addRapportForm");

