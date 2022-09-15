

// Signup Modal
// Get the modal
var sModal = document.getElementById("signupModal");

// Get the button that opens the modal
var sLink = document.getElementById("signupLink");

// Get the <span> element that closes the modal
var sCross = document.getElementById("closeSignupModal");

// When the user clicks on the button, open the modal
sLink.onclick = function () {
  sModal.style.display = "block";
}

// When the user clicks on (x), close the modal
sCross.onclick = function () {
  sModal.style.display = "none";
}

// Login Modal
// Get the modal
var lModal = document.getElementById("loginModal");

// Get the button that opens the modal
var lLink = document.getElementById("loginLink");

// Get the <span> element that closes the modal
var lCross = document.getElementById("closeLoginModal");

// When the user clicks on the button, open the modal
lLink.onclick = function () {
  lModal.style.display = "block";
}

// When the user clicks on (x), close the modal
lCross.onclick = function () {
  lModal.style.display = "none";
}