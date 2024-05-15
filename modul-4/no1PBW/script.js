// Contoh data informasi gunung dengan gambar
const mountainData = {
  "Gunung Everest": {
    info: "Gunung Everest adalah gunung tertinggi di dunia dengan ketinggian 8.848 meter di atas permukaan laut.",
    image: "everest.jpeg"
    
  },
  "Gunung Kilimanjaro": {
    info: "Gunung Kilimanjaro adalah gunung tertinggi di Afrika dengan ketinggian 5.895 meter di atas permukaan laut.",
    
  },
  "Gunung Fuji": {
    info: "Gunung Fuji adalah gunung tertinggi di Jepang dengan ketinggian 3.776 meter di atas permukaan laut.",
    
  }
};

function showMountainInfo(mountainName) {
  const infoContainer = document.getElementById('info-container');
  const mountainInfo = mountainData[mountainName];
  
  const imageElement = document.createElement('img');
  imageElement.src = mountainInfo.image;
  imageElement.alt = mountainName;
  infoContainer.appendChild(imageElement);

  const infoText = document.createElement('p');
  infoText.textContent = mountainInfo.info;
  infoContainer.appendChild(infoText);
}

document.addEventListener('DOMContentLoaded', function() {
  const dropdownLinks = document.querySelectorAll('.dropdown-content a');
  dropdownLinks.forEach(function(link) {
      link.addEventListener('click', function(e) {
          e.preventDefault();
          const mountainName = e.target.textContent;
          showMountainInfo(mountainName);
      });
  });
});
