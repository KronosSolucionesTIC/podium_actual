$(function() {
    //INGRESA A LOS ATRIBUTOS AL FORMULARIO PARA INSERTAR tipo_gastos 
    $("#btn_nuevotipo_gastos").click(function() {
        $("#lbl_form_tipo_gastos").html("Nuevo Tipo gasto");
        $("#lbl_btn_actiontipo_gastos").html("Guardar <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actiontipo_gastos").attr("data-action", "crear");
        $("#form_tipo_gastos")[0].reset();
    });
    //Definir la acción del boton del formulario 
    $("#btn_actiontipo_gastos").click(function() {
        console.log("al principio");
        action = $(this).attr("data-action");
        //define la acción que va a realizar el formulario
        valida_actio(action);
        console.log("accion a ejecutar: " + action);
    });
    $("[name*='edita_tipo_gastos']").click(function() {
        $("#lbl_form_tipo_gastos").html("Edita Tipo gasto");
        $("#lbl_btn_actiontipo_gastos").html("Guardar Cambios <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actiontipo_gastos").attr("data-action", "editar");
        $("#form_tipo_gastos")[0].reset();
        id = $(this).attr('data-id-tipo_gastos');
        console.log(id);
        carga_tipo_gastos(id);
    });
    $("[name*='elimina_tipo_gastos']").click(function(event) {
        id_institu = $(this).attr('data-id-tipo_gastos');
        console.log(id_institu)
        elimina_tipo_gastos(id_institu);
    });
    //---------------------------------------------------
    //---------------------------------------------------------
    //
    sessionStorage.setItem("id_tab_tipo_gastos", null);
    //---------------------------------------------------------
    //click al detalle en cada fila----------------------------
    $('.table').on('click', '.detail', function() {
        window.location.href = $(this).attr('href');
    });
    //valida accion a realizar
    function valida_actio(action) {
        console.log("en la mitad");
        if (action === "crear") {
            crea_tipo_gastos();
        } else if (action === "editar") {
            edita_tipo_gastos();
        };
    };

    function crea_tipo_gastos() {
        objt_f_institu = $("#form_tipo_gastos").valida();
        if (objt_f_institu.estado == true) {
            $.ajax({
                type: "GET",
                url: "../controller/ajaxController12.php",
                data: objt_f_institu.srlz + "&tipo=inserta&nom_tabla=tipo_gastos",
                success: function(r) {
                    console.log(r);
                    location.reload();
                }
            })
        }
    }

    function edita_tipo_gastos() {
        console.log("aqui toy")
        //crea el objeto formulario serializado
        objt_f_institu = $("#form_tipo_gastos").valida();
        if (objt_f_institu.estado == true) {
            console.log(objt_f_institu.srlz);
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: objt_f_institu.srlz + "&tipo=actualizar&nom_tabla=tipo_gastos",
                success: function(r) {
                    console.log(r);
                    location.reload();
                    $("#form_tipo_gastos")[0].reset();
                }
            })
        }
    }

    function carga_tipo_gastos(id_institu) {
        console.log("Carga el tipo_gastos " + id_institu);
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "pkID=" + id_institu + "&tipo=consultar&nom_tabla=tipo_gastos",
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

    function elimina_tipo_gastos(id_tipo_gastos) {
        console.log('Eliminar la tipo_gastos: ' + id_tipo_gastos);
        var confirma = confirm("En realidad quiere eliminar esta tipo_gastos?");
        console.log(confirma);
        /**/
        if (confirma == true) {
            //si confirma es true ejecuta ajax
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: "pkID=" + id_tipo_gastos + "&tipo=eliminar_logico&nom_tabla=tipo_gastos",
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
    $("#nombre_tipo_gastos").change(function(event) {
        /* valida que no tenga menos de 8 caracteres*/
        validaEqualIdentifica($(this).val());
    });

    function validaEqualIdentifica(num_id) {
        console.log("busca valor " + encodeURI(num_id));
        var consEqual = "SELECT COUNT(*) as res_equal FROM `tipo_gastos` WHERE estado=1 and `nombre_tipo_gastos`= '" + num_id + "'";
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "query=" + consEqual + "&tipo=consulta_gen",
        }).done(function(data) {
            /**/
            //console.log(data.mensaje[0].res_equal);
            if (data.mensaje[0].res_equal > 0) {
                alert("El Nombre de la tipo_gastos ya existe, por favor ingrese un nombre diferente.");
                $("#nombre_tipo_gastos").val("");
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