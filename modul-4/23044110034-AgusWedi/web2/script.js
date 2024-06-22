const todo = document.forms.todo;

todo.addEventListener('submit', addTask);

function addTask(e) {
  e.preventDefault();// Mencegah form untuk melakukan reload halaman
  const IO = this.elements;
  const data = IO.task.value;
  const list = document.querySelector('ol');
  const item = document.createElement('li');
  const text = document.createElement('p');
  text.textContent = data;
  IO.task.value = "";
  item.append(text);
  list.append(item);

// Menambahkan tombol Delete

  const dumpBtn = document.createElement('button')
  dumpBtn.textContent = "Delete";
  dumpBtn.type = 'button';
  item.append(dumpBtn);
  dumpBtn.addEventListener('click', dumpTask)

  // Menambahkan tombol Edit

  const editBtn = document.createElement('button');
  editBtn.textContent = "Edit";
  editBtn.type = 'button';
  item.append(editBtn);
  editBtn.addEventListener('click', editTask);

  // Menambahkan tombol Save untuk menyimpan perubahan edit

  const saveBtn = document.createElement('button');
  saveBtn.textContent = 'Save';
  saveBtn.type = 'button';
  saveBtn.classList.add('hide');
  item.append(saveBtn);
  saveBtn.addEventListener('click', saveEdit);
}

function dumpTask(e) {
  this.parentElement.remove();//menghapus elemen li pada saat tombol delete di klik
}

function editTask(e) {
  const item = this.parentElement;
  const text = item.firstElementChild;
  text.setAttribute('contenteditable', true);// Mengaktifkan mode edit pada teks tugas dengan menghapus atribut contenditable
  this.classList.add('hide');// Menyembunyikan tombol Edit
  this.nextElementSibling.classList.remove('hide');//Menampilkan tombol Save
}

function saveEdit(e) {
  const item = this.parentElement;
  const text = item.firstElementChild;
  text.removeAttribute('contenteditable');// Menonaktifkan mode edit pada teks tugas
  this.classList.add('hide');// Menyembunyikan tombol Save
  this.previousElementSibling.classList.remove('hide');// Menampilkan tombol Edit kembali
}