// Atalhos
function gotoConteudo(){
	$("#conteudo_ref").focus();
	return false;
}

function gotoMenu(){
	$("#menu_ref").focus();		
	return false;
} 

function gotoPesquisa(){
	$("#txtBuscar").focus();
	return false;
}


// Fonte
function configTamanhoPadrao(){		
	var tamAtual = parseInt($.cookie("tamFonte"));							

	if(!isNaN(tamAtual)){ 			
		$("body").css("font-size", tamAtual);
	}else{
		var temp = $("html").css("font-size").replace("px", "");
		$.cookie("tamFonte", temp);
	}
	
}

function atualizarFonte(op){		
	var tamAtual = parseInt($.cookie("tamFonte"));		

	if(op == "="){		
		tamAtual = $("html").css("font-size");
		
		$("body").css("font-size", tamAtual);
		
		$.cookie("tamFonte", tamAtual.replace("px", ""));		
	}else{		
		inc = ((op == "+" && 1) || (op == "-" && -1) || 0);				
		var tamTemp = tamAtual + inc
		
		if(tamTemp >= 13 && tamTemp < 24){
			$("body").css("font-size", tamTemp);		
			
			$.cookie("tamFonte", tamTemp);
		}	
	}	
}

// Contraste
function configContrastePadrao(){
	if($.cookie("contraste") && $.cookie("contraste") != ""){
		$("body").addClass($.cookie("contraste"));
	}
}

function selecionaContraste(){   
	var  contraste = $.cookie("contraste") || "";
	
	if (contraste == "") {	
		$("body").addClass("contraste");
		$.cookie("contraste", "contraste");
	}else{
		$('body').removeClass("contraste")
		$.cookie("contraste", "");
	}
}

$(document).ready(function() {
	/* acessibilidade */
	configTamanhoPadrao();	
	configContrastePadrao();
	
	 $(document).bind("keydown", "Alt+Shift+1", gotoConteudo);
	 $(document).bind("keydown", "Alt+1", gotoConteudo);	
		
	 $(document).bind("keydown", "Alt+Shift+2", gotoMenu);
	 $(document).bind("keydown", "Alt+2", gotoMenu);
	
	 $(document).bind("keydown", "Alt+Shift+3", gotoPesquisa);
	 $(document).bind("keydown", "Alt+3", gotoPesquisa);		
	
	$("#aumentar_fonte").click(function(){ atualizarFonte("+"); return false;});
	$("#diminuir_fonte").click(function(){ atualizarFonte("-"); return false;});
	$("#tamanho_original").click(function(){ atualizarFonte("="); return false;});
	$("#contraste").click(function(){selecionaContraste(); return false;});
	
	/* impressao */
	$("#imprimir").click(function(){ 
		window.print();
		return false;
	});
	
	/* voltar */
	$("#voltar").click(function(){ 
		history.go(-1);
		return false;
	});
	
	 /* Sanfona */
	$('.leitor-de-telas div, .eventos .lista, .dicas .myhide, .dicas-de-acessibilidade div, .post .fechar').hide();
	$('.leitor-de-telas h3 a, .eventos h4 a, .dicas h3 a, .post #post h3 a').click(function() {
		$(this).parent().next().slideToggle('slow');

		var text = $(this).children('.controle-evento').text();

		if(text == "Expandir"){
			$(this).children('.controle-evento').text(text.replace("Expandir", "Ocultar"));
		}else{
			$(this).children('.controle-evento').text(text.replace("Ocultar", "Expandir"));
		}

		return false;
	});

});





