$(function() {
    //INGRESA A LOS ATRIBUTOS AL FORMULARIO PARA INSERTAR tipo_ingresos 
    $("#btn_nuevotipo_ingresos").click(function() {
        $("#lbl_form_tipo_ingresos").html("Nuevo Tipo ingreso");
        $("#lbl_btn_actiontipo_ingresos").html("Guardar <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actiontipo_ingresos").attr("data-action", "crear");
        $("#form_tipo_ingresos")[0].reset();
    });
    //Definir la acción del boton del formulario 
    $("#btn_actiontipo_ingresos").click(function() {
        console.log("al principio");
        action = $(this).attr("data-action");
        //define la acción que va a realizar el formulario
        valida_actio(action);
        console.log("accion a ejecutar: " + action);
    });
    $("[name*='edita_tipo_ingresos']").click(function() {
        $("#lbl_form_tipo_ingresos").html("Edita Tipo ingreso");
        $("#lbl_btn_actiontipo_ingresos").html("Guardar Cambios <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actiontipo_ingresos").attr("data-action", "editar");
        $("#form_tipo_ingresos")[0].reset();
        id = $(this).attr('data-id-tipo_ingresos');
        console.log(id);
        carga_tipo_ingresos(id);
    });
    $("[name*='elimina_tipo_ingresos']").click(function(event) {
        id_institu = $(this).attr('data-id-tipo_ingresos');
        console.log(id_institu)
        elimina_tipo_ingresos(id_institu);
    });
    //---------------------------------------------------
    //---------------------------------------------------------
    //
    sessionStorage.setItem("id_tab_tipo_ingresos", null);
    //---------------------------------------------------------
    //click al detalle en cada fila----------------------------
    $('.table').on('click', '.detail', function() {
        window.location.href = $(this).attr('href');
    });
    //valida accion a realizar
    function valida_actio(action) {
        console.log("en la mitad");
        if (action === "crear") {
            crea_tipo_ingresos();
        } else if (action === "editar") {
            edita_tipo_ingresos();
        };
    };

    function crea_tipo_ingresos() {
        objt_f_institu = $("#form_tipo_ingresos").valida();
        if (objt_f_institu.estado == true) {
            $.ajax({
                type: "GET",
                url: "../controller/ajaxController12.php",
                data: objt_f_institu.srlz + "&tipo=inserta&nom_tabla=tipo_ingresos",
                success: function(r) {
                    console.log(r);
                    location.reload();
                }
            })
        }
    }

    function edita_tipo_ingresos() {
        console.log("aqui toy")
        //crea el objeto formulario serializado
        objt_f_institu = $("#form_tipo_ingresos").valida();
        if (objt_f_institu.estado == true) {
            console.log(objt_f_institu.srlz);
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: objt_f_institu.srlz + "&tipo=actualizar&nom_tabla=tipo_ingresos",
                success: function(r) {
                    console.log(r);
                    location.reload();
                    $("#form_tipo_ingresos")[0].reset();
                }
            })
        }
    }

    function carga_tipo_ingresos(id_institu) {
        console.log("Carga el tipo_ingresos " + id_institu);
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "pkID=" + id_institu + "&tipo=consultar&nom_tabla=tipo_ingresos",
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

    function elimina_tipo_ingresos(id_tipo_ingresos) {
        console.log('Eliminar la tipo_ingresos: ' + id_tipo_ingresos);
        var confirma = confirm("En realidad quiere eliminar esta tipo_ingresos?");
        console.log(confirma);
        /**/
        if (confirma == true) {
            //si confirma es true ejecuta ajax
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: "pkID=" + id_tipo_ingresos + "&tipo=eliminar_logico&nom_tabla=tipo_ingresos",
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
    $("#nombre_tipo_ingresos").change(function(event) {
        /* valida que no tenga menos de 8 caracteres*/
        validaEqualIdentifica($(this).val());
    });

    function validaEqualIdentifica(num_id) {
        console.log("busca valor " + encodeURI(num_id));
        var consEqual = "SELECT COUNT(*) as res_equal FROM `tipo_ingresos` WHERE estado=1 and `nombre_tipo_ingresos`= '" + num_id + "'";
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "query=" + consEqual + "&tipo=consulta_gen",
        }).done(function(data) {
            /**/
            //console.log(data.mensaje[0].res_equal);
            if (data.mensaje[0].res_equal > 0) {
                alert("El Nombre de la tipo_ingresos ya existe, por favor ingrese un nombre diferente.");
                $("#nombre_tipo_ingresos").val("");
            } else {
                //return false;
            }
        }).fail(function() {
            console.log("error");
        }).always(function() {
            console.log("complete");
        });
    }
});