feather.replace()

var toggleMenu = document.querySelectorAll('.toggleMenu');
var aside = document.querySelector('.aside');

for(var i = 0; i < toggleMenu.length; i++){
    toggleMenu[i].addEventListener('click', menuAction);
}

function menuAction(){
    if(aside.classList.contains('hide')){
        aside.classList.remove('hide');
        aside.animate([
            { transform: 'translateX(-300px)' },
            { transform: 'translateX(0)' }
          ], {
            duration: 300,
          });
    }else{
        aside.classList.add('hide');
    }
}

/* */

if (window.matchMedia("(min-width: 780px)").matches){
	alert('Desenvolvido apenas para mobile!');
}

