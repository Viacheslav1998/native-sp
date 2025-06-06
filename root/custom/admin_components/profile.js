/**
* profile 
* edit data person
*/
import validate from '../custom_components/register.js';
import modal from '../custom_components/modalHandler.js';

const form_person = document.getElementById('person');

// get another values
const nameInput = document.getElementById("name");
const lastNameInput = document.getElementById("lastName");
const emailInput = document.getElementById("email");
const phoneInput = document.getElementById("phone");


function personSubmit(event) {
  event.preventDefault();

  // formating values
  const name = nameInput.value.trim();
  const lastName = lastNameInput.value.trim();
  const email = emailInput.value.trim();
  const phone = phoneInput.value.trim();

  const validationResult = validate.validateFields(name, lastName, email, phone);

  if(validationResult) {
    modal.showModal(validationResult); 
  } else {

    const person = {
      name: name,
      lastName: lastName,
      email: email,
      phone: phone
    };

    fetch('person/edit', {
      method: 'POST',
      headers: {
        'Content-Type': 'Application/json'
      },
      body: JSON.stringify(person)
    })
    .then(async response => {
      const contentType = response.headers.get('Content-Type');
      if(!response.ok) {
        let errorMessage = `Ошибка ${response.status}`;

        if(response.status === 404) {
          errorMessage = 'Такого ресурса нет 404';
        } else if (response.status === 500) {
          errorMessage = 'Внутренняя ошибка сервера 500';
        } else if(contentType.includes('applicaton/json')) {
          const errorJson = await response.json();
          errorMessage = errorJson.message || errorMessage;
        }

        throw new Error(errorMessage);
      }

      if(!contentType.includes('applicatin/json')) {
        throw new Error('Некорректный ответ от сервера - ожидался json'); 
      }

      return response.json();
    })
    .then(data => {
      if(data.success) {
        modal.showModal(data.message || 'Успешно сохранено !');
        console.log('Данные успешно изменены');
      } else {
        modal.showModal(data.message || 'Что то пошло не так !');
        console.error(data.message);
      }
    })
    .catch(err => {
      console.error(`Ошибка сети: ${err.message}`);
      modal.showModal(`${err.message}`);
    });
  }
}

const push = document.getElementById('person-push');
push.addEventListener('click', personSubmit);

export default {
  
}