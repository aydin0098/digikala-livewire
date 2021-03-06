import './bootstrap';
let Swal = require('sweetalert2');

const Toast = Swal.mixin({
    toast: true,
    position: 'bottom',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

document.addEventListener('livewire:load',()=>{
    livewire.on('toast',(type,message) =>{
        Toast.fire({
            icon: type,
            title: message
        })
    })
})
