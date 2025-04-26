// forms
const testForm = document.getElementById("testForm")
const testPushData = document.getElementById("checkStatic")
const formFile = document.getElementById("formFile")
const anotherFormSelectorTest = document.querySelector(".anotherForm")

// get imagen
const fileInput = document.getElementById("file")

/**
 * form for file
 * test get and manipulation file image - types [jpg, jpeg, png, gif] - memory-size[1000]
 */
formFile.addEventListener("submit", async (e) => {
    e.preventDefault()  
    const file = fileInput.files[0]
    console.log(file)
});


/**
 * test data for use append
 * Just check the data and accept the answer
 * @response text but you can use json
 * there's no try/catch method
 */
testPushData.addEventListener("submit", async (e) => {
  e.preventDefault();

  const testData = new FormData()
  const date = new Date().toLocaleDateString()

  testData.append("name", "Slavik")
  testData.append("email", "nice.lorad@mail.com")
  testData.append("title", "move and move")
  testData.append("date", date)
  testData.append("description", "this is a very interesting page and news - you can use it right now")
  testData.append("assessment", "5")

  const response = await fetch("/api/post-test-data", {
    method: 'POST',
    body: testData
  });

  if(!response.ok) {
    console.error("Error Network - ошибка")
    return;
  }

  const result = await response.text();

  // const result = await response.json();
  console.log('ответ сервера: ' + result);
});


/**
 * Another async form send-data
 * setTimeout - send timer
 * use [await]
 * @return json 
 */
async function sendData() {

  // create object data
  const data = new FormData();

  // add data into formData
  data.append('name', 'Steven')
  data.append('email', 'stv@mail.com')
  data.append('title', 'tiny defender')
  data.append('age', '1993')

  try {
    const response = await fetch('/api/testGetDataOneMoreTime', {
      method: 'POST',
      body: data
    });

    if(!response.ok) {
      console.error('Error to call data');
      return;
    }

    const result = await response.json();
    console.log(result.data)
  } catch(error) {
    console.error("Error response: " + error)
  }
}

setTimeout(sendData, 1500);


/**
 * Another form. 
 * We use then / setTimeout
 */

function testPersonData() {
  // create obj FormData 
  const person = new FormData();

  // get data
  person.append('name', 'Jack')
  person.append('email', 'oxxwrd@gmail.com')
  person.append('population', 5)

  // send data get response
  fetch('/api/testGetFakePerson', {
    method: "POST",
    body: person
  })

  .then(response => {
    if(!response.ok) {
      throw new Error("Ошибка при отправке данных")
    }
    return response.json()
  })

  .then(result => {
    console.log('ответ от сервера: ', result )
  })

  .catch(error => {
    console.error('ошибка запроса: ', error)
  });
}

setTimeout(testPersonData, 1500);



export default {

}