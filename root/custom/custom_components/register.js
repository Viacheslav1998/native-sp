/**
 * only login page
 */
const register = 'http://hastle.test/register';

if(window.location.href == register) {

  function validatePassword(password, repeatPassword) {
    if(password !== repeatPassword) {
      return "пароли не совпадают";
    }

    if (password.length < 6) {
      return "Пароль должен быть не меньше 6 символов";
    }
  
    // if (!/[A-Z]/.test(password)) {
    //   return "Пароль должен содержать хотя бы одну заглавную букву";
    // }
  
    // if (!/[a-z]/.test(password)) {
    //   return "Пароль должен содержать хотя бы одну строчную букву";
    // }
  
    // if (!/[0-9]/.test(password)) {
    //   return "Пароль должен содержать хотя бы одну цифру";
    // }
  
    // if (!/[^a-zA-Z0-9]/.test(password)) {
    //   return "Пароль должен содержать хотя бы один спецсимвол (!, @, # и т.п.)";
    // }

    return null;
  }

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

  // get value from inputs
  const passwordField = document.getElementById("password");
  const repeatPasswordField = document.getElementById("passwordAgain");


  const submit = document.getElementById("button");

  // handler 
  function handleSubmit(event) {
    event.preventDefault();

    // password work
    const password = passwordField.value.trim();
    const repeatPassword = repeatPasswordField.value.trim();
    // pass validate
    const validationResult = validatePassword(password, repeatPassword);

    // another files work

    
    // error / fetch
    if(validationResult) {

      console.log(validationResult);
      alert(validationResult);

    } else {

      const formData = {
        password: password,
      };


    }


  }

}


export default {

}