$(function(){
    $(':button[name=acao]').on('click', function(){
        const form = $('.formEnvia');
        const url = include_path;
        $.ajax({
            beforeSend:function(){
                $('.overlay-loading').fadeIn();
            },
            type:'post',
            url: url+'ajax/formularios.php',
            //cache: 'false',
            dataType:'json',
            data:form.serialize(),
            success:function(data){
                console.log(data.sucesso);
                $('.overlay-loading').fadeOut();
                $('.sucesso').fadeIn();
                setTimeout(function(){
                    $('.sucesso').fadeOut();
                },3000);
                console.log('Is Working!!');
            },
            error:function(data, texto2, texto3){
                console.log(data.erro);
                $('.overlay-loading').fadeOut();
                console.log(data+" "+texto2+" "+texto3);
            }
        });
        
    }); 
});