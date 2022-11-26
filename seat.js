const seats = document.querySelectorAll(".row .seat:not(.occupied)");
const seatContainer = document.querySelector(".row-container");
const count = document.getElementById("count");
const total = document.getElementById("total");
const movieSelect = document.getElementById("movie");

// populateUI();

let ticketPrice = +movieSelect.value;

// Save selected movie index and price
function setMovieData(movieIndex, moviePrice) {
  localStorage.setItem("selectedMovieIndex", movieIndex);
  localStorage.setItem("selectedMoviePrice", moviePrice);
}
 


function updateSelectedCount() {
  let NormalSeats = document.querySelectorAll(".normal.selected");
  let VipSeats = document.querySelectorAll(".Vip.selected");
  localStorage.setItem("NormalSeat", JSON.stringify(NormalSeats));

  const vipTicketPrice = 350;
  const ticketPrice = 150;
  let selectedNormalSeats;
  let selectedVipSeats;

  // for(i=0; i<NormalSeats.length; i++){
  //   if(NormalSeats[i].contains("selected")){
  //     selectedNormalSeats.push(NormalSeats[i])
  //   }
  // }
  normalSeatsIndex = [...NormalSeats].map(function(seat) {
    return [...seats].indexOf(seat);
  });
  
  localStorage.setItem("NormalSeats", JSON.stringify(normalSeatsIndex));
 
  vipSeatsIndex = [...VipSeats].map(function(seat) {
    return [...seats].indexOf(seat);
  });
  localStorage.setItem("VipSeats", JSON.stringify(vipSeatsIndex));

  let selectedNormalSeatsCount = NormalSeats.length;
  let selectedVipSeatsCount = VipSeats.length;
// adding selectedvipseat to the localstorage
   localStorage.setItem('vipSeatsIndex', JSON.stringify(selectedVipSeatsCount));
// adding selectednormal seat to the localstorage
  localStorage.setItem('NormalSeatsIndex', JSON.stringify(selectedNormalSeatsCount));


  count.textContent = selectedNormalSeatsCount + selectedVipSeatsCount;
  const totalPrice = (selectedNormalSeatsCount * ticketPrice) + ((selectedVipSeatsCount * vipTicketPrice));

  total.textContent = totalPrice;

  localStorage.setItem('ticketPrice', JSON.stringify(totalPrice));
  
  
}
//document.getElementById('price').innerHTML(totalPrice);

// // Get data from localstorage and populate
// function populateUI() {
//   const normalSeats = JSON.parse(localStorage.getItem("NormalSeats"));

//   if (normalSeats !== null && normalSeats.length > 0) {
//     seats.forEach(function(seat, index) {
//       if (normalSeats.indexOf(index) > -1) {
//         seat.classList.add("selected");
//       }
//     });
//   }

//   const selectedMovieIndex = localStorage.getItem("selectedMovieIndex");

//   if (selectedMovieIndex !== null) {
//     movieSelect.selectedIndex = selectedMovieIndex;
//   }
// }

// Movie select event

movieSelect.addEventListener("change",  function(e) {
  ticketPrice = +movieSelect.value;
  localStorage.setMovieData(e.target.selectedIndex, e.target.value);
  updateSelectedCount();


});

// Adding selected class to only non-occupied seats on 'click'

seatContainer.addEventListener("click", function(e) {
  if (
    e.target.classList.contains("seat") &&
    !e.target.classList.contains("occupied")
  ) {
    e.target.classList.toggle("selected");
    updateSelectedCount();
  }
  
});

// Initial count and total rendering
updateSelectedCount();


