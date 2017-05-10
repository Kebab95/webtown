/**
 * Created by kebab on 2017.05.08..
 */
$(document).ready(function () {
    $("button#add").on("click",function () {
       var id = $(this).attr("rel");
       $.post(getURL()+"termekek/getModal/"+id, function(data){
            $("#modalHire").html(data);
            $("#myModal").modal("show");
       });
    });


});
$(document).on("change","#mennyiseg",function () {
    renderPrice();
});
$(document).on("click","#mennyiseg",function () {
    renderPrice();
});
$(document).on("keyup","#mennyiseg",function () {
    renderPrice();
});
$(document).on("click","#submitKosar",function () {
    var id = $(this).attr("rel");
    var darab = $("#mennyiseg").val();

    $.post(getURL()+"termekek/addKosar/"+id+"/"+darab,function (data) {
        $("#myModal").modal("toggle");
    });
});
function renderPrice() {
    var actualPrice = $("#actualPrice");
    var defaultPrice =parseInt(actualPrice.attr("rel")) ;
    var darab = $("#mennyiseg").val();
    var kedvezmeny = 0;
    var megaPack = ($("#isMegaPack").val()==1);


    if (megaPack){
        if (darab>2){
            kedvezmeny = parseInt((darab/12))*6000;
        }
    }
    else {
        if (darab>2){
            kedvezmeny = parseInt((darab/3))*defaultPrice;
        }
    }


    actualPrice.html(((defaultPrice*darab)-kedvezmeny)+" Ft");
    if (kedvezmeny!=0){
        $("#kedvezmeny").html(kedvezmeny+" Ft Kedvezmény");
    }
    else {
        $("#kedvezmeny").html("");
    }
}