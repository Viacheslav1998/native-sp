/**
 * only login page
 */
const login = 'http://hastle.test/register';

if(window.location.href == login) {

  function validatePassword(password, repeadPassword) {
    if(password !== repeadPassword) {
      return "пароли не совпадают";
    }
    if(password.length < 6) {
      return "пароль не должен быть меньше 6 символов.";
    }
    return null;
  }

  // function validationFields(name, ) {
  //   if()
  // }

  // get value from inputs
  const passwordField = document.getElementById("password");
  const repeadPasswordField = document.getElementById("repeatPassword");
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
const sp = document.getElementById("cl");

  sp.addEventListener("click", function(e){
    e.preventDefault();
    console.log('asdasd');
    const nameId = document.getElementById("inputName").value;
  });



}


export default {

}