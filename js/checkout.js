var openModal = document.querySelectorAll('.openModal');
var modalContent = document.querySelector('.modalContent');
var checkoutButton = document.querySelector('.checkouRow');

for(var i = 0; i < openModal.length; i++){
    openModal[i].addEventListener('click', modalAction);
}

function modalAction(){
    if(modalContent.classList.contains('hide')){
        checkoutButton.classList.add('hide');
        modalContent.classList.remove('hide');
        modalContent.animate([
            { transform: 'translateY(0px)' },
            { transform: 'translateY(-300px)' }
          ], {
            duration: 300,
          });
    }else{
        modalContent.classList.add('hide');
        checkoutButton.classList.remove('hide');
    }
}

/* */
