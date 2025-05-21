/**
 * only login page
 */
const register = 'http://hastle.test/register';

if(window.location.href == register) {

  function validatePassword(password, repeadPassword) {
    if(password !== repeadPassword) {
      return "пароли не совпадают";
    }
    if(password.length < 6) {
      return "пароль не должен быть меньше 6 символов.";
    }
    return null;
  }

  function validateFields(name, lastName, email, town) {

  }

  // get value from inputs
  const passwordField = document.getElementById("password");
  const repeadPasswordField = document.getElementById("passwordAgain");
  const submit = document.getElementById("button");

  // handler 
  function handleSubmit(event) {
    event.preventDefault();

    const password = passwordField.value.trim();
    const repeadPassword = repeadPasswordField.value.trim();

    const validationResult = validatePassword(password, repeadPassword);

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