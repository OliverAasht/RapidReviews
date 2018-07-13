/*The following code was ammended from http://swiftbend.com/blog/?page_id=35#.VT6ZECFVikr
Swift Bend is a site which provides tutorials on web development
I have included the code below at the end of each of my review articles

*/
$(document).ready(function(){
    var activeTabIndex = -1;
    var tabNames = ["crit","user"];

    $(".tab-menu > li").click(function(e){
        for(var i=0;i<tabNames.length;i++) {
            if(e.target.id == tabNames[i]) {
                activeTabIndex = i;
            } else {
                $("#"+tabNames[i]).removeClass("active");
                $("#"+tabNames[i]+"-tab").css("display", "none");
            }
        }
        $("#"+tabNames[activeTabIndex]+"-tab").fadeIn();
        $("#"+tabNames[activeTabIndex]).addClass("active");
        return false;
    });
});