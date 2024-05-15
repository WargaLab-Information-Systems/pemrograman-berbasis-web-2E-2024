// fungsi untuk menambahkan tugas baru
function addTask() {
    var taskInput = document.getElementById("taskInput");
    var taskText = taskInput.value.trim();
    if (taskText !== "") {
      var ul = document.getElementById("taskList");
      var li = document.createElement("li");
      li.innerHTML = `
        <span>${taskText}</span>
        <div>
          <button onclick="completeTask(this)">Selesai</button>
          <button class="edit" onclick="editTask(this)">Edit</button>
          <button onclick="deleteTask(this)">Hapus</button>
        </div>`;
      ul.appendChild(li);
      taskInput.value = "";
    }
  }
  
  // fungsi untuk menandai tugas sebagai selesai
  function completeTask(button) {
    var li = button.parentElement.parentElement;
    li.classList.toggle("completed");
  }
  
  // fungsi untuk mengedit tugas
  function editTask(button) {
    var li = button.parentElement.parentElement;
    var span = li.querySelector("span");
    var newText = prompt("Edit task:", span.textContent);
    if (newText !== null && newText.trim() !== "") {
      span.textContent = newText.trim();
    }
  }
  
  // fungsi untuk menghapus tugas
  function deleteTask(button) {
    var li = button.parentElement.parentElement;
    li.remove();
  }
  