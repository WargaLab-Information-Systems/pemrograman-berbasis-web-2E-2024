// Mendapatkan elemen input dan daftar tugas dari HTML
const inputBox = document.getElementById("input-box");
const listContainer = document.getElementById("list-container");
// Fungsi untuk menambahkan tugas baru ke dalam daftar
function addTask(){
     // Periksa apakah input kosong
    if(inputBox.value === ''){
        alert("Tulis Dulu yaa sayang!");
    }

    else{
        // Buat elemen li baru untuk tugas
        let li = document.createElement("li");
        li.innerHTML = inputBox.value; // Isi elemen li dengan teks dari input
        listContainer.appendChild(li);// Tambahkan elemen li ke dalam daftar tugas
        // Buat elemen span (untuk ikon hapus) dan tambahkan ke elemen li
        let span = document.createElement("span");// Isi dengan karakter X
        span.innerHTML ="\u00d7";
        li.appendChild(span);
    }
    inputBox.value = "";// Kosongkan input setelah menambahkan tugas
    saveData();// Simpan data ke localStorage
}
// Tambahkan event listener untuk mengatur tugas sebagai "checked" atau menghapusnya
listContainer.addEventListener("click", function(e){
    if(e.target.tagName === "LI"){
        e.target.classList.toggle("checked");// Toggle class "checked" pada elemen li
        saveData();
    }
    else if(e.target.tagName === "SPAN"){
        e.target.parentElement.remove(); // Hapus elemen li saat ikon X diklik
        saveData();
    }
}, false);
// Fungsi untuk menyimpan data ke localStorage
function saveData(){
    localStorage.setItem("data", listContainer.innerHTML);
}
function showTask(){
    listContainer.innerHTML = localStorage.getItem("data");
}
// Fungsi untuk mengubah tugas
// Fungsi untuk mengubah tugas
function editTask(e) {
    if (e.target.tagName === "LI") {
        let newText = prompt("Edit your task:", e.target.textContent);
        if (newText !== null && newText !== '') {
            // Ubah teks tugas
            e.target.textContent = newText;
            saveData();
        }
    } else if (e.target.classList.contains("edit-btn")) {
        let li = e.target.parentElement;
        let currentText = li.textContent.trim();
        let newText = prompt("Edit your task:", currentText);
        if (newText !== null && newText !== '') {
            li.textContent = newText;
            saveData();
        }
    }
}

// Tambahkan event listener untuk mengubah tugas saat di-klik
listContainer.addEventListener("click", editTask);


// Tambahkan event listener untuk mengubah tugas saat di-klik
listContainer.addEventListener("click", editTask);
showTask()