function pesquisaFocus(campo){      
    if($(campo).val() == 'Digite sua busca'){
    	$(campo).val('');
    }
    
    return true;
}

function pesquisaBlur(campo){
    if($(campo).val() == ''){
    	$(campo).val('Digite sua busca');
    }
    
    return true;
}

$(document).ready(function() {
	$('#txtBuscar').focus(function() {
		pesquisaFocus(this);
	});
	
	$('#txtBuscar').blur(function() {
		pesquisaBlur(this);
	});
});