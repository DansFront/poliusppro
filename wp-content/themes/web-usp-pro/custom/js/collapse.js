/* collapse */
var collapse = document.querySelectorAll('.link-collapse');

/* removendo a classe active */
function removeClassActive(){
  collapse.forEach(element => {
    element.classList.remove('active');
  });
}

collapse.forEach(element => {
  element.onclick = function(){
    /* remove class active */
    removeClassActive();

    /* add class active */
    element.classList.toggle('active');

    /* click this element */
    this.onclick = function(){
      /* checking if this element has the active class */
      if(this.className.endsWith('active') == true){
        /*  remove class active in this element */
        this.classList.remove('active');
      }else{
        /*  remove class active */
        removeClassActive();
        /*  add class active in this element */
        this.classList.add('active');
      }
    }
  }
});