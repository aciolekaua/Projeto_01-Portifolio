$(function(){
    let open = true;
    let windoSize = $(window)[0].innerWidth;

    const targetSizeMenu = (windoSize <= 400) ? 200 : 250;

    if(windoSize <= 786) {
        $('.menu').css('width','0').css('padding','0');
        open = false;
    }

    $('.menu-btn').click(function(){
        if(open){
            //O menu está aberto
            $('.menu').animate({'width':0,'padding':0}, function(){
                open = false;
            });
            $('.content,header').css('width','100%');
            $('.content,header').animate({'left':0},function(){
                open = false;
            });
        } else {
            //O menu está fechado
            $('.menu').css('display','block');
            $('.menu').animate({'width':targetSizeMenu+'px','padding':'10px 0'}, function(){
                open = true;
            });
            //$('.content,header').css('width','calc(100% - 300px)');
            if(windoSize > 768){
                $('.content,header').css('width','calc(100% - 250px)');   
                $('.content,header').animate({'left':targetSizeMenu+'px'},function(){
                    open = true;
                });

            }
        }
    });


    $(window).resize(function(){
        windoSize = $(window)[0].innerWidth;
        targetSizeMenu = (windoSize <= 400) ? 200 : 250;
        if(windoSize <= 768){
            $('.menu').css('width','0').css('padding','0');
            $('.content,header').css('width','100%').css('left','0');
            open = false;
        }else {
            $('.content,header').css('width','calc(100% - 250px)');  
            $('.content,header').animate({'left':targetSizeMenu+'px'},function(){
                open = true;
            });
        }
    });

    $('[formato=data]').mask('99/99/9999');

    $('[actionBtn=delete]').click(function() {
        let r = confirm("Deseja Excluir o Registro??");
        if(r == true){
           return true;
        }else {
            return false;
        }
    })
});