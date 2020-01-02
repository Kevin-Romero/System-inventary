$(search_db());

function search_db(consulta){
    $.ajax({
		url: '../php/proveedores.php',
		type: 'POST',
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#data").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup', '#search-box', function(){
    var valor = $(this).val();
    if(valor != ""){
        search_db(valor);
    }else{
        
        search_db();
    }
});

