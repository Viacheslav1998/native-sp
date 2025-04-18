const form = document.getElementById("formEvent")


form.addEventListener("submit", async (e) => {
  e.preventDefault()

  const formData = new FormData(form)
  console.log(formData)
});


// just example get data / fake placeholder
fetch('https://reqres.in/api/users/2')
  .then(res => res.json())
  .then(data => console.log(data));

export default {

}