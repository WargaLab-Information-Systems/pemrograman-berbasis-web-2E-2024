const fieldInput = document.getElementById("tambah").value;
const addButton = document.getElementsByClassName("tombol-tambah")[0];
addButton.addEventListener("click", function () {
  const fieldInput = document.getElementById("tambah");
  let trLenght = document.getElementsByTagName("tr").length - 1;
  if (fieldInput.classList.contains("nama")) {
    const trElement = document.createElement("tr");
    const tdElement = document.createElement("td");
    const pElement = document.createElement("p");
    const divElementEdit = document.createElement("div");
    const divElementDelete = document.createElement("div");
    pElement.textContent = fieldInput.value;
    tdElement.appendChild(pElement);
    trElement.appendChild(tdElement);
    document.getElementById("table").appendChild(trElement);
    divElementEdit.setAttribute("class", "edit");
    divElementDelete.setAttribute("class", "delete");
    tdElement.appendChild(divElementEdit);
    tdElement.appendChild(divElementDelete);
    fieldInput.classList.remove("nama");
    fieldInput.classList.add("nim");
    fieldInput.value = "";
  } else if (fieldInput.classList.contains("nim")) {
    const trElement = document.getElementsByTagName("tr")[trLenght];
    const tdElement = document.createElement("td");
    const pElement = document.createElement("p");
    const divElementEdit = document.createElement("div");
    const divElementDelete = document.createElement("div");
    pElement.textContent = fieldInput.value;
    tdElement.appendChild(pElement);
    trElement.appendChild(tdElement);
    document.getElementById("table").appendChild(trElement);
    divElementEdit.setAttribute("class", "edit");
    divElementDelete.setAttribute("class", "delete");
    tdElement.appendChild(divElementEdit);
    tdElement.appendChild(divElementDelete);
    fieldInput.classList.remove("nim");
    fieldInput.classList.add("angkatan");
    fieldInput.value = "";
  } else if (fieldInput.classList.contains("angkatan")) {
    const trElement = document.getElementsByTagName("tr")[trLenght];
    const tdElement = document.createElement("td");
    const divElementEdit = document.createElement("div");
    const divElementDelete = document.createElement("div");
    const pElement = document.createElement("p");
    pElement.textContent = fieldInput.value;
    tdElement.appendChild(pElement);
    trElement.appendChild(tdElement);
    document.getElementById("table").appendChild(trElement);
    divElementEdit.setAttribute("class", "edit");
    divElementDelete.setAttribute("class", "delete");
    tdElement.appendChild(divElementEdit);
    tdElement.appendChild(divElementDelete);
    fieldInput.classList.remove("angkatan");
    fieldInput.classList.add("nama");
    fieldInput.value = "";
  }
});

document.addEventListener("click", function (e) {
  console.log(e);
  if (e.target.classList.contains("edit")) {
    const newValue = prompt("Masukkan Nilai Baru");
    if (newValue !== null) {
      const pElement = e.target.parentNode.querySelector("p");
      pElement.textContent = newValue;
    }
  } else if (e.target.classList.contains("delete")) {
    e.target.parentNode.parentNode.style.display = "none";
  }
});
