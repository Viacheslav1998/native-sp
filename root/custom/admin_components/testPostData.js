// just example handler and post data 
const form = document.getElementById("form")
const anotherFormSelectorTest = document.querySelector(".anotherForm")

// get imagen
const fileInput = document.querySelector(".imageInput")

// first form
form.addEventListener("submit", async (e) => {
    const data = new FormData(form)
    e.preventDefault()
    
    const file = fileInput.files[0]
    console.log(file)

});