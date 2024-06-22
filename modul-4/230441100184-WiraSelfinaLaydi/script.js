function toggleDropdown(){
    var dropdown = document.getElementById("myDropdown");
  if (dropdown.style.display === "block") {
    dropdown.style.display = "none";
  } else {
    dropdown.style.display = "block";
  }
  }

document.getElementById("push").addEventListener("click", function() {
    var newTaskInput = document.querySelector('#newtask input');
    var taskName = newTaskInput.value.trim();
    if (taskName !== "") {
        var newTask = document.createElement("div");
        newTask.classList.add("task");
        newTask.innerHTML = `
            <span class="taskname">${taskName}</span>
            <button class="edit"><i class="fas fa-edit"></i></button>
            <button class="delete"><i class="fas fa-trash"></i></button>
            <button class="completed"><i class="fas fa-check-square"></i></button>
            `;
        document.getElementById("tasks").appendChild(newTask);
        newTaskInput.value = ""; 
        document.querySelectorAll(".taskname").forEach(function(task) {
            task.addEventListener("click", toggleTask);
        });        
        newTask.querySelector(".completed").addEventListener("click", toggleCompleted);
        newTask.querySelector(".edit").addEventListener("click", editTask);
        newTask.querySelector(".delete").addEventListener("click", deleteTask);
        newTask.querySelector(".taskname").addEventListener("click", toggleTask);
        
    } else {
        alert("Isi terlebih dahulu!");
    }
});
document.querySelectorAll(".edit").forEach(function(editButton) {
    editButton.addEventListener("click", editTask);
});
document.querySelectorAll(".completed").forEach(function(completedButton) {
    completedButton.addEventListener("click", toggleCompleted);
});
document.querySelectorAll(".delete").forEach(function(deleteButton) {
    deleteButton.addEventListener("click", deleteTask);
});
function editTask() {
    var taskContainer = this.parentElement;
    var task = taskContainer.querySelector(".taskname");
    var currentTaskText = task.textContent.trim();
    var newTaskText = prompt("Edit list:", currentTaskText);
    if (newTaskText !== null && newTaskText !== "") {
        task.textContent = newTaskText;
    }
}
function toggleCompleted() {
    var taskContainer = this.parentElement;
    taskContainer.classList.toggle("completed");
}
function toggleTask() {
    this.classList.toggle("completed");
}
function deleteTask() {
    var taskContainer = this.parentElement;
    taskContainer.remove();
}
