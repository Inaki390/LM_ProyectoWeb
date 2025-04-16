document.addEventListener('DOMContentLoaded', () => {
  // SLIDER
  const slides = document.querySelectorAll('#slider .slide');
  let current = 0;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.remove('active');
      if (i === index) {
        slide.classList.add('active');
      }
    });
  }

  function nextSlide() {
    current = (current + 1) % slides.length;
    showSlide(current);
  }

  setInterval(nextSlide, 2500);

  // BUILD ALEATORIA
  const campeones = [
    'yasuo.jpg', 'nunu.jpg', 'mordekaiser.jpg', 'Braum.jpg',
    'Vladimir.jpg', 'yone.jpg', 'darius.jpg', 'kalista.jpg',
    'riven.jpg', 'sona.jpg'
  ];

  const objetos = [
    'Corazon.jpg', 'Tormento.jpg', 'guinsoo.jpg', 'warmog.jpg', 'sanguinaria.jpg', 'sombrero.jpg', 'zhonyas.jpg', 'cordura.jpg', 'filo.jpg', 'huracan.jpg', 'morellonomicon.jpg', 'creagrietas.jpg'
  ];

  const generateBuildButton = document.getElementById('generateBuild');
  const randomChampionImage = document.getElementById('randomChampion');
  const itemImages = document.querySelectorAll('.build-item');

  if (generateBuildButton && randomChampionImage && itemImages.length > 0) {
    generateBuildButton.addEventListener('click', () => {
      const randomChamp = campeones[Math.floor(Math.random() * campeones.length)];
      randomChampionImage.src = `img/${randomChamp}`;

      const selectedItems = [];
      while (selectedItems.length < 3) {
        const item = objetos[Math.floor(Math.random() * objetos.length)];
        if (!selectedItems.includes(item)) selectedItems.push(item);
      }

      itemImages.forEach((img, i) => {
        img.src = `img/${selectedItems[i]}`;
      });
    });
  } else {
    console.warn("Elementos del randomizador no encontrados.");
  }
});
