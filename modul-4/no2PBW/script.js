
const inputBox = document.getElementById("input-box");
const listContainer = document.getElementById("list-container");

function addTask() {
    if (inputBox.value === '') {
        alert("You must write something!");
    } else {
        let li = document.createElement("li");
        let span = document.createElement("span");
        li.innerHTML = inputBox.value;
        span.innerHTML = "\u00d7";
        li.appendChild(span);
        listContainer.appendChild(li);
        span.addEventListener("click", function () {
            li.remove();
            saveData();
        });
        li.addEventListener("click", function () {
            editTask(li);
        });
    }
    inputBox.value = "";
}

listContainer.addEventListener("click", function (e) {
    if (e.target.tagName === "LI") {
        e.target.classList.toggle("checked");
        saveData();
    }
}, false);

function editTask(li) {
    let text = li.textContent;
    let newText = prompt("Edit task:", text.trim());
    if (newText !== null && newText !== "") {
        li.textContent = newText;
        // Tambah event listener penghapusan setelah mengedit
        li.addEventListener("click", function () {
            li.remove();
            saveData();
        });
        saveData();
    }
}

function saveData() {
    localStorage.setItem("data", listContainer.innerHTML);
}

function showTask() {
    listContainer.innerHTML = localStorage.getItem("data");
}

showTask();
