
$( document ).ready(function() {

	$("form").delegate('button[name$="removeSJS"]', "click", function(){
		$(".perfil" + $(this).val()).remove();
		return false;
	});

});