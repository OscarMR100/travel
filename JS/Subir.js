window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("botonSubir").style.display = "block";
  } else {
    document.getElementById("botonSubir").style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0; /* Para navegadores Safari */
  document.documentElement.scrollTop = 0; /* Para otros navegadores */
}
