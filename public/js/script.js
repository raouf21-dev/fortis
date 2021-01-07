const close = document.getElementById('close');
const open  = document.getElementById('open-btn');
const modal = document.getElementById('modal');


// Show modal

open.addEventListener('click', () => {
    modal.classList.add('show-modal')
})

// Hide modal

close.addEventListener('click', () =>{
    modal.classList.remove('show-modal');
})

window.addEventListener('click', e => {
    e.target === modal ? modal.classList.remove('show-modal') : false;
})