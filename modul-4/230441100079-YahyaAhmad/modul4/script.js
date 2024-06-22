///penambahan item
document.getElementById('addForm').addEventListener('submit', function (event) {
  event.preventDefault();
  var newItem = document.getElementById('newItem').value;
  if (newItem === '') return;
  var itemList = document.getElementById('itemList');
  var newItemElement = document.createElement('li');
  newItemElement.className = 'item';
  newItemElement.innerHTML = `
       <input type="checkbox">
        <label>${newItem}</label>
        <button class="edit">Edit</button>
        <button class="delete">Delete</button>
    `;
  itemList.appendChild(newItemElement);
  document.getElementById('newItem').value = '';
  newItemElement.querySelector('button.edit').addEventListener('click', function () {
    var label = newItemElement.querySelector('label');
    var newText = prompt('Enter the new text:');
    if (newText === null || newText === '') return;
    label.textContent = newText;
  });
  newItemElement.querySelector('button.delete').addEventListener('click', function () {
    itemList.removeChild(newItemElement);
  });
});

///pengurutan item
document.getElementById('sortButton').addEventListener('click', function () {
  var itemList = document.getElementById('itemList');
  var items = Array.from(itemList.children);
  items.sort(function (a, b) {
    var aCompleted = a.querySelector("input[type='checkbox']").checked;
    var bCompleted = b.querySelector("input[type='checkbox']").checked;
    if (aCompleted && !bCompleted) return -1;
    if (!aCompleted && bCompleted) return 1;
    return 0;
  });
  for (var i = 0; i < items.length; i++) {
    itemList.appendChild(items[i]);
  }
});

///pencarian item
document.getElementById('filterInput').addEventListener('input', function () {
  var filterInput = document.getElementById('filterInput');
  var filterText = filterInput.value.toLowerCase();
  var itemList = document.getElementById('itemList');
  var items = Array.from(itemList.children);
  items.forEach(function (item) {
    var label = item.querySelector('label');
    if (label.textContent.toLowerCase().includes(filterText)) {
      item.style.display = 'flex';
    } else {
      item.style.display = 'none';
    }
  });
});
