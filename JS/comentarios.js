"use strict"

// event listeners
document.querySelector("#form-comentario").addEventListener('submit', AgregarComentario);


// define la app Vue
//inicia vue;
let app = new Vue({
    el: "#template-vue-Comentarios",
    data: {
        subtitle: "Comentarios",
        comentarios: [], 
    },
    methods: {
        borrar2: function(id) {
            fetch('api/producto/comentarios/Borrar'+'/'+id, {
                method: 'DELETE',
                })
                .then(function(data){
                    getComentarios();
                  console.log(data);
                });
              
        }
    }

    
});
/**
 * Obtiene la lista de tareas de la API y las renderiza con Vue.
 */
function getComentarios() {
    let p=document.getElementById("producto");
    let id=p.dataset.producto;
    fetch('api/producto/comentarios '+"/"+id)
    .then(response => response.json())
    .then(comentarios => {
        app.comentarios = comentarios; // similar a $this->smarty->assign("tasks", $tasks)
    })
       
    .catch(error => console.log(error));
}

/**
 * Inserta una tarea usando la API REST.
 */
function AgregarComentario() {
    let p=document.getElementById("producto");
    let idproducto=p.dataset.producto;
    console.log(idproducto);
    let data = {
        usuario:  document.querySelector("input[name=usuario]").value,
        comentario:  document.querySelector("input[name=comentario]").value,
        id:  idproducto,

    }
    console.log(data);

    fetch('api/producto/comentarios', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},       
        body: JSON.stringify(data) 
     })
     .then(response => {
        console.log(data);

         getComentarios();
     })
     .catch(error => console.log(error));
}


getComentarios();

// obtiene las tareas al iniciio
