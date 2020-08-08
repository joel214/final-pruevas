$(document).ready(function(){

    $(".delete-estudiante").on("click",function(e){

        e.preventDefault();

        if(confirm("esta de seguro que desea eliminar esta publicacion")){

            let id = $(this).data("id");

           

        window.location.href = "../publicar/code.php?id=" + id;      
        }
        });
        

//alert("hola");

});