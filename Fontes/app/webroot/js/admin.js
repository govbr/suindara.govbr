function expandir(){
    if($(this).children('span').text() == 'Expandir') {
        $(this).children('span').text('Ocultar');
        $("#menu_acessibilidade").slideToggle();
        $("#toggle_menu_acessibilidade").focus();
    } else {
        $(this).children('span').text('Expandir');
        $("#menu_acessibilidade").slideToggle();
        $("#inicio_menu_acessibilidade").focus();
    }
}

function imageList() {
    if(!$("ul#itemContainer li img").length)
        return;

    $("ul#itemContainer li img").lazyload({
        event : "turnPage",
        effect : "fadeIn"
    });

    $("div.holder").jPages({
        containerID : "itemContainer",
        animation   : "fadeInUp",
        callback    : function( pages,
        items ){
            /* lazy load current images */
        items.showing.find("img").trigger("turnPage");
        /* lazy load next page images */
        items.oncoming.find("img").trigger("turnPage");
        }
    });
}

$(document).ready(function() {

    $(document).on('click', 'a#closeMessage', function(e) {
        $(this).parent().parent().slideToggle();
    });

    // Quando clicar no botao toggle_menu_acessibilidade faz abrir o menu
    $('.toggle_menu_acessibilidade').click(
        function() {
            expandir();
        }
    );

    var busca_avancada = $("#busca_avancada");
    if(busca_avancada != undefined) {
        $('#exp_busca').click(function() {
            $("#busca_avancada").slideToggle();
            if($(this).children('span').text() == 'Expandir op&ccedil;&otilde;es de busca avan&ccedil;ada' ||
                $(this).children('span').text() == 'Expandir opções de busca avançada') {
                $("#busca_simples").children("form").children("input").removeAttr('disabled');
                $(this).children('span').text('Ocultar op&ccedil;&otilde;es de busca avan&ccedil;ada');
            } else {
                $("#busca_simples").children("form").children("input").attr('disabled', 'disabled');
                $(this).children('span').text('Expandir op&ccedil;&otilde;es de busca avan&ccedil;ada');
            }
        });
    }

    imageList();
});

$(document).ready(function() {
    fieldset = $("#listMedia").parent();
    if(fieldset != undefined) {
        fieldset.before('<div id="clear"></div>');
    }
});

/*
$(document).ready(function() {
    $('.form-error').tooltip();
});
*/

$(document).ready(function() {
    var message = $("#message");
    if (message.text() != "") {
        $("#message").focus();
    }
});

function flashMessage(message) {
    var prev = $('#principal').prev();
    if(prev.attr('id') == "flashMessage")
        prev.remove();
    
    $('#principal').before(message);
    $("#message").focus();
}

//mapeamento para os atalhos funcionarem em todos os navegadores com jquery
$(document).bind('keydown', 'Alt+1',function (){$('#iniciodoconteudo').focus();});
$(document).bind('keydown', 'Alt+Shift+1',function (){$('#iniciodoconteudo').focus();});
$(document).bind('keydown', 'Alt+2',function (){$('#iniciodomenu').focus();});
$(document).bind('keydown', 'Alt+Shift+2',function (){$('#iniciodomenu').focus();});
$(document).bind('keydown', 'Alt+3',function (){$('#pesquisa').focus();});
$(document).bind('keydown', 'Alt+Shift+3',function (){$('#pesquisa').focus();});
// $(document).bind('keydown', 'Alt+4',function (){ window.navigate("/acessibilidade"); });
// $(document).bind('keydown', 'Alt+Shift+4',function (){ window.navigate("/acessibilidade"); });

$(document).bind('keydown', 'Alt+4',function (){  expandir(); $('#acessibilidade').focus(); });
$(document).bind('keydown', 'Alt+Shift+4',function (){  expandir(); $('#acessibilidade').focus(); });



$(document).bind('keydown', 'Alt+6',function (){$('#message').focus();});
$(document).bind('keydown', 'Alt+Shift+6',function (){$('#message').focus();});



$(document).ready(function(){
    if (!$("#NoticiaAgendar").is(":checked")) {
        $("#Fs_datahora_prog_pub select").attr("disabled", "disabled");
    }

    $("#NoticiaAgendar").click(function() {
        if ($("#Fs_datahora_prog_pub select").attr("disabled") == "disabled") {
            $("#Fs_datahora_prog_pub select").removeAttr("disabled");
        } else {
            $("#Fs_datahora_prog_pub select").attr("disabled", "disabled");
        }
    })
    

});

$(document).ready(function() {
    $("#UsuarioTelefone").mask("(99) 9999-9999");
});