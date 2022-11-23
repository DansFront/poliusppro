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

if(window.scrollY > 20){
  	var header = document.querySelector('header');

  	header.classList.toggle('fixed');
  	header.classList.toggle('internal');
}

const links = document.querySelectorAll(".js-scroll");

for (const link of links) {
  link.addEventListener("click", clickHandler);
}

function clickHandler(e) {
  e.preventDefault();

  for (const link of links) {
    link.classList.remove('active');
  }

  /* obtendo a url atual */
  
  this.classList.toggle('active');
  const href = this.getAttribute("href");
  const newhref = href.replace('/', '');
  const offsetTop = document.querySelector(newhref).offsetTop;
  const width = window.screen.width;

  if(width <= 992){
    var header = 100;
  }else{
    var header = 100;
  }

  scroll({
    top: offsetTop - header,
    behavior: "smooth"
  });
}