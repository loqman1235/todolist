const todoInp = document.getElementById("todoInp");
const submitBtn = document.querySelector(".todo_btn");
const todosList = document.querySelector(".todos_list");
const modalContainer = document.querySelector(".modal_backdrop");

// Add a todo (Insert Todo)
submitBtn.addEventListener("click", (e) => {
  e.preventDefault();

  let url = "insert.php";
  let formData = new FormData();
  formData.append("todoVal", todoInp.value);
  fetch(url, {
    method: "POST",
    body: formData,
  })
    .then((res) => res.json())
    .then((data) => {
      let errorEl = document.createElement("div");
      if (data.response === "error") {
        errorEl.classList.add("error");
        errorEl.classList.add("fadeOut");
        errorEl.innerText = data.message;
      } else {
        getTodos();
        errorEl.classList.remove("error");
        errorEl.classList.add("fadeOut");
        errorEl.classList.add("success");
        errorEl.innerText = data.message;
      }

      document
        .querySelector(".todo_body")
        .insertAdjacentElement("afterbegin", errorEl);

      errorEl.addEventListener("animationend", () => errorEl.remove());
      todoInp.value = "";
    });
});

// Delete Todo
function deleteTodo(todoId) {
  let url = "deleteTodo.php";
  let formData = new FormData();
  formData.append("todoId", todoId);

  if (confirm("Are you sure you want to delete this todo ? ")) {
    fetch(url, {
      method: "POST",
      body: formData,
    })
      .then((res) => res.json())
      .then((result) => {
        if (result.response === "success") {
          getTodos();
        }
      });
  }
}

// Get todos (Display todos)
function getTodos() {
  fetch("getTodos.php")
    .then((res) => res.json())
    .then((todos) => {
      todosList.innerHTML = todos;
    });
}

// Update Todo
function updateTodo(todoId) {
  modalContainer.classList.add("active");
  const editInp = document.getElementById("editInp");
  let todoIdInput = document.createElement("input");
  todoIdInput.value = todoId;
  todoIdInput.type = "hidden";
  todoIdInput.classList.add("todoInputId");
  modalContainer.appendChild(todoIdInput);
  let url = "updateTodo.php";
  let formData = new FormData();
  formData.append("todoId", todoId);

  fetch(url, {
    method: "POST",
    body: formData,
  })
    .then((res) => res.json())
    .then((result) => {
      if (result.response === "success") {
        editInp.value = result.data.todo_name;
      }
    });
}

// Edit Todo
const editBtn = document.getElementById("editBtn");

editBtn.addEventListener("click", (e) => {
  e.preventDefault();
  const todoInputId =
    editBtn.parentElement.parentElement.parentElement.lastElementChild;

  const todoInput =
    editBtn.parentElement.previousElementSibling.firstElementChild;

  let url = "editTodo.php";
  let formData = new FormData();
  formData.append("todoInputId", todoInputId.value);
  formData.append("todoName", todoInput.value);

  fetch(url, {
    method: "POST",
    body: formData,
  })
    .then((res) => res.json())
    .then((result) => {
      let errorEl = document.createElement("div");
      if (result.response === "error") {
        errorEl.classList.add("error");
        errorEl.classList.add("fadeOut");
        errorEl.innerText = result.message;
      } else {
        getTodos();
        errorEl.classList.remove("error");
        errorEl.classList.add("fadeOut");
        errorEl.classList.add("success");
        errorEl.innerText = result.message;
      }

      document
        .querySelector(".todo_body")
        .insertAdjacentElement("afterbegin", errorEl);

      errorEl.addEventListener("animationend", () => errorEl.remove());
      modalContainer.classList.remove("active");
    });
});

// Display Todos
getTodos();

// Close Modal
const closeModalBtn = document.getElementById("closeModalBtn");
closeModalBtn.addEventListener("click", () =>
  modalContainer.classList.remove("active")
);
