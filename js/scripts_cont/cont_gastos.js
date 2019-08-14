$(function() {
    //INGRESA A LOS ATRIBUTOS AL FORMULARIO PARA INSERTAR gastos 
    $("#btn_nuevogastos").click(function() {
        $("#lbl_form_gastos").html("Nuevo Gasto");
        $("#lbl_btn_actiongastos").html("Guardar <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actiongastos").attr("data-action", "crear");
        $("#form_gastos")[0].reset();
    });
    //Definir la acción del boton del formulario 
    $("#btn_actiongastos").click(function() {
        console.log("al principio");
        action = $(this).attr("data-action");
        //define la acción que va a realizar el formulario
        valida_actio(action);
        console.log("accion a ejecutar: " + action);
    });
    $("[name*='edita_gastos']").click(function() {
        $("#lbl_form_gastos").html("Edita Gasto");
        $("#lbl_btn_actiongastos").html("Guardar Cambios <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actiongastos").attr("data-action", "editar");
        $("#form_gastos")[0].reset();
        id = $(this).attr('data-id-gastos');
        console.log(id);
        carga_gastos(id);
    });
    $("[name*='elimina_gastos']").click(function(event) {
        id_institu = $(this).attr('data-id-gastos');
        console.log(id_institu)
        elimina_gastos(id_institu);
    });
    //---------------------------------------------------
    //---------------------------------------------------------
    //
    sessionStorage.setItem("id_tab_gastos", null);
    //---------------------------------------------------------
    //click al detalle en cada fila----------------------------
    $('.table').on('click', '.detail', function() {
        window.location.href = $(this).attr('href');
    });
    //valida accion a realizar
    function valida_actio(action) {
        console.log("en la mitad");
        if (action === "crear") {
            crea_gastos();
        } else if (action === "editar") {
            edita_gastos();
        };
    };

    function crea_gastos() {
        objt_f_gastos = $("#form_gastos").valida();
        if (objt_f_gastos.estado == true) {
            $.ajax({
                type: "GET",
                url: "../controller/ajaxController12.php",
                data: objt_f_gastos.srlz + "&tipo=inserta&nom_tabla=gastos",
                success: function(r) {
                    console.log(r);
                    location.reload();
                }
            })
        }
    }

    function elimina_gastos(id_gastos) {
        console.log('Eliminar la gastos: ' + id_gastos);
        var confirma = confirm("En realidad quiere eliminar esta gastos?");
        console.log(confirma);
        /**/
        if (confirma == true) {
            //si confirma es true ejecuta ajax
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: "pkID=" + id_gastos + "&tipo=eliminar_logico&nom_tabla=gastos",
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
                url: '../controller/ajaxgastos<.php',
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

    function carga_gastos(id) {
        console.log("Carga el ingreso " + id);
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "pkID=" + id + "&tipo=consultar&nom_tabla=gastos",
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

    function edita_gastos() {
        console.log("aqui toy")
        //crea el objeto formulario serializado
        objt_f_gastos = $("#form_gastos").valida();
        if (objt_f_gastos.estado == true) {
            console.log(objt_f_gastos.srlz);
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: objt_f_gastos.srlz + "&tipo=actualizar&nom_tabla=gastos",
                success: function(r) {
                    console.log(r);
                    location.reload();
                    $("#form_gastos")[0].reset();
                }
            })
        }
    }
});