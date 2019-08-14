$(function() {
    //INGRESA A LOS ATRIBUTOS AL FORMULARIO PARA INSERTAR afiliado 
    $("#btn_nuevoafiliado").click(function() {
        $("#lbl_form_afiliado").html("Nueva afiliado");
        $("#lbl_btn_actionafiliado").html("Guardar <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actionafiliado").attr("data-action", "crear");
        $("#form_afiliado")[0].reset();
        $("#foto").remove();
        cargar_input();
    });
    //Definir la acción del boton del formulario 
    $("#btn_actionafiliado").click(function() {
        console.log("al principio");
        action = $(this).attr("data-action");
        //define la acción que va a realizar el formulario
        valida_actio(action);
        console.log("accion a ejecutar: " + action);
    });
    $("[name*='edita_afiliado']").click(function() {
        $("#lbl_form_afiliado").html("Edita afiliado");
        $("#lbl_btn_actionafiliado").html("Guardar Cambios <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actionafiliado").attr("data-action", "editar");
        $("#form_afiliado")[0].reset();
        $("#foto").remove();
        id = $(this).attr('data-id-afiliado');
        cargar_input();
        console.log(id);
        carga_afiliado(id);
    });
    $("[name*='elimina_afiliado']").click(function(event) {
        id_institu = $(this).attr('data-id-afiliado');
        console.log(id_institu)
        elimina_afiliado(id_institu);
    });
    //---------------------------------------------------
    //---------------------------------------------------------
    //
    sessionStorage.setItem("id_tab_afiliado", null);
    //---------------------------------------------------------
    //click al detalle en cada fila----------------------------
    $('.table').on('click', '.detail', function() {
        window.location.href = $(this).attr('href');
    });
    //valida accion a realizar
    function valida_actio(action) {
        console.log("en la mitad");
        if (action === "crear") {
            crea_afiliado();
        } else if (action === "editar") {
            edita_afiliado();
        };
    };

    function crea_afiliado() {
        objt = $("#form_afiliado").valida();
        if (objt.estado == true) {
            var data = new FormData(document.getElementById("form_afiliado"));
            if (document.getElementById("fileupload_lista").files.length) {
                data.append('file', $("#fileupload_lista").get(0).files[0]);
            };
            data.append('tipo', "crear");
            $.ajax({
                type: "POST",
                url: "../controller/ajaxafiliado.php",
                data: data,
                contentType: false,
                processData: false,
                success: function(a) {
                    console.log(a);
                    location.reload();
                }
            })
        }
    }

    function edita_afiliado() {
        objt = $("#form_afiliado").valida();
        if (objt.estado == true) {
            var data = new FormData(document.getElementById("form_afiliado"));
            if (document.getElementById("fileupload_lista")) {
                data.append('file', $("#fileupload_lista").get(0).files[0]);
            };
            data.append('tipo', "editar");
            $.ajax({
                type: "POST",
                url: "../controller/ajaxafiliado.php",
                data: data,
                contentType: false,
                processData: false,
                success: function(a) {
                    console.log(a);
                    location.reload();
                }
            })
        }
    }

    function carga_afiliado(id_institu) {
        console.log("Carga el afiliado " + id_institu);
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "pkID=" + id_institu + "&tipo=consultar&nom_tabla=afiliado",
        }).done(function(data) {
            $.each(data.mensaje[0], function(key, value) {
                if (key == "foto_afi" && value != "") {
                    $("#form_afiliado").append('<div id="foto" class="form-group">' + '<label for="adjunto" id="lbl_pkID_archivo_" name="lbl_pkID_archivo_" class="custom-control-label">Lista de asistencia</label>' + '<br>' + '<input type="text" style="width: 89%;display: inline;" class="form-control" id="pkID_archivo" name="btn_RmFuncionario" value="' + value + '" readonly="true"> <a id="btn_doc" title="Descargar Archivo" name="download_documento" type="button" class="btn btn-success" href = "../vistas/fotos/' + value + '" target="_blank" ><span class="glyphicon glyphicon-download-alt"></span></a><button name="btn_actionRmSaber" id="btn_actionRmSaber" data-id-contratos="1" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>' + '</div>');
                    $("#lbl_foto").remove();
                    $("#fileupload_lista").remove();
                    $("[name*='btn_actionRmSaber']").click(function(event) {
                        var id_archivo = $("#pkID").val();
                        console.log("este es el numero" + id_archivo);
                        elimina_archivo_saber(id_archivo);
                    });
                } else {
                    $("#" + key).val(value);
                }
            });
        }).fail(function() {
            console.log("error");
        }).always(function() {
            console.log("complete");
        });
    };

    function elimina_afiliado(id_afiliado) {
        console.log('Eliminar la afiliado: ' + id_afiliado);
        var confirma = confirm("En realidad quiere eliminar esta afiliado?");
        console.log(confirma);
        /**/
        if (confirma == true) {
            //si confirma es true ejecuta ajax
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: "pkID=" + id_afiliado + "&tipo=eliminar_logico&nom_tabla=afiliado",
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
    $("#nombre_afiliado").change(function(event) {
        /* valida que no tenga menos de 8 caracteres*/
        validaEqualIdentifica($(this).val());
    });

    function validaEqualIdentifica(num_id) {
        console.log("busca valor " + encodeURI(num_id));
        var consEqual = "SELECT COUNT(*) as res_equal FROM `afiliado` WHERE estado=1 and `nombre_afiliado`= '" + num_id + "'";
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "query=" + consEqual + "&tipo=consulta_gen",
        }).done(function(data) {
            /**/
            //console.log(data.mensaje[0].res_equal);
            if (data.mensaje[0].res_equal > 0) {
                alert("El Nombre de la afiliado ya existe, por favor ingrese un nombre diferente.");
                $("#nombre_afiliado").val("");
            } else {
                //return false;
            }
        }).fail(function() {
            console.log("error");
        }).always(function() {
            console.log("complete");
        });
    }

    function cargar_input() {
        $("#form_afiliado").append('<div class="form-group" id="foto">' + '<label for="adjunto" id="lbl_foto" class=" control-label">Foto</label>' + '<input type="file" class="form-control" id="fileupload_lista" name="fileupload_lista">' + '</div>')
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
                url: '../controller/ajaxafiliado<.php',
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