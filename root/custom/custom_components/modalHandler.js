/**
 * handler alert message
 * error / success
 * functional show/close
 */
function showModal(content) {
  const modal = document.getElementById("modal");
  const list = document.getElementById("modal-list");

  if(!modal || !list) return;

  list.innerHTML = "";

  // support for strings or arrays
  if(Array.isArray(content)) {
    content.forEach((msg) => {
      const li = document.createElement("li");
      li.textContent = msg;
      list.appendChild(li);
    });
  } else {
    const li = document.createElement("li");
    li.textContent = content;
    list.appendChild(li);
  }

  modal.style.display = "block";
}

function closeModal() {
  const modal = document.getElementById("modal");
  if(modal) {
    modal.style.display = "none";
  }
}

export default {
  showModal,
  closeModal
}