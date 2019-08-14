$(function() {
    //INGRESA A LOS ATRIBUTOS AL FORMULARIO PARA INSERTAR categoria 
    $("#btn_nuevocategoria").click(function() {
        $("#lbl_form_categoria").html("Nueva categoria");
        $("#lbl_btn_actioncategoria").html("Guardar <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actioncategoria").attr("data-action", "crear");
        $("#form_categoria")[0].reset();
    });
    //Definir la acción del boton del formulario 
    $("#btn_actioncategoria").click(function() {
        console.log("al principio");
        action = $(this).attr("data-action");
        //define la acción que va a realizar el formulario
        valida_actio(action);
        console.log("accion a ejecutar: " + action);
    });
    $("[name*='edita_categoria']").click(function() {
        $("#lbl_form_categoria").html("Edita categoria");
        $("#lbl_btn_actioncategoria").html("Guardar Cambios <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actioncategoria").attr("data-action", "editar");
        $("#form_categoria")[0].reset();
        id = $(this).attr('data-id-categoria');
        console.log(id);
        carga_categoria(id);
    });
    $("[name*='elimina_categoria']").click(function(event) {
        id_institu = $(this).attr('data-id-categoria');
        console.log(id_institu)
        elimina_categoria(id_institu);
    });
    //---------------------------------------------------
    //---------------------------------------------------------
    //
    sessionStorage.setItem("id_tab_categoria", null);
    //---------------------------------------------------------
    //click al detalle en cada fila----------------------------
    $('.table').on('click', '.detail', function() {
        window.location.href = $(this).attr('href');
    });
    //valida accion a realizar
    function valida_actio(action) {
        console.log("en la mitad");
        if (action === "crear") {
            crea_categoria();
        } else if (action === "editar") {
            edita_categoria();
        };
    };

    function crea_categoria() {
        objt_f_institu = $("#form_categoria").valida();
        if (objt_f_institu.estado == true) {
            $.ajax({
                type: "GET",
                url: "../controller/ajaxController12.php",
                data: objt_f_institu.srlz + "&tipo=inserta&nom_tabla=categoria",
                success: function(r) {
                    console.log(r);
                    location.reload();
                }
            })
        }
    }

    function edita_categoria() {
        console.log("aqui toy")
        //crea el objeto formulario serializado
        objt_f_institu = $("#form_categoria").valida();
        if (objt_f_institu.estado == true) {
            console.log(objt_f_institu.srlz);
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: objt_f_institu.srlz + "&tipo=actualizar&nom_tabla=categoria",
                success: function(r) {
                    console.log(r);
                    location.reload();
                    $("#form_categoria")[0].reset();
                }
            })
        }
    }

    function carga_categoria(id_institu) {
        console.log("Carga el categoria " + id_institu);
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "pkID=" + id_institu + "&tipo=consultar&nom_tabla=categoria",
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

    function elimina_categoria(id_categoria) {
        console.log('Eliminar la categoria: ' + id_categoria);
        var confirma = confirm("En realidad quiere eliminar esta categoria?");
        console.log(confirma);
        /**/
        if (confirma == true) {
            //si confirma es true ejecuta ajax
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: "pkID=" + id_categoria + "&tipo=eliminar_logico&nom_tabla=categoria",
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
    $("#nombre_categoria").change(function(event) {
        /* valida que no tenga menos de 8 caracteres*/
        validaEqualIdentifica($(this).val());
    });

    function validaEqualIdentifica(num_id) {
        console.log("busca valor " + encodeURI(num_id));
        var consEqual = "SELECT COUNT(*) as res_equal FROM `categoria` WHERE estado=1 and `nombre_categoria`= '" + num_id + "'";
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "query=" + consEqual + "&tipo=consulta_gen",
        }).done(function(data) {
            /**/
            //console.log(data.mensaje[0].res_equal);
            if (data.mensaje[0].res_equal > 0) {
                alert("El Nombre de la categoria ya existe, por favor ingrese un nombre diferente.");
                $("#nombre_categoria").val("");
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