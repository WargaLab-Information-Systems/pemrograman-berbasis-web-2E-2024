let hapus = document.getElementsByClassName('hapus');
let content = document.getElementsByClassName('content');
let ubah = document.getElementsByClassName('ubah');

let tambah = document.querySelector('.tambah');
let container = document.querySelector('.container');
tambah.addEventListener('click', function() {
    let isiTeks = prompt("Masukkan nama task : ")
    if (isiTeks === "") {
        alert("Judul kosong, coba lagi");
    } else {
        let teks = document.createTextNode(isiTeks);
        let div = document.createElement('div');
        let p1 = document.createElement('p');
        let p2 = document.createElement('p');
        let h3 = document.createElement('h3');
        h3.appendChild(teks);
        p1.innerHTML = 'Ubah';
        p2.innerHTML = 'Hapus';
        p1.classList.add('ubah');
        p2.classList.add('hapus');
        div.appendChild(h3);
        div.appendChild(p1);
        div.appendChild(p2);
        div.classList.add('content');
        container.appendChild(div);
        p2.addEventListener('click', function() {
            div.style.display = 'none';
        });
    }
});

for (let i = 0; i < hapus.length; i++) {
    hapus[i].addEventListener('click', function() {
        content[i].style.display = 'none';
    });
};

for (let j = 0; j < ubah.length; j++) {
    ubah[j].addEventListener('click', function() {
        ubah[j].parentElement.getElementsByTagName('h3')[0].innerHTML = prompt("Ubah nama : ");
    });
};

document.addEventListener('click', function(e) {
    const poke = document.querySelectorAll('.hapus');
    poke.forEach(item => {
        // console.log(item);
        // console.log(e.target);
        if (e.target == item) {
            item.addEventListener('click', function() {
                item.parentElement.style.display = 'none';
            });
        };
    });
});
