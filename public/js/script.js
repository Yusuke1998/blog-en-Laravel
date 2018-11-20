$(document).ready(function(){
    prettyPrint();
    $('.selectpicker').selectpicker();
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    /*$('.summernote').summernote({
        height: 300,

        onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable);
        }
    });
    function sendFile(file, editor, welEditable) {
        var  data = new FormData();
        data.append("file", file);
        var url = 'upload-image';
        $.ajax({
            data: data,
            type: "POST",
            url: url,
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                alert('Success');
                editor.insertImage(welEditable, url);
            }
        });
    }*/

$('.summernote').summernote({
        lang: 'es-ES', // <= nobody is perfect :)
        height: 300,
        tab:3,
        prettifyHtml:false,
    toolbar:[
        // Add highlight plugin
        ['highlight', ['highlight']],
    ],
        callbacks : {
            onImageUpload: function(image) {
                uploadImage(image[0]);
            },
            /*onMediaDelete : function(target) {
                 alert(target[0].src) 
                deleteFile(target[0].src);
            }*/
        }
    });
    
    function uploadImage(image) {
        var data = new FormData();
        data.append("file",image);
        
        $.ajax ({
            data: data,
            type: "POST",
            url: "upload-image",// this file uploads the picture and 
                             // returns a chain containing the path
            cache: false,
            contentType: false,
            processData: false,
            success: function(filename) {
                url = base_url+'/uploads/'+filename;
                console.log(url);
                //var image = IMAGE_PATH + url;
                $('.summernote').summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(data);
                    }
        });
    }


   /* function deleteFile(src) {
        $.ajax({
            data: {src : src},
            type: "POST",
            url: base_url+"ejecucion/casos/delete_file", // replace with your url
            cache: false,
            success: function(resp) {
                console.log(resp);
            }
        });
    }*/
	$('#tb-search').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
});