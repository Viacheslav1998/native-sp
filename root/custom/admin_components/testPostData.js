// just example handler and post data 
const testForm = document.getElementById("testForm")
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

export default {

}