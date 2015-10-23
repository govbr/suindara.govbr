//Menu - subMenu
$(document).ready(function(){  
    $('.leitor-de-telas div, .eventos .lista, .dicas .myhide').hide();

    $(".expandir").click(function() {
        $(this).parent().next().slideToggle('slow');

        var text = $(this).text();

        if( text.search("Expandir") != -1 ){ // -1 é quando não encontra a string
            $(this).text(text.replace("Expandir", "Ocultar"));
        }else{
            $(this).text(text.replace("Ocultar", "Expandir"));
        }

        return false;
    });
}); 