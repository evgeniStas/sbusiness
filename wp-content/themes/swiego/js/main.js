$(function() {
    $(".questions .question").on("click",function (event) {
        event.preventDefault();
        var hidden  = $(this).children(".desc").hasClass("hidden");
        if(hidden){
            $(this).children(".desc").removeClass("hidden");
            $(this).children(".icon").html("[-]");
            $(this).children(".icon").addClass("icon-open");
        }else{
            $(this).children(".desc").addClass("hidden");
            $(this).children(".icon").html("[+]");
            $(this).children(".icon").removeClass("icon-open");
        }
    });
    $(".header .lines").on("click",function (event) {
        var hidden = $(this).parent().children(".menu").hasClass("hidden");
        if(!hidden){
            $(this).parent().children(".lines").html("<span class=\"icon2-Menu_ic\"></span>");
            $(this).parent().children(".menu").addClass("hidden");
        }else{
            $(this).parent().children(".lines").html("<span class=\"icon2-Menu_ic-Copy\"></span>");
            $(this).parent().children(".menu").removeClass("hidden");
        }
    });
    $(".menu-items a").on("click",function (event) {
        $(this).parent().parent().parent().parent().parent().parent().children(".lines").html("<span class=\"icon2-Menu_ic\"></span>");
        $(this).parent().parent().parent().parent().parent().parent().children(".menu").addClass("hidden");
    });
    $("#lang-select").change(function() {
        var url = $("select option:selected" ).attr("data-url");
        location = url;
    });
});
jQuery(window).scroll(function(){
    var $sections = $('.section');
    $sections.each(function(i,el){
        var top  = $(el).offset().top-100;
        var bottom = top +$(el).height();
        var scroll = $(window).scrollTop();
        var id = $(el).attr('id');
        if( scroll > top && scroll < bottom){
            $(".left-menu .line").removeClass('active');
            $('a[href="#'+id+'"]').children(".item").children(".line").addClass('active');

        }
    })
});