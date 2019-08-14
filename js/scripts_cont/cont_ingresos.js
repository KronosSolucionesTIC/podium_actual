$(function() {
    //INGRESA A LOS ATRIBUTOS AL FORMULARIO PARA INSERTAR ingresos 
    $("#btn_nuevoingresos").click(function() {
        $("#lbl_form_ingresos").html("Nueva ingresos");
        $("#lbl_btn_actioningresos").html("Guardar <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actioningresos").attr("data-action", "crear");
        $("#form_ingresos")[0].reset();
    });
    //Definir la acción del boton del formulario 
    $("#btn_actioningresos").click(function() {
        console.log("al principio");
        action = $(this).attr("data-action");
        //define la acción que va a realizar el formulario
        valida_actio(action);
        console.log("accion a ejecutar: " + action);
    });
    $("[name*='edita_ingresos']").click(function() {
        $("#lbl_form_ingresos").html("Edita ingresos");
        $("#lbl_btn_actioningresos").html("Guardar Cambios <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actioningresos").attr("data-action", "editar");
        $("#form_ingresos")[0].reset();
        id = $(this).attr('data-id-ingresos');
        console.log(id);
        carga_ingresos(id);
    });
    $("[name*='elimina_ingresos']").click(function(event) {
        id_institu = $(this).attr('data-id-ingresos');
        console.log(id_institu)
        elimina_ingresos(id_institu);
    });
    //---------------------------------------------------
    //---------------------------------------------------------
    //
    sessionStorage.setItem("id_tab_ingresos", null);
    //---------------------------------------------------------
    //click al detalle en cada fila----------------------------
    $('.table').on('click', '.detail', function() {
        window.location.href = $(this).attr('href');
    });
    //valida accion a realizar
    function valida_actio(action) {
        console.log("en la mitad");
        if (action === "crear") {
            crea_ingresos();
        } else if (action === "editar") {
            edita_ingresos();
        };
    };

    function crea_ingresos() {
        objt_f_ingresos = $("#form_ingresos").valida();
        if (objt_f_ingresos.estado == true) {
            $.ajax({
                type: "GET",
                url: "../controller/ajaxController12.php",
                data: objt_f_ingresos.srlz + "&tipo=inserta&nom_tabla=ingresos",
                success: function(r) {
                    console.log(r);
                    location.reload();
                }
            })
        }
    }

    function elimina_ingresos(id_ingresos) {
        console.log('Eliminar la ingresos: ' + id_ingresos);
        var confirma = confirm("En realidad quiere eliminar esta ingresos?");
        console.log(confirma);
        /**/
        if (confirma == true) {
            //si confirma es true ejecuta ajax
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: "pkID=" + id_ingresos + "&tipo=eliminar_logico&nom_tabla=ingresos",
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

    function elimina_archivo_saber(id_archivo) {
        console.log('Eliminar el archivito: ' + id_archivo);
        var confirma = confirm("En realidad quiere eliminar la lista de asistencia?");
        console.log(confirma);
        /**/
        if (confirma == true) {
            var data = new FormData();
            data.append('pkID', id_archivo);
            data.append('tipo', "eliminararchivo");
            //si confirma es true ejecuta ajax
            $.ajax({
                type: "POST",
                url: '../controller/ajaxingresos<.php',
                data: data,
                contentType: false,
                processData: false,
            }).done(function(data) {
                console.log(data);
                location.reload();
            }).fail(function() {
                console.log("error");
            }).always(function() {
                console.log("complete");
            });
        }
    };

    function carga_ingresos(id) {
        console.log("Carga el ingreso " + id);
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "pkID=" + id + "&tipo=consultar&nom_tabla=ingresos",
        }).done(function(data) {
            $.each(data.mensaje[0], function(key, value) {
                console.log(key + "--" + value);
                $("#" + key).val(value);
            });
        }).fail(function() {
            console.log("error");
        }).always(function() {
            console.log("complete");
        });
    };

    function edita_ingresos() {
        console.log("aqui toy")
        //crea el objeto formulario serializado
        objt_f_ingresos = $("#form_ingresos").valida();
        if (objt_f_ingresos.estado == true) {
            console.log(objt_f_ingresos.srlz);
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: objt_f_ingresos.srlz + "&tipo=actualizar&nom_tabla=ingresos",
                success: function(r) {
                    console.log(r);
                    location.reload();
                    $("#form_ingresos")[0].reset();
                }
            })
        }
    }
});