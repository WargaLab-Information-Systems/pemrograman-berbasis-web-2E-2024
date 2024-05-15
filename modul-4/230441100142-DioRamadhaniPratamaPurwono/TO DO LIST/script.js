let tasks = [
  { text: "PBO", completed: false },
  { text: "PBW", completed: false },
  { text: "PBD", completed: false }
];

function renderTasks() {
  const taskList = document.getElementById("taskList");
  taskList.innerHTML = tasks.map((task, index) => `
    <li class="task-item">
      <label>
        <input type="checkbox" onchange="toggleTask(${index})" ${task.completed ? 'checked' : ''}>
        <span class="${task.completed ? 'completed' : ''}" id="taskText${index}" onclick="editTask(${index})">${task.text}</span>
      </label>
      <button onclick="deleteTask(${index})">Delete</button>
    </li>
  `).join('');
}

function addTask() {
  const taskInput = document.getElementById("taskInput");
  const taskText = taskInput.value.trim();
  
  if (taskText !== "") {
    tasks.push({ text: taskText, completed: false });
    taskInput.value = "";
    renderTasks();
  }
}

function toggleTask(index) {
  tasks[index].completed = !tasks[index].completed;
  renderTasks();
}

function editTask(index) {
  const newText = prompt("Enter new task text:", tasks[index].text);
  if (newText !== null) {
    tasks[index].text = newText.trim();
    renderTasks();
  }
}

function deleteTask(index) {
  tasks.splice(index, 1);
  renderTasks();
}

renderTasks();
