var trigger = document.querySelectorAll('.trigger-modal-1');
var triggerTwo = document.querySelectorAll('.trigger-modal-2');
var triggerThree = document.querySelectorAll('.trigger-modal-3');
var modal1 = document.querySelector('.modal-1');
var modal2 = document.querySelector('.modal-2');
var modal3 = document.querySelector('.modal-3');

function closeModalCourse(){
  modal1.classList.remove('active');
  modal2.classList.remove('active');
  modal3.classList.remove('active');
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

triggerThree.forEach(element => {
  element.onclick = function(){
    modal1.classList.remove('active');
    modal2.classList.remove('active');
    modal3.classList.toggle('active');
  }
});

document.addEventListener('keydown', function(event){
  if(event.key === 'Escape'){
    closeModalCourse();
  }
})

/* header fixed */
window.addEventListener('scroll', function(){
  var scroll = document.querySelector('.scroll');
  var chat = document.querySelector('#ht-ctc-chat');
  var height = window.screen.height;

  scroll.classList.toggle('fixed', window.scrollY > 150);
  chat.classList.toggle('active', window.scrollY > 150);

  if(window.scrollY == height){
    scroll.classList.remove('fixed');
    chat.classList.remove('active');
  }
});