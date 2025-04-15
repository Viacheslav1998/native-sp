const form = document.getElementById("formEvent")

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(form);
  console.log(formData);
});

function testUserForm() {
  console.log('work module useform')
}

export default {
  testUserForm
};