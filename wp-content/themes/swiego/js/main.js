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
});