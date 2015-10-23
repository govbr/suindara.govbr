// Atalhos
function gotoConteudo(){
    $("#conteudo_ref").focus();
    return false;
}

function gotoMenu(){
    $("#menu_ref").focus();     
    return false;
} 

function gotoAcessibilidade(){
    window.location.assign("acessibilidade.html")   
    return false;
} 

function gotoMapaDoSite(){
    window.location.assign("mapa-do-site.html")
    return false;
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
    configContrastePadrao();
    
    /* atalhos */
    $(document).bind("keydown", "Alt+Shift+1", gotoConteudo);
    $(document).bind("keydown", "Alt+1", gotoConteudo);   
        
    $(document).bind("keydown", "Alt+Shift+2", gotoMenu);
    $(document).bind("keydown", "Alt+2", gotoMenu);
    
    $(document).bind("keydown", "Alt+Shift+4", gotoAcessibilidade);
    $(document).bind("keydown", "Alt+4", gotoAcessibilidade); 

    $(document).bind("keydown", "Alt+Shift+5", selecionaContraste);
    $(document).bind("keydown", "Alt+5", selecionaContraste); 

    $(document).bind("keydown", "Alt+Shift+6", gotoMapaDoSite);
    $(document).bind("keydown", "Alt+6", gotoMapaDoSite);     
    
    /* contraste */
    $("#contraste").click(function(){
        selecionaContraste(); 
        return false;
    });
    
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

});