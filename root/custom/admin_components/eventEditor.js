const form = document.getElementById("formEvent")

form.addEventListener("submit", async (e) => {
  e.preventDefault()

  const formData = new FormData(form)
  console.log(formData)
});

function testEventEditor() {
  console.log('editr module work')
}

export default {

}