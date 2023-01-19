function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
  }
}


function toggleMenu() {
  const navbar = document.querySelector('.navbar');
  const burger = document.querySelector('.burger');
  burger.addEventListener('click', () => {
    navbar.classList.toggle('show-nav')
  })
}
toggleMenu();

function change1(id) {
  let changebtn = document.getElementById(id);
  if (changebtn.style.backgroundColor == "rgba(253, 225, 46, 0.813)"){
    changebtn.style.backgroundColor = "rgb(123, 255, 123)";
  }
  else {
    changebtn.style.backgroundColor = "rgba(253, 225, 46, 0.813)";
  }
}
let slideIndex = 0;


