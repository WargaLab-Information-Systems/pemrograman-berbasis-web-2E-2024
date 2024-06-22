const selectBtn = document.getElementById('select-btn');
const text = document.getElementById('text');
const options = document.querySelectorAll('.option'); 

selectBtn.addEventListener('click', function() {
    selectBtn.classList.toggle('active');
});

options.forEach(option => {
    option.addEventListener('click', function() { 
        text.textContent = this.textContent;
        selectBtn.classList.remove('active');
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const nextTodoListOption = document.querySelector('.option[href="indeks.html"]');
    if(nextTodoListOption) {
        nextTodoListOption.addEventListener("click", function() {
            window.location.href = this.getAttribute("href");
        });
    }
});
