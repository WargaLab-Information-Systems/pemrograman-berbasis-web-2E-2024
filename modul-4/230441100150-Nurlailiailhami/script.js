let tasks = [
    { name: "PBO", completed: false },
    { name: "PBB", completed: false },
    { name: "PBI", completed: false }
];

function addTask() {
    const taskInput = document.getElementById("taskInput");
    const taskName = taskInput.value.trim();
    if (taskName !== "") {
        tasks.push({ name: taskName, completed: false });
        renderTasks();
        taskInput.value = "";
    }
}

function editTask(index) {
    const newName = prompt("Ubah nama tugas:", tasks[index].name);
    if (newName !== null && newName.trim() !== "") {
        tasks[index].name = newName.trim();
        renderTasks();
    }
}

function deleteTask(index) {
    tasks.splice(index, 1);
    renderTasks();
}

function toggleTask(index) {
    tasks[index].completed = !tasks[index].completed;
    renderTasks();
}

function renderTasks() {
    const taskList = document.getElementById("taskList");
    taskList.innerHTML = "";
    tasks.forEach((task, index) => {
        const li = document.createElement("li");
        li.innerHTML = `
            <span class="${task.completed ? 'completed' : ''}">${task.name}</span>
            <button  onclick="toggleTask(${index})">${task.completed ? 'Belum Selesai' : 'Selesai'}</button>
            <button  onclick="editTask(${index})">Edit</button>
            <button onclick="deleteTask(${index})">Hapus</button>
        `;
        taskList.appendChild(li);
    });
}

renderTasks();