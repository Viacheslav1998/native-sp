// just example handler and post data 
const testForm = document.getElementById("testForm")
const secondAppendForm = document.getElementById("appendForm")
const anotherFormSelectorTest = document.querySelector(".anotherForm")

// get imagen
const fileInput = document.getElementById("file")

// first testForm
testForm.addEventListener("submit", async (e) => {
    const data = new FormData(testForm)
    e.preventDefault()
    
    const file = fileInput.files[0]
    console.log(file)
});

// form use append
// create table = save data
secondAppendForm.addEventListener("submit", async (e) => {
  const testData = new FormData()
  const date = new Date().toLocaleDateString()

  testData.append("name", "Slavik")
  testData.append("email", "nice.lorad@mail.com")
  testData.append("title", "move and move")
  testData.append("date", date)
  testData.append("description", "this is a very interesting page and news - you can use it right now")
  testData.append("assessment", "5")

  // await см у себя в учебнике и создай талицу для проверки работоспособности твоей системы

});


export default {

}