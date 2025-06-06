/**
 * only login page
 */

// import modal from './modalHandler.js';

if(window.location.pathname === '/login') {
  
  const emailInput = document.getElementById('email');
  const passwordInput = document.getElementById('password');

  function validate(email, password) {
    if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      return "Некорректный email";
    }

    if(password.length < 6) {
      return "Пароль должен быть не меньше 6 символов";
    }
  }

  function handleLogin(event) {
    event.preventDefault();

    const email = emailInput.value.trim;
    const password = passwordInput.value.trim;

    const validationResult = validate(email, password);
    
    if(validationResult) {
      modal.showModal(validationResult);
    } else {
      const formData = {
        email: email,
        password: password,
      };
      
      fetch('/person/login', {
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
            errorMessage = 'Ресурс не найден 404';
          } else if (response.status === 500) {
            errorMessage = 'Внутреняя проблема с сервера 500 ' + errorText;
          } else if (contentType.includes('application/json')) {
            const errorJson = await response.json();
            errorMessage = errorJson.message || errorMessage; 
          }

          throw new Error(errorMessage);
        }

        if(!contentType.includes('application/json')) {
          throw new Error('Некорректный ответ от сервар (ожидался json)');
        }

        return response.json();
      })
      .then(data => {
        if(data.success) {
          modal.showModal(data.message || 'Успешно - Идет перенаправление ...');
          setTimeout(() => {
            window.location.href = '/a4min/profile'
          }, 1500);
        } else {
          modal.showModal(data.message || 'Что то пошло не так');
          console.error(data.message);
        }
      })
      .catch(err => {
        modal.showModal(`${err.message}`);
      });
    }
  }

  const summit = document.getElementById('push');
  submit.addEventListener('click', handleLogin);

  // close if is modal 
  document.getElementById('modal-close')?.addEventListener('click', modal.closeModal);

}

export default {}