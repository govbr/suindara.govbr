$(document).ready(function() {
	$(window).modalDialog({
		headingText:'Assinar newsletter',
		ajax:{
			url:'files/index.php'
		},
		focused:'#email-4'
	});			
	
	$('#modal-dialog').modalDialog({
		headingText:'Assinar newsletter',
		activator:'#modal-dialog-link',
		buttons:
		[
			{
				'Um': {
					"alt":"Um",
					"title":"Um",
					"class":"dialog-action",
					"click":function() {
						alert("Amostra de botão 1");
					}
				}
			},
			{
					'Dois': {
					"alt":"Dois",
					"title":"Dois",
					"class":"dialog-action",
					"click":function() {
						alert("Amostra de botão 2");
					}	
				}
			},
			{
				'Três': {
					"alt":"Fechar",
					"title":"Fechar",
					"class":"dialog-action",
					"click":function() {
						$('#modal-dialog').parents().find('button.dialog-close').trigger('click');
					}
				}
			}			
		]
	});
	
	$('#modal-dialog-1').modalDialog({
		headingText:'Escolha um nome de usuário',
		activator:'#modal-dialog-link-1',
		role:'dialog',
		movable:true,
		move:100,
		fadeIn:1000,
		fadeOut:1000
	});
	
	$('#modal-dialog-link-2').modalDialog({
		headingText:'Assinar newsletter',
		activator:'#modal-dialog-link-2',
		ajax:{
			url:'error.php',
			errorMessage:'Lamentamos muito, mas não conseguimos carregar o conteúdo que você solicitou. Por favor, tente novamente mais tarde.'
		}
	});
	
	$('#modal-dialog-link-3').modalDialog({
		headingText:'Assinar newsletter',
		ajax:{
			url:'files/content.html'
		},
		activator:'#modal-dialog-link-3'
	});		
	
	
});