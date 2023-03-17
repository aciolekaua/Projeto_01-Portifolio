$(function () {
    //Aqui vai todo nosso codigo de javaScript.

    $('.mobile').click( function() {
        const listaMenu = $('.mobile ul');

        //Abrir menu atraves do fadeIn();
        // if(listaMenu.is(':hidden') == true) {
        //     listaMenu.fadeIn();
        // } else {
        //     listaMenu.fadeOut();
        // }


        //Abri menu sem efeito
        //if(listaMenu.is(':hidden') == true) {
            // listaMenu.show();
            //listaMenu.css('display', 'block');
        //} else {
            //listaMenu.css('display','none');
            // listaMenu.hide();
        //}

        if(listaMenu.is(':hidden') == true){
            const icone = $('.botao-menu-mobile').find('i');
            icone.removeClass('fa-solid fa-bars');
            icone.addClass('fa-solid fa-x');
            listaMenu.slideToggle();
        } else {
            const icone = $('.botao-menu-mobile').find('i');
            icone.removeClass('fa-solid fa-x');
            icone.addClass('fa-solid fa-bars');
            listaMenu.slideToggle();
        }
        
    });

    if($('target').length > 0) {
        const elemento = '#'+$('target').attr('target');
        const divScroll = $(elemento).offset().top;
        $('html,body').animate({'scrollTop':divScroll}, 2000);
    };
    
    loadDinamic();
    function loadDinamic() {
        $('[realtime]').click(function(){
            const pagina = $(this).attr('realtime');
            //const include_path = $('.base').attr('base');
            $('.container-principal').hide();
            $('.container-principal').load(include_path+'pages/'+pagina+'.php');
            
            setTimeout(function(){
                initMap();
            },3000)
            
            $('.container-principal').fadeIn(1000);


            return false; 
        });
    }
});
