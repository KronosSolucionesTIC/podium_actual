$(function() {
    //INGRESA A LOS ATRIBUTOS AL FORMULARIO PARA INSERTAR proveedor 
    $("#btn_nuevoproveedor").click(function() {
        $("#lbl_form_proveedor").html("Nueva proveedor");
        $("#lbl_btn_actionproveedor").html("Guardar <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actionproveedor").attr("data-action", "crear");
        $("#form_proveedor")[0].reset();
    });
    //Definir la acción del boton del formulario 
    $("#btn_actionproveedor").click(function() {
        console.log("al principio");
        action = $(this).attr("data-action");
        //define la acción que va a realizar el formulario
        valida_actio(action);
        console.log("accion a ejecutar: " + action);
    });
    $("[name*='edita_proveedor']").click(function() {
        $("#lbl_form_proveedor").html("Edita proveedor");
        $("#lbl_btn_actionproveedor").html("Guardar Cambios <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actionproveedor").attr("data-action", "editar");
        $("#form_proveedor")[0].reset();
        id = $(this).attr('data-id-proveedor');
        console.log(id);
        carga_proveedor(id);
    });
    $("[name*='elimina_proveedor']").click(function(event) {
        id_institu = $(this).attr('data-id-proveedor');
        console.log(id_institu)
        elimina_proveedor(id_institu);
    });
    //---------------------------------------------------
    //---------------------------------------------------------
    //
    sessionStorage.setItem("id_tab_proveedor", null);
    //---------------------------------------------------------
    //click al detalle en cada fila----------------------------
    $('.table').on('click', '.detail', function() {
        window.location.href = $(this).attr('href');
    });
    //valida accion a realizar
    function valida_actio(action) {
        console.log("en la mitad");
        if (action === "crear") {
            crea_proveedor();
        } else if (action === "editar") {
            edita_proveedor();
        };
    };

    function crea_proveedor() {
        objt_f_proveedor = $("#form_proveedor").valida();
        if (objt_f_proveedor.estado == true) {
            $.ajax({
                type: "GET",
                url: "../controller/ajaxController12.php",
                data: objt_f_proveedor.srlz + "&tipo=inserta&nom_tabla=proveedor",
                success: function(r) {
                    console.log(r);
                    location.reload();
                }
            })
        }
    }

    function edita_proveedor() {
        console.log("aqui toy")
        //crea el objeto formulario serializado
        objt_f_proveedor = $("#form_proveedor").valida();
        if (objt_f_proveedor.estado == true) {
            console.log(objt_f_proveedor.srlz);
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: objt_f_proveedor.srlz + "&tipo=actualizar&nom_tabla=proveedor",
                success: function(r) {
                    console.log(r);
                    location.reload();
                    $("#form_proveedor")[0].reset();
                }
            })
        }
    }

    function carga_proveedor(id_institu) {
        console.log("Carga el proveedor " + id_institu);
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "pkID=" + id_institu + "&tipo=consultar&nom_tabla=proveedor",
        }).done(function(data) {
            $.each(data.mensaje[0], function(key, value) {
                $("#" + key).val(value);
            });
        }).fail(function() {
            console.log("error");
        }).always(function() {
            console.log("complete");
        });
    };

    function elimina_proveedor(id_proveedor) {
        console.log('Eliminar la proveedor: ' + id_proveedor);
        var confirma = confirm("En realidad quiere eliminar esta proveedor?");
        console.log(confirma);
        /**/
        if (confirma == true) {
            //si confirma es true ejecuta ajax
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: "pkID=" + id_proveedor + "&tipo=eliminar_logico&nom_tabla=proveedor",
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
    $("#nombre_proveedor").change(function(event) {
        /* valida que no tenga menos de 8 caracteres*/
        validaEqualIdentifica($(this).val());
    });

    function validaEqualIdentifica(num_id) {
        console.log("busca valor " + encodeURI(num_id));
        var consEqual = "SELECT COUNT(*) as res_equal FROM `proveedor` WHERE estado=1 and `nombre_proveedor`= '" + num_id + "'";
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "query=" + consEqual + "&tipo=consulta_gen",
        }).done(function(data) {
            /**/
            //console.log(data.mensaje[0].res_equal);
            if (data.mensaje[0].res_equal > 0) {
                alert("El Nombre de la proveedor ya existe, por favor ingrese un nombre diferente.");
                $("#nombre_proveedor").val("");
            } else {
                //return false;
            }
        }).fail(function() {
            console.log("error");
        }).always(function() {
            console.log("complete");
        });
    }

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
                url: '../controller/ajaxproveedor<.php',
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
});