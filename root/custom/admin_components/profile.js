/**
* profile 
* edit data person
*/
import validate from "../custom_components/register.js";
import modal from './modalHandler.js';

const form_person = document.getElementById('person');

// get another values
const nameInput = document.getElementById("name");
const lastNameInput = document.getElementById("lastName");
const emailInput = document.getElementById("email");
const phoneInput = document.getElementById("phone");

const person = {

};

fetch('person/edit', {
  method: 'POST',
  headers: {
   'Content-Type': 'Application/json'
  },
  body: JSON.stringify(person)
})
.then({

})