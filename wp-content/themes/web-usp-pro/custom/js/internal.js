/* menu */
document.querySelector('.header .hamburguer').onclick = function() {
  var menu = document.querySelector('.header');
  menu.classList.toggle('open');

  var hambuguer = document.querySelector('.header .hamburguer');
  hambuguer.classList.toggle('open');

  var body = document.querySelector('body');
  body.classList.toggle('open');
};

/* header fixed */
window.addEventListener('scroll', function(){
  var header = document.querySelector('header');

  header.classList.toggle('fixed', window.scrollY > 20);
  header.classList.toggle('internal', window.scrollY > 20);
});

/* header fixed */
window.onload = function() {
  var header = document.querySelector('header');

  header.classList.toggle('fixed', window.scrollY > 20);
  header.classList.toggle('internal', window.scrollY > 20);
};

/* js scroll */
const links = document.querySelectorAll(".js-scroll");

for (const link of links) {
  link.addEventListener("click", clickHandler);
}

function clickHandler(e) {
  const href = this.getAttribute("href");
  const offsetTop = document.querySelector(href).offsetTop;
  const width = window.screen.width;

  if(width <= 992){
    var header = 110;
  }else{
    var header = 110;
  }
  
  scroll({
    top: offsetTop - header,
    behavior: "smooth"
  });
}