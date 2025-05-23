/**
 * only login page
 */
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

  // get file if is exists

  // добавить все поля 
  // получить все значение для другой проверки 
  // дозакончить условие - если оба возвращают что то или нет
  // получение через инпутс гет пут инпутс помойму функция преобразовать в строку а там в массив
  // пробувать кохранять данные в бд - 
  // не забудь роль по умолчания 
  // присваивается user и 
  // в зависимости от роли который дает админ 
  // могут быть видны определенные структуры сайта

  const submit = document.getElementById("button");

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

    // check file input
    
    // error / fetch
    if(validationResult && validationResultFields) {
      console.log(validationResult || validationResultFields);
    } else {


      console.log('it`s okey');
      // const formData = {
      //   password: password,
      // };

    }


  }

}


export default {

}