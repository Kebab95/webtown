/**
 * Created by kebab on 2017.05.09..
 */
$(document).ready(function () {
    $("input#megrendel").on("click",function () {
        var name = $("input#name").val();
        var email = $("input#email").val();
        var cim = $("input#cim").val();
        if (name.length<1 && email.length<1 && cim.length<1){
            alert("Nem töltött ki minden szükséges mezőt a rendeléshez!");
        }
        else {
            var termekekID = $("input#termekID");
            var termekekDB = $("td#termekDB");
            if (termekekID.length <1 || termekekDB.length <1){
                alert("Nincsen temék a kosárban!");
            }
            else {
                var termekekIDVal = [];
                var termekekDBVal = [];
                termekekID.contents().prevObject.each(function (key, data) {
                    termekekIDVal[key] = parseInt(termekekID.contents().prevObject[key].value);
                });

                termekekDB.contents().each(function (key, data) {
                    termekekDBVal[key] = parseInt(termekekDB.contents()[key].data);
                });
                console.log(termekekIDVal);
                console.log(termekekDBVal);
                var ossz = {1:"asd"};
                termekekIDVal.forEach(function (key, data) {
                    ossz[key] = [termekekIDVal[data],termekekDBVal[data]];
                });
                console.log(ossz);
                $.post(getURL()+"kosar/veglegesites/",
                    {
                        rendeles:JSON.stringify(ossz),
                        name: name,
                        email:email,
                        cim:cim
                    },function (data) {
                    if (data.toLowerCase() === "true".toLowerCase() ){
                        location.reload();
                    }
                    else {
                        console.log(data);
                        alert("Hiba!");
                    }
                });
            }
        }

    });
    rederOsszAr();
});
$(document).on("click","button#termekTorles",function () {
    var key = $(this).attr("rel");
    $.get(getURL()+"kosar/deleteTermek/"+key,function (data) {
        $("#kosarTBody").html(data);
        //console.log("asd");
        rederOsszAr();
    });


});
function rederOsszAr() {
    var arArray = $("td#ar");
    var kedvezmenyArArray = $("i#kedvezmeny");

    var osszAr = 0;
    arArray.contents().each(function (key,data) {
        osszAr+= parseInt(arArray[key].textContent);
    });

    $("#kedvezmenyesAr").html(osszAr+" Ft");

    kedvezmenyArArray.contents().each(function (key,data) {
        osszAr+= parseInt(kedvezmenyArArray[key].textContent);
    });

    $("#teljesAr").html(osszAr+" Ft");

    var szoveg = "";
    switch ($("#kedvezmenyTipus").val()){
        case "0":
            szoveg="Kettőt fizet hármat kap kedvezmény";
            break;
        case "1":
            szoveg="Megapack kedvezmény";
            break;
        default:
            szoveg="Nem létező kedvezmény";
    }
    $("#kedvTipus").html(szoveg);
}