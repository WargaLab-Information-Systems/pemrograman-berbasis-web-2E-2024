function toggleDropdown(){
  var dropdown = document.getElementById("myDropdown");
if (dropdown.style.display === "block") {
  dropdown.style.display = "none";
} else {
  dropdown.style.display = "block";
}
}


let input = document.querySelector('.entered-list');
let addBtn = document.querySelector('.add-list');
let tasks = document.querySelector('.tasks');

// Add btn disabled
input.addEventListener('keyup',() => {
  if (input.value.trim() != 0) {
    addBtn.classList.add('active');
  } else {
    addBtn.classList.remove('active');
  }
});

//add new item to list
addBtn.addEventListener('click', () => {
  if (input.value.trim() != 0){
    let newItem = document.createElement('li');
    newItem.classList.add('item');
    newItem.innerHTML = `
    <p> ${input.value} </p>
        <div class="item-btn">
          <i class="fa-solid
           fa-pen-to-square"></i>
           <i class="fa-solid fa-xmark"></i>
           <i class="fa-solid fa-pencil-alt"></i>
        </div>
    `
    tasks.appendChild(newItem);
    input.value = '';
  }else{
    alert('Please enter a task');
  }
})

//delete item from the list
tasks.addEventListener('click', (e) => {
  if (e.target.classList.contains('fa-xmark')) {
    e.target.parentElement.parentElement.remove();
  }
})
//edit item
tasks.addEventListener('click', (e) => {
  if (e.target.classList.contains('fa-pencil-alt')) {
    let newContent = prompt('Enter new content:');
    if (newContent !== null && newContent.trim() !== '') {
      e.target.parentElement.previousElementSibling.textContent = newContent;
    }
  }
});

//mark item as completed
tasks.addEventListener('click', (e) =>{
  if (e.target.classList.contains('fa-pen-to-square')) {
    e.target.parentElement.parentElement.classList.toggle('completed');
  }
})
