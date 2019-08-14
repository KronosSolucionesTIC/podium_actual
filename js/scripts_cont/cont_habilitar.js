$(function() {
    $("[name*='habilita_habilitar']").click(function(event) {
        id_institu = $(this).attr('data-id-habilitar');
        console.log(id_institu)
        habilita_afiliado(id_institu);
    });
    //---------------------------------------------------
    function habilita_afiliado(id_afiliado) {
        console.log('Habilitar afiliado: ' + id_afiliado);
        var confirma = confirm("En realidad quiere habilitar este afiliado?");
        console.log(confirma);
        /**/
        if (confirma == true) {
            //si confirma es true ejecuta ajax
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: "pkID=" + id_afiliado + "&tipo=habilita_afiliado&nom_tabla=afiliado",
            }).done(function(data) {
                //---------------------
                console.log(data);
                location.reload();
            }).fail(function() {
                console.log("errorfatal");
            }).always(function() {
                console.log("complete");
            });
        } else {
            //no hace nada
        }
    };
});