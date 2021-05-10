
$(document).ready(function(){
    alert("hola");
    $('select').on('change','#relojMundial', function (e) {
        var link = $("option:selected", this).val();
        alert(link);
    });
});