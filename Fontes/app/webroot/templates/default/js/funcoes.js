//Noticias com/sem conteudo extra
$(document).ready(function() {
	if( $("#foto_principal").length || $("#flv-player").length){
		$("body.post div#conteudo_post").css("float", "right");
	}else{
		$("body.post div#conteudo_post").css("float","none");
		$("body.post div#conteudo_post").css("width","100%");

		$("body.post div#conteudo_extra_post").css("width","100%");
	}
});

