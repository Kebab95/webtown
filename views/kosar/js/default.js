/**
 * Created by kebab on 2017.05.09..
 */
$(document).ready(function () {
    $("button#termekTorles").on("click",function () {
        var key = $(this).attr("rel");
        $.get(getURL()+"kosar/deleteTermek/"+key,function (data) {
            $("#kosarTBody").html(data);
            rederOsszAr();
        });
    });

    rederOsszAr();
});
function rederOsszAr() {
    var arArray = $("td#ar");
    console.log(arArray.contents());
    var osszAr = 0;
    arArray.contents().each(function (key,data) {
        osszAr+= parseInt(arArray[key].textContent);
    });
    $("#osszAr").html(osszAr+" Ft");
}