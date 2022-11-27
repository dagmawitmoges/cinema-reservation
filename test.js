function setMovieData(movieIndex, moviePrice) {
  localStorage.setItem("selectedMovieIndex", movieIndex);
  localStorage.setItem("selectedMoviePrice", moviePrice);
}

function set_movie_data_test() {
  const test_casea = 1;
  const test_caseb = 150;

  setMovieData(test_casea, test_caseb);
  if (localStorage.getItem("selectedMovieIndex") == test_casea) {
    var first = document.getElementById("testa");
    first.outerHTML = "==> Stores the correct movie index";
  } else {
    var first = document.getElementById("testa");
    first.outerHTML = "==> Expected to get '" + test_casea + "' but got [" + localStorage.getItem("selectedMovieIndex") + "]";
  }

  if (localStorage.getItem("selectedMoviePrice") == test_caseb) {
    var second = document.getElementById("testb");
    second.outerHTML = "==> Stores the correct movie price";
  } else {
    var second = document.getElementById("testb");
    second.outerHTML = "==> Expected to get '" + test_caseb + "' but got [" + localStorage.getItem("selectedMoviePrice") + "]";
  }
}

set_movie_data_test();
