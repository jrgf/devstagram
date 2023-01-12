import './bootstrap';
import Dropzone from 'dropzone';
import Toastify from 'toastify-js';




Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone',
{dictDefaultMessage:"Sube Aqui Tu Imagen",
    acceptedFiles:".png,.jpg,.jpeg,.gif",
    addRemoveLinks:true,
    dictRemoveFile:"Borrar Archivo",
    maxFiles:1,
    uploadMultiple:false,
    init:function(){
      if(document.querySelector('[name="imagen"]').value.trim()){
          const imagenPublicada = {};
          imagenPublicada.size = 1234;
          imagenPublicada.name=document.querySelector('[name="imagen"]').value;
          
          
          this.options.addedfile.call(this,imagenPublicada);
          this.options.thumbnail.call(this,imagenPublicada,`/uploads/${imagenPublicada.name}`);

          imagenPublicada.previewElement.classList.add('dz-success','dz-complete');
      }
    }

});

dropzone.on('success',function(file,response){
    document.querySelector('[name="imagen"]').value=response.imagen;
    Toastify({
        text: "Imagen Subida con Exito",
        duration: 3000,
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "#0DC223",
          borderRadius: "0.5rem",
        },
        onClick: function(){} // Callback after click
      }).showToast();
});

dropzone.on('removedfile',function(){
  document.querySelector('[name="imagen"]').value='';
});

