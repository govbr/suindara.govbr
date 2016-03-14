// Change Website title
function setTitle(new_title, concat){
	if(concat === true)
		document.title += new_title
	else 
		document.title = new_title;
}

// get the breadcrumb and concat the new title
$(document).ready(function(){
	var title = ' | ';

	var parent = document.getElementById('breadcrumb');
	var children = parent.childNodes;
	
	var max_length = children.length;

	for (var i = 0; i < max_length; i++) {
		if(children[i].text !== undefined){
			if(i == (max_length - 1)){
				title += children[i].text;	
			}else{
				title += children[i].text + " - ";
			}
		}

		if(i == (max_length - 1) ){
			title += (children[i].data.replace(/ \/ /g,'').trim());
		}
	};

	setTitle(title, true);
});


function alterarImagem(imagem){
	var alt = $(imagem).attr("alt");
	var src = $(imagem).attr("src");

	src = src.replace('/th/', '/md/'); //sempre a maior
	
	$('#foto_principal').attr("alt", alt);
	$('#foto_principal').attr("src", src);
	
	return false;
}

$(document).ready(function() {
	$(".fotos li img").click(function() {
		alterarImagem(this);
	});
});

