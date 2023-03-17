$(function() {
    let curSlide = 0;
    
    const maxSlide = $('.banner-single').length - 1;

    const delay = 3;

    initSlide();
    changeSlide();


    function initSlide(){
        $('.banner-single').hide();
        $('.banner-single').eq(0).show();
        for(let i = 0; i < maxSlide+1; i++){
            let content = $('.bullets').html();
            if(i == 0){
                content+='<span class="active-slider"></span>';    
            } else {
                content+='<span></span>';                
            }
            $('.bullets').html(content);            
        }
    }

    function changeSlide() {
        setInterval(function() {
            $('.banner-single').eq(curSlide).stop().fadeOut(1000);
            curSlide++;
            if(curSlide > maxSlide)
                curSlide = 0;
            $('.banner-single').eq(curSlide).stop().fadeIn(1000);
            //Trocando a navegação do slider 
            $('.bullets span').removeClass('active-slider');
            $('.bullets span').eq(curSlide).addClass('active-slider');
        },delay * 1000);
    }

    $('body').on('click','.bullets span', function(){
        let currentBullet = $(this);
        $('.banner-single').eq(curSlide).stop().fadeOut(2000);
        curSlide = currentBullet.index();
        $('.banner-single').eq(curSlide).stop().fadeIn(2000);
        $('.bullets span').removeClass('active-slider');
        currentBullet.addClass('active-slider');
    });
});