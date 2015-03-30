function alterarImagem(imagem){
	var alt = $(imagem).attr("alt");
	var src = $(imagem).attr("src");
	
	$('#foto_principal').attr("alt", alt);
	$('#foto_principal').attr("src", src);
	
	return false;
}

$(document).ready(function() {
	$(".fotos li img").click(function() {
		alterarImagem(this);
	});
});