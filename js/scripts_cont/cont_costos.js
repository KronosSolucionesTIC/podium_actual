$(function() {
    //INGRESA A LOS ATRIBUTOS AL FORMULARIO PARA INSERTAR costos 
    $("#btn_nuevocostos").click(function() {
        $("#lbl_form_costos").html("Nuevo costo");
        $("#lbl_btn_actioncostos").html("Guardar <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actioncostos").attr("data-action", "crear");
        $("#form_costos")[0].reset();
    });
    //Definir la acción del boton del formulario 
    $("#btn_actioncostos").click(function() {
        console.log("al principio");
        action = $(this).attr("data-action");
        //define la acción que va a realizar el formulario
        valida_actio(action);
        console.log("accion a ejecutar: " + action);
    });
    $("[name*='edita_costos']").click(function() {
        $("#lbl_form_costos").html("Edita costo");
        $("#lbl_btn_actioncostos").html("Guardar Cambios <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actioncostos").attr("data-action", "editar");
        $("#form_costos")[0].reset();
        id = $(this).attr('data-id-costos');
        console.log(id);
        carga_costos(id);
    });
    $("[name*='elimina_costos']").click(function(event) {
        id_institu = $(this).attr('data-id-costos');
        console.log(id_institu)
        elimina_costos(id_institu);
    });
    //---------------------------------------------------
    //---------------------------------------------------------
    //
    sessionStorage.setItem("id_tab_costos", null);
    //---------------------------------------------------------
    //click al detalle en cada fila----------------------------
    $('.table').on('click', '.detail', function() {
        window.location.href = $(this).attr('href');
    });
    //valida accion a realizar
    function valida_actio(action) {
        console.log("en la mitad");
        if (action === "crear") {
            crea_costos();
        } else if (action === "editar") {
            edita_costos();
        };
    };

    function crea_costos() {
        objt_f_institu = $("#form_costos").valida();
        if (objt_f_institu.estado == true) {
            $.ajax({
                type: "GET",
                url: "../controller/ajaxController12.php",
                data: objt_f_institu.srlz + "&tipo=inserta&nom_tabla=costos",
                success: function(r) {
                    console.log(r);
                    location.reload();
                }
            })
        }
    }

    function edita_costos() {
        console.log("aqui toy")
        //crea el objeto formulario serializado
        objt_f_institu = $("#form_costos").valida();
        if (objt_f_institu.estado == true) {
            console.log(objt_f_institu.srlz);
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: objt_f_institu.srlz + "&tipo=actualizar&nom_tabla=costos",
                success: function(r) {
                    console.log(r);
                    location.reload();
                    $("#form_costos")[0].reset();
                }
            })
        }
    }

    function carga_costos(id_institu) {
        console.log("Carga el costos " + id_institu);
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "pkID=" + id_institu + "&tipo=consultar&nom_tabla=costos",
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

    function elimina_costos(id_costos) {
        console.log('Eliminar la costos: ' + id_costos);
        var confirma = confirm("En realidad quiere eliminar esta costos?");
        console.log(confirma);
        /**/
        if (confirma == true) {
            //si confirma es true ejecuta ajax
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: "pkID=" + id_costos + "&tipo=eliminar_logico&nom_tabla=costos",
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
    $("#nombre_costos").change(function(event) {
        /* valida que no tenga menos de 8 caracteres*/
        validaEqualIdentifica($(this).val());
    });

    function validaEqualIdentifica(num_id) {
        console.log("busca valor " + encodeURI(num_id));
        var consEqual = "SELECT COUNT(*) as res_equal FROM `costos` WHERE estado=1 and `nombre_costos`= '" + num_id + "'";
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "query=" + consEqual + "&tipo=consulta_gen",
        }).done(function(data) {
            /**/
            //console.log(data.mensaje[0].res_equal);
            if (data.mensaje[0].res_equal > 0) {
                alert("El Nombre de la costos ya existe, por favor ingrese un nombre diferente.");
                $("#nombre_costos").val("");
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