/**
 * only login page
 */
import modal from './modalHandler.js';

const register = 'http://hastle.test/register';

if(window.location.href == register) {

  /**
   * if it's useful anywhere else.
   * validation only Password
   */
  function validatePassword(password, repeatPassword) {
    if(password !== repeatPassword) {
      return "пароли не совпадают";
    }

    if (password.length < 6) {
      return "Пароль должен быть не меньше 6 символов";
    }
  
    if (!/[A-Z]/.test(password)) {
      return "Пароль должен содержать хотя бы одну заглавную букву";
    }
  
    if (!/[a-z]/.test(password)) {
      return "Пароль должен содержать хотя бы одну строчную букву";
    }
  
    if (!/[0-9]/.test(password)) {
      return "Пароль должен содержать хотя бы одну цифру";
    }
  
    if (!/[^a-zA-Z0-9]/.test(password)) {
      return "Пароль должен содержать хотя бы один спецсимвол (!, @, # и т.п.)";
    }

    return null;
  }
  
  /**
   * if it's useful anywhere else.
   * validation another fields
   */
  function validateFields(name, lastName, email, town, phone) {
    if(name.length < 2 || name.length > 20) {
      return "Имя должно быть от 2 до 20 символов";
    }
    if(lastName.length < 2 || lastName.length > 20) {
      return "Фамилия должна быть от 2 до 20 символов";
    }
    if (!/^[a-zA-Zа-яА-ЯёЁ\s-]+$/.test(name)) {
      return "Имя должно содержать только буквы";
    }
    if (!/^[a-zA-Zа-яА-ЯёЁ\s-]+$/.test(lastName)) {
      return "Фамилия должна содержать только буквы";
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      return "Некорректный email";
    }
    if(!town.trim()) {
      return "Нужно обязательно выбрать город";
    }
    if (!/^\+?[0-9\s\-\(\)]{7,15}$/.test(phone)) {
      return "Некорректный номер телефона";
    }

    return null;
  }

  // get pass values
  const passwordField = document.getElementById("password");
  const repeatPasswordField = document.getElementById("passwordAgain");
  
  // get another values
  const nameInput = document.getElementById("name");
  const lastNameInput = document.getElementById("lastName");
  const emailInput = document.getElementById("email");
  const townInput = document.getElementById("town");
  const phoneInput = document.getElementById("phone");

  // handler 
  function handleSubmit(event) {
    event.preventDefault();

    // password work
    const password = passwordField.value.trim();
    const repeatPassword = repeatPasswordField.value.trim();
    // pass validate
    const validationResult = validatePassword(password, repeatPassword);

    // another fields 
    const name = nameInput.value.trim() ;
    const lastName = lastNameInput.value.trim();
    const email = emailInput.value.trim();
    const town = townInput.value.trim();
    const phone = phoneInput.value.trim();
    // fields validate
    const validationResultFields = validateFields(name, lastName, email, town, phone);
    
    // error / fetch
    if(validationResultFields || validationResult) {
      modal.showModal(validationResultFields || validationResult); 
    } else {
      // modal.showModal("Успешно ! Данные приняты");
      const formData = {
        name: name, 
        lastName: lastName,
        email: email, 
        town: town,
        phone: phone,
        password: password
      };

      fetch('/person/save', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
      })
      .then(async response => {
        const contentType = response.headers.get('Content-Type');

        if(!response.ok) {
          let errorMessage = `Ошибка ${response.status}`;

          if(response.status === 404) {
            errorMessage = 'Проблема! Ресурс не найден 404';
          } else if (response.status === 500) {
            errorMessage = 'Внутренняя проблема сервера 500';
          } else if (contentType.includes('application/json')) {
            const errorJson = await response.json();
            errorMessage = errorJson.message || errorMessage;
          }

          throw new Error(errorMessage);
        }

        if (!contentType.includes('application/json')) {
          throw new Error('Некорректный ответ от сервера (ожидался JSON)');
        }

        return response.json();
      })
      .then(data => {
        if(data.success) {
          modal.showModal(data.message || 'Успешно');
          console.log('зарегистрирован успешно');
        } else {
          modal.showModal(data.message || 'Что то пошло не так');
          console.log(data.message);
        }
      })
      .catch(err => {
        console.error('Ошибка сети: ', err);
        modal.showModal(`${err.message}`);
      });
    }
  }

  const submit = document.getElementById("push");
  submit.addEventListener("click", handleSubmit);
  
  // close if is modal
  document.getElementById("modal-close")?.addEventListener("click", modal.closeModal);

}


export default {

}