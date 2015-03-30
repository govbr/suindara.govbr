//Menu - subMenu
$(document).ready(function(){  
    $('.navegar div').hide();

    $("h4 .expandir").click(function() {

        $(this).parent().next().slideToggle('slow');

        var text = $(this).html();

        if( text.search("Expandir") != -1 ){ // -1 é quando não encontra a string
            $(this).html(text.replace("Expandir", "Ocultar"));
        }else{
            $(this).html(text.replace("Ocultar", "Expandir"));
        }

        return false;
    });
}); 