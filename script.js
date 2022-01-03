$(document).ready(function(){
    $(window).scroll(function(){
        // sticky navbar on scroll script
        if(this.scrollY > 20){
            $('.navbar').addClass("sticky");
        }else{
            $('.navbar').removeClass("sticky");
        }
    });
    // toggle menu script
    $('.menu-btn').click(function(){
        $('.navbar .menu').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });

    var typed = new Typed(".type", {
        strings: ["Help!", "मदद!", "मदत!", "Relief!", "राहत!", "आराम!", "Resources!", "साधन!", "संसाधने!"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });
});