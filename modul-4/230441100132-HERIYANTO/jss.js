// Fungsi untuk menambahkan tugas ke dalam daftar
function addTask(taskName) {
    var newTask = document.createElement("div");
    newTask.classList.add("task");
    newTask.innerHTML = `
        <input type="checkbox" class="task-checkbox">
        <span class="taskname">${taskName}</span>
        <button class="edit"><i class="fas fa-edit"></i></button>
        <button class="delete"><i class="fas fa-trash"></i></button>
        `;
    document.getElementById("tasks").appendChild(newTask);

    // Menambahkan event listener untuk tombol edit dan delete pada tugas yang baru dibuat
    newTask.querySelector(".edit").addEventListener("click", editTask);
    newTask.querySelector(".delete").addEventListener("click", deleteTask);
    newTask.querySelector(".task-checkbox").addEventListener("change", markCompleted);
}

// Memanggil fungsi addTask untuk setiap tugas yang ada saat memuat halaman
document.addEventListener("DOMContentLoaded", function() {
    var initialTasks = ["Belajar JavaScript", "Belajar HTML dan CSS", "Mengerjakan Tugas"];
    initialTasks.forEach(function(task) {
        addTask(task);
    });
});

// Fungsi untuk mengedit tugas
function editTask() {
    var taskContainer = this.parentElement;
    var task = taskContainer.querySelector(".taskname");
    var currentTaskText = task.textContent.trim();
    var newTaskText = prompt("Edit task:", currentTaskText);
    if (newTaskText !== null && newTaskText !== "") {
        task.textContent = newTaskText;
    }
}

// Fungsi untuk menghapus tugas
function deleteTask() {
    var taskContainer = this.parentElement;
    taskContainer.remove();
}

// Fungsi untuk menandai tugas sebagai selesai
function markCompleted() {
    var taskContainer = this.parentElement;
    if (this.checked) {
        taskContainer.classList.add("completed");
    } else {
        taskContainer.classList.remove("completed");
    }
}
