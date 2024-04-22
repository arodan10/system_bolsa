<head>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


<script>


$( "#dialog-6" ).dialog({
	       autoOpen: false, 
           width: 600,
           height: 400
           title: "Hola",         
           
});

$( "#dialog-6" ).dialog( "open" );

            



var dataString = $('#formulario').serialize();

$.ajax({    
    url : 'post.php',    
    //data : { id : 123 },    
    data : dataString,    
    type : 'POST',    

    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función
    success : function(data) {
        alert(data)
    },
    error : function(xhr, status) {
        alert('Error');
    }
});

</script>
</head>
