const linkkss = document.querySelectorAll(".js-scroll-politicy");

for (const linkkk of linkkss) {
  linkkk.addEventListener("click", clickHandlerrr);
}

function clickHandlerrr(e) {
  e.preventDefault();
  
  const href = this.getAttribute("href");
  const newhref = href.replace('/', '');
  const offsetTop = document.querySelector(newhref).offsetTop;
  const width = window.screen.width;

  if(width <= 992){
    var header = 110;
  }else{
    var header = 160;
  }

  scroll({
    top: offsetTop - header,
    behavior: "smooth"
  });
}

var link = document.querySelectorAll('.js-scroll-politicy');

link.forEach((key) => {
  key.onclick =  function() {
    var link = document.querySelectorAll('.js-scroll-politicy');

    for (const links of link) {
      links.classList.remove('active');
    }

    this.classList.toggle('active');
  }
});