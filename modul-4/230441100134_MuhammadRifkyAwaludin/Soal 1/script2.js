function addTask() {
    var taskInput = document.getElementById("taskInput");
    var taskList = document.getElementById("taskList");
    var taskText = taskInput.value.trim();

    if (taskText !== "") {
        var li = document.createElement("li");
        li.innerHTML = `
            <span>${taskText}</span>
            <button onclick="toggleTask(this)">Selesai</button>
            <button onclick="editTask(this)">Edit</button>
            <button onclick="deleteTask(this)">Hapus</button>
        `;
        taskList.appendChild(li);
        taskInput.value = "";
    }
}

function toggleTask(button) {
    var taskText = button.previousElementSibling;
    taskText.classList.toggle("completed");
    if (button.textContent === "Selesai") {
        button.textContent = "Belum Selesai";
    } else {
        button.textContent = "Selesai";
    }
}

function editTask(button) {
    var taskText = button.previousElementSibling.previousElementSibling;
    var newText = prompt("Edit task:", taskText.textContent);
    if (newText !== null) {
        taskText.textContent = newText.trim();
    }
}

function deleteTask(button) {
    var li = button.parentElement;
    li.remove();
}
