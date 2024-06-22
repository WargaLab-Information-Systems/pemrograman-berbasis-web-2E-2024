let tasks = [];

function addTask() {
    const taskInput = document.getElementById('taskInput');
    const task = taskInput.value.trim();
    if (task === '') return;
    
    tasks.push({ id: Date.now(), text: task, completed: false });
    renderTasks();
    taskInput.value = '';
}

function deleteTask(id) {
    tasks = tasks.filter(task => task.id !== id);
    renderTasks();
}

function editTask(id) {
    const newText = prompt('Edit task:');
    if (!newText) return;

    tasks = tasks.map(task => {
        if (task.id === id) {
            return { ...task, text: newText };
        }
        return task;
    });
    renderTasks();
}

function toggleCompleted(id) {
    tasks = tasks.map(task => {
        if (task.id === id) {
            return { ...task, completed: !task.completed };
        }
        return task;
    });
    renderTasks();
}

function renderTasks() {
    const taskList = document.getElementById('taskList');
    taskList.innerHTML = '';
    
    tasks.forEach(task => {
        const li = document.createElement('li');
        li.className = task.completed ? 'completed' : '';
        li.innerHTML = `
            <input type="checkbox" onchange="toggleCompleted(${task.id})" ${task.completed ? 'checked' : ''}>
            <span>${task.text}</span>
            <button onclick="editTask(${task.id})">Edit</button>
            <button onclick="deleteTask(${task.id})">Delete</button>
        `;
        taskList.appendChild(li);
    });
}

// Load saved tasks from localStorage
document.addEventListener('DOMContentLoaded', () => {
    const savedTasks = JSON.parse(localStorage.getItem('tasks'));
    if (savedTasks) {
        tasks = savedTasks;
        renderTasks();
    }
});

// Save tasks to localStorage when tasks change
function saveTasks() {
    localStorage.setItem('tasks', JSON.stringify(tasks));
}

setInterval(saveTasks, 1000); // Save tasks every second
