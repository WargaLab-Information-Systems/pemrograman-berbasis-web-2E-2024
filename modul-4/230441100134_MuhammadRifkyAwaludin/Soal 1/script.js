function toggleDropdown() { //ini merupakan variabel var
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
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
  
  //let biasanya digunakan untuk mendeklarasikan variabel yang nilainya akan berubah.
  // const biasanya digunakan untuk mendeklarasikan variabel yang nilainya tidak akan berubah setelah diinisialisasi.
  //var biasa digunakan untuk mendeklarasikan variabel.