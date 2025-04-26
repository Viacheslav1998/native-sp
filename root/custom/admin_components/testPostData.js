// forms
const testForm = document.getElementById("testForm")
const testPushData = document.getElementById("checkStatic")
const testFile = document.getElementById("formFile")
const anotherFormSelectorTest = document.querySelector(".anotherForm")

// get imagen
const fileInput = document.getElementById("file")

// form test file
formFile.addEventListener("submit", async (e) => {
    const data = new FormData(formFile)
    e.preventDefault()
    
    const file = fileInput.files[0]
    console.log(file)
});

// form use append
// create table = save data
testPushData.addEventListener("submit", async (e) => {
  const testData = new FormData()
  const date = new Date().toLocaleDateString()

  testData.append("name", "Slavik")
  testData.append("email", "nice.lorad@mail.com")
  testData.append("title", "move and move")
  testData.append("date", date)
  testData.append("description", "this is a very interesting page and news - you can use it right now")
  testData.append("assessment", "5")

  const response = await fetch("api/get-data", {
    method: 'POST',
    body: new FormData(testData)
  });

  const result = await response.json();
});


export default {

}