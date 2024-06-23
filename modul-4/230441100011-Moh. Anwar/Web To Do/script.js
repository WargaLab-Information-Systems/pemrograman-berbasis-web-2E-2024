// Function to add a new task
function addTask() {
    var taskInput = document.getElementById("taskInput").value;
    var taskDescription = document.getElementById("taskDescription").value;
    var deadline = document.getElementById("deadline").value;
   
    if (taskInput === "") {
        alert("Silakan masukkan judul tugas!");
        return;
    }

    var li = document.createElement("li");
    li.classList.add("task-item");

    var taskInfo = document.createElement("div");
    taskInfo.classList.add("task-info");

    var taskTitle = document.createElement("h3");
    taskTitle.textContent = taskInput;

    var taskDesc = document.createElement("p");
    taskDesc.textContent = taskDescription;

    var deadlineText = document.createElement("p");
    deadlineText.textContent = "Deadline: " + new Date(deadline).toLocaleString();

    taskInfo.appendChild(taskTitle);
    taskInfo.appendChild(taskDesc);
    taskInfo.appendChild(deadlineText);

    var editButton = createButton("Ubah", function() {
        var newText = prompt("Masukkan judul baru:", taskTitle.textContent);
        if (newText !== null) {
            taskTitle.textContent = newText;
            updateLocalStorage();
        }
    });

    var deleteButton = createButton("Hapus", function() {
        li.remove();
        updateLocalStorage();
    });

    var completeCheckbox = document.createElement("input");
    completeCheckbox.type = "checkbox";
    completeCheckbox.classList.add("task-checkbox");
    completeCheckbox.onchange = function() {
        li.classList.toggle("completed");
        updateLocalStorage();
    };

    li.appendChild(completeCheckbox);
    li.appendChild(taskInfo);
    li.appendChild(editButton);
    li.appendChild(deleteButton);

    var taskList = document.getElementById("taskList");
    taskList.appendChild(li);

    document.getElementById("taskInput").value = "";
    document.getElementById("taskDescription").value = "";
    document.getElementById("deadline").value = "";
   
    updateLocalStorage();
}

// Function to create a button with specified text and click handler
function createButton(text, clickHandler) {
    var button = document.createElement("button");
    button.textContent = text;
    button.onclick = clickHandler;
    return button;
}

// Function to filter tasks
function filterTasks(status) {
    var taskItems = document.querySelectorAll(".task-item");
    taskItems.forEach(task => {
        if (status === "all") {
            task.style.display = "block";
        } else if (status === "completed" && task.classList.contains("completed")) {
            task.style.display = "block";
        } else if (status === "uncompleted" && !task.classList.contains("completed")) {
            task.style.display = "block";
        } else {
            task.style.display = "none";
        }
    });
}

// Function to search tasks
function searchTasks() {
    var searchInput = document.getElementById("search").value.toLowerCase();
    var taskItems = document.querySelectorAll(".task-item");
    taskItems.forEach(task => {
        var taskTitle = task.querySelector("h3").textContent.toLowerCase();
        if (taskTitle.includes(searchInput)) {
            task.style.display = "block";
        } else {
            task.style.display = "none";
        }
    });
}

// Function to clear all completed tasks
function clearCompleted() {
    var completedTasks = document.querySelectorAll(".completed");
    completedTasks.forEach(task => {
        task.remove();
    });
    updateLocalStorage();
}

// Function to delete selected tasks
function deleteSelected() {
    var checkboxes = document.querySelectorAll(".task-checkbox");
    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            checkbox.parentElement.remove();
        }
    });
    updateLocalStorage();
}

// Function to update local storage
function updateLocalStorage() {
    var tasks = [];
    document.querySelectorAll(".task-item").forEach(task => {
        var taskTitle = task.querySelector("h3").textContent;
        var taskDesc = task.querySelector("p:nth-of-type(1)").textContent;
        var deadlineText = task.querySelector("p:nth-of-type(2)").textContent.replace("Deadline: ", "");
        var isCompleted = task.classList.contains("completed");

        tasks.push({
            title: taskTitle,
            description: taskDesc,
            deadline: deadlineText,
            completed: isCompleted
        });
    });
    localStorage.setItem("tasks", JSON.stringify(tasks));
}

// Function to load tasks from local storage
window.onload = function() {
    var tasks = JSON.parse(localStorage.getItem("tasks"));
    if (tasks) {
        tasks.forEach(task => {
            var li = document.createElement("li");
            li.classList.add("task-item");
            if (task.completed) {
                li.classList.add("completed");
            }

            var taskInfo = document.createElement("div");
            taskInfo.classList.add("task-info");

            var taskTitle = document.createElement("h3");
            taskTitle.textContent = task.title;

            var taskDesc = document.createElement("p");
            taskDesc.textContent = task.description;

            var deadlineText = document.createElement("p");
            deadlineText.textContent = "Deadline: " + task.deadline;

            taskInfo.appendChild(taskTitle);
            taskInfo.appendChild(taskDesc);
            taskInfo.appendChild(deadlineText);

            var editButton = createButton("Ubah", function() {
                var newText = prompt("Masukkan judul baru:", taskTitle.textContent);
                if (newText !== null) {
                    taskTitle.textContent = newText;
                    updateLocalStorage();
                }
            });

            var deleteButton = createButton("Hapus", function() {
                li.remove();
                updateLocalStorage();
            });

            var completeCheckbox = document.createElement("input");
            completeCheckbox.type = "checkbox";
            completeCheckbox.classList.add("task-checkbox");
            completeCheckbox.onchange = function() {
                li.classList.toggle("completed");
                updateLocalStorage();
            };
            completeCheckbox.checked = task.completed;

            li.appendChild(completeCheckbox);
            li.appendChild(taskInfo);
            li.appendChild(editButton);
            li.appendChild(deleteButton);

            document.getElementById("taskList").appendChild(li);
        });
    }
};
