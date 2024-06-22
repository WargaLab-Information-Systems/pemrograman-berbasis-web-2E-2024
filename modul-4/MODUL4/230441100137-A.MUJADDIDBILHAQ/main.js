window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}



// window.addEventListener("click", function(e) {
//   if (!event.target.matches('.dropbtn')) {
//     var dropdowns = document.getElementsByClassName("dropdown-content");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show');
//       }
//     }
//   }
// })
function toggleDropdown() {
  var dropdownMenu = document.querySelector(".dropdown-content");
  dropdownMenu.classList.toggle("show");
}

// const buttonDrop = document.querySelector(".dropbtn");
// buttonDrop.addEventListener("click", function() {
//   let dropMenu = document.getElementById("myDropdown");
//   dropMenu.classList.toggle("show");
//   alert("Ok")
// })

let inputBx = document.querySelector('#inputBx');
        let list = document.querySelector('#list');

        inputBx.addEventListener("keyup", function(event){
            if (event.key === "Enter") {
                addItem(this.value);
                this.value = "";
            }
        });

        let addItem = (inputValue) => {
            let listItem = document.createElement("li");
            listItem.innerHTML = `${inputValue} <button  onclick="editItem(this)">Edit</button> <button  onclick="deleteItem(this)">Delete</button>`;

            listItem.addEventListener("click", function(){
                this.classList.toggle("done"); 
            });

            list.appendChild(listItem);
        }

        let deleteItem = (item) => {
            // deleteItem.classList.add("red-background");
            item.parentElement.remove();
        }



        let editItem = (item) => {
            let newValue = prompt("Edit item:", item.parentElement.firstChild.textContent.trim());
            if (newValue !== null) {
                item.parentElement.firstChild.textContent = newValue;
            }
        }