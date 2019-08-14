$(function() {
    //INGRESA A LOS ATRIBUTOS AL FORMULARIO PARA INSERTAR EPS 
    $("#btn_nuevoeps").click(function() {
        $("#lbl_form_eps").html("Nueva EPS");
        $("#lbl_btn_actioneps").html("Guardar <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actioneps").attr("data-action", "crear");
        $("#form_eps")[0].reset();
    });
    //Definir la acción del boton del formulario 
    $("#btn_actioneps").click(function() {
        console.log("al principio");
        action = $(this).attr("data-action");
        //define la acción que va a realizar el formulario
        valida_actio(action);
        console.log("accion a ejecutar: " + action);
    });
    $("[name*='edita_eps']").click(function() {
        $("#lbl_form_eps").html("Edita EPS");
        $("#lbl_btn_actioneps").html("Guardar Cambios <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actioneps").attr("data-action", "editar");
        $("#form_eps")[0].reset();
        id = $(this).attr('data-id-eps');
        console.log(id);
        carga_eps(id);
    });
    $("[name*='elimina_eps']").click(function(event) {
        id_institu = $(this).attr('data-id-eps');
        console.log(id_institu)
        elimina_eps(id_institu);
    });
    //---------------------------------------------------
    //---------------------------------------------------------
    //
    sessionStorage.setItem("id_tab_eps", null);
    //---------------------------------------------------------
    //click al detalle en cada fila----------------------------
    $('.table').on('click', '.detail', function() {
        window.location.href = $(this).attr('href');
    });
    //valida accion a realizar
    function valida_actio(action) {
        console.log("en la mitad");
        if (action === "crear") {
            crea_eps();
        } else if (action === "editar") {
            edita_eps();
        };
    };

    function crea_eps() {
        objt_f_institu = $("#form_eps").valida();
        if (objt_f_institu.estado == true) {
            $.ajax({
                type: "GET",
                url: "../controller/ajaxController12.php",
                data: objt_f_institu.srlz + "&tipo=inserta&nom_tabla=eps",
                success: function(r) {
                    console.log(r);
                    location.reload();
                }
            })
        }
    }

    function edita_eps() {
        console.log("aqui toy")
        //crea el objeto formulario serializado
        objt_f_institu = $("#form_eps").valida();
        if (objt_f_institu.estado == true) {
            console.log(objt_f_institu.srlz);
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: objt_f_institu.srlz + "&tipo=actualizar&nom_tabla=eps",
                success: function(r) {
                    console.log(r);
                    location.reload();
                    $("#form_eps")[0].reset();
                }
            })
        }
    }

    function carga_eps(id_institu) {
        console.log("Carga el eps " + id_institu);
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "pkID=" + id_institu + "&tipo=consultar&nom_tabla=eps",
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

    function elimina_eps(id_eps) {
        console.log('Eliminar la eps: ' + id_eps);
        var confirma = confirm("En realidad quiere eliminar esta EPS?");
        console.log(confirma);
        /**/
        if (confirma == true) {
            //si confirma es true ejecuta ajax
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: "pkID=" + id_eps + "&tipo=eliminar_logico&nom_tabla=eps",
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
    $("#nombre_eps").change(function(event) {
        /* valida que no tenga menos de 8 caracteres*/
        validaEqualIdentifica($(this).val());
    });

    function validaEqualIdentifica(num_id) {
        console.log("busca valor " + encodeURI(num_id));
        var consEqual = "SELECT COUNT(*) as res_equal FROM `eps` WHERE estado=1 and `nombre_eps`= '" + num_id + "'";
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "query=" + consEqual + "&tipo=consulta_gen",
        }).done(function(data) {
            /**/
            //console.log(data.mensaje[0].res_equal);
            if (data.mensaje[0].res_equal > 0) {
                alert("El Nombre de la EPS ya existe, por favor ingrese un nombre diferente.");
                $("#nombre_eps").val("");
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