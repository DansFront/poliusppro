var trigger = document.querySelectorAll('.trigger-modal-1');
var triggerTwo = document.querySelectorAll('.trigger-modal-2');
var modal1 = document.querySelector('.modal-1');
var modal2 = document.querySelector('.modal-2');

function closeModalCourse(){
  modal1.classList.remove('active');
  modal2.classList.remove('active');
}

trigger.forEach(element => {
  element.onclick = function(){
    modal1.classList.toggle('active');
  }
});

triggerTwo.forEach(element => {
  element.onclick = function(){
    modal1.classList.remove('active');
    modal2.classList.toggle('active');
  }
});

/* header fixed */
window.addEventListener('scroll', function(){
  var scroll = document.querySelector('.scroll');
  var height = window.screen.height;

  scroll.classList.toggle('fixed', window.scrollY > 150);

  if(window.scrollY == height){
    scroll.classList.remove('fixed');
  }
});