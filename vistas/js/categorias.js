/*   EDITAR CATEGORIA  */

$(".tablas").on("click", ".btnEditarCategoria", function(){

    var idCategoria = $(this).attr("idCategoria");
    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#editarCategoria").val(respuesta["categoria"]);
            $("#idCategoria").val(respuesta["id"]);

        }
    })
})

/*   ELIMINAR CATEGORIA  */

$(".tablas").on("click", ".btnEliminarCategoria", function(){
    var idCategoria = $(this).attr("idCategoria");

    swal({
        title: 'Esta seguro que desea eliminar?',
        text: 'Si no presione cancelar',
        icon: 'warning',
        buttons:  ["Cancelar", "Si, borrar"],
        dangerMode: true,
    }).then((value)=>{
        if(value){
            window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;
        }
    })
})

