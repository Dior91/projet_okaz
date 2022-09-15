// Signup Modal
// Get the modal
// const storeSelect = document.querySelector(".select_store");
// const storeForm = document.getElementById("searchStoreForm");
var storeModal = document.getElementById("store_searchModal");

// Get the <span> element that closes the modal
var storeCross = document.getElementById("closeStore_searchModal");
// When the user clicks on (x), close the modal
storeCross.onclick = function () {
  storeModal.style.display = "none";
}

// When the user clicks on the button, open the modal
// handleSubmit(event) 


// storeSelect.addEventListener('change', event => {
//   // location.href ="index.php?store=" + event.target.value;
//   // const storeModal = document.getElementById("store_searchModal");
//   // storeModal.style.display = "block";
//   const storeForm = document.getElementById("searchStoreForm");
//   storeForm.submit();
//   storeForm.addEventListener('submit', evt => {
//     console.info("back here");
//     const storeModal = document.getElementById("store_searchModal");
//     storeModal.style.display = "block";
//     evt.preventDefault();
//   })
// });

// storeForm.addEventListener('submit', evt => {
//   console.info('Hi there');
//   // encodeOptimizedSVGDataUri(storeForm);
//   // const storeModal = document.getElementById("store_searchModal");
//   // storeModal.style.display = "block";
// });



// onchange="location.href= "http://localhost/okaz/index.php?store=" + value)"