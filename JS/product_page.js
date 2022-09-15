const slides = document.getElementsByClassName("slide");
console.info(slides.length);

let slideIndex = 1;
showSlide(slideIndex);

var x = 1;
// change slide with the prev/next button
function moveSlide(moveStep) {
  showSlide(slideIndex += moveStep);
}


function showSlide(n) {
  console.info(n);
  let i;
  const slides = document.getElementsByClassName("slide");
  const buttonPrev = document.getElementById("buttonprev")
  const buttonNext = document.getElementById("buttonnext")

  if (n == (slides.length-2) || slides.length < 5) {
    buttonNext.disabled = true;
  } else {
    buttonNext.disabled = false;
  }

  // if (n > slides.length) { slideIndex = 1 }
  // if (n < 1) { slideIndex = slides.length }

  // hide all slides
  for (i = 0; i < slides.length; i++) {
    slides[i].classList.add('hidden');
  }

  // show the active slide
  if (n == 1) {
    buttonPrev.disabled = true;
    for (i = 0; i < 4; i++) {
      slides[i].classList.remove('hidden');
    }
  } else {
    buttonPrev.disabled = false;
  }

  if (n > x) {
    for (i = x; i < (x + 4); i++) {
      slides[i].classList.remove('hidden');
    } x = x + 1
  }

  if (n <= x) {
    for (i = (n - 1); i < (n + 3); i++) {
      slides[i].classList.remove('hidden');
    } x = x - 1
  }

  // slides[slideIndex - 1].classList.remove('hidden');
}

// Store Modal
// Get the modal
var storeModal = document.getElementById("storeModal");

// Get the button that opens the modal
var storeLink = document.getElementById("storeLink");

// Get the <span> element that closes the modal
var storeCross = document.getElementById("closeStoreModal");

// When the user clicks on the button, open the modal
storeLink.onclick = function () {
  storeModal.style.display = "block";
}

// When the user clicks on (x), close the modal
storeCross.onclick = function () {
  storeModal.style.display = "none";
}
