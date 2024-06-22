let tasks = [];

function addTask() {
    const taskInput = document.getElementById("input-box");
    const taskName = taskInput.value.trim();
    if (taskName !== " MASUKAN  ") {
        tasks.push({ name: taskName, completed: false });
        taskInput.value = "";
        renderTasks();
    } else {
        alert("Please enter a task name.");
    }
}

function editTask(index) {
    const newName = prompt("Enter new task name:", tasks[index].name);
    if (newName !== null && newName.trim() !== "") {
        tasks[index].name = newName.trim();
        renderTasks();
    }
}

function renderTasks() {
    const taskList = document.getElementById("taskList");
    taskList.innerHTML = "";
    tasks.forEach((task, index) => {
        const li = document.createElement("li");
        li.textContent = task.name;
        if (task.completed) {
            li.classList.add("checked");
        }
        li.addEventListener("click", () => {
            toggleTask(index);
        });

        const deleteSpan = document.createElement("span");
        deleteSpan.innerHTML = "&times;";
        deleteSpan.classList.add("delete-btn"); 

        deleteSpan.addEventListener("click", (event) => {
            event.stopPropagation();
            deleteTask(index);
        });

        const editSpan = document.createElement("span");
        editSpan.innerHTML = "&#9998;";
        editSpan.classList.add("edit-btn"); 

        editSpan.addEventListener("click", (event) => {
            event.stopPropagation();
            editTask(index);
        });

        li.appendChild(editSpan);
        li.appendChild(deleteSpan);
        taskList.appendChild(li);
    });
}

function toggleTask(index) {
    tasks[index].completed = !tasks[index].completed;
    renderTasks();
}

function deleteTask(index) {
    tasks.splice(index, 1);
    renderTasks();
}
