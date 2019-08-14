$(function() {
    //INGRESA A LOS ATRIBUTOS AL FORMULARIO PARA INSERTAR profesor 
    $("#btn_nuevoprofesor").click(function() {
        $("#lbl_form_profesor").html("Nuevo profesor");
        $("#lbl_btn_actionprofesor").html("Guardar <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actionprofesor").attr("data-action", "crear");
        $("#form_profesor")[0].reset();
        $("#foto").remove();
        cargar_input();
    });
    //Definir la acción del boton del formulario 
    $("#btn_actionprofesor").click(function() {
        console.log("al principio");
        action = $(this).attr("data-action");
        //define la acción que va a realizar el formulario
        valida_actio(action);
        console.log("accion a ejecutar: " + action);
    });
    $("[name*='edita_profesor']").click(function() {
        $("#lbl_form_profesor").html("Edita profesor");
        $("#lbl_btn_actionprofesor").html("Guardar Cambios <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actionprofesor").attr("data-action", "editar");
        $("#form_profesor")[0].reset();
        $("#foto").remove();
        id = $(this).attr('data-id-profesor');
        cargar_input();
        console.log(id);
        carga_profesor(id);
    });
    $("[name*='elimina_profesor']").click(function(event) {
        id_institu = $(this).attr('data-id-profesor');
        console.log(id_institu)
        elimina_profesor(id_institu);
    });
    //---------------------------------------------------
    //---------------------------------------------------------
    //
    sessionStorage.setItem("id_tab_profesor", null);
    //---------------------------------------------------------
    //click al detalle en cada fila----------------------------
    $('.table').on('click', '.detail', function() {
        window.location.href = $(this).attr('href');
    });
    //valida accion a realizar
    function valida_actio(action) {
        console.log("en la mitad");
        if (action === "crear") {
            crea_profesor();
        } else if (action === "editar") {
            edita_profesor();
        };
    };

    function crea_profesor() {
        objt = $("#form_profesor").valida();
        if (objt.estado == true) {
            var data = new FormData(document.getElementById("form_profesor"));
            if (document.getElementById("fileupload_lista").files.length) {
                data.append('file', $("#fileupload_lista").get(0).files[0]);
            };
            data.append('tipo', "crear");
            $.ajax({
                type: "POST",
                url: "../controller/ajaxprofesor.php",
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

    function edita_profesor() {
        objt = $("#form_profesor").valida();
        if (objt.estado == true) {
            var data = new FormData(document.getElementById("form_profesor"));
            if (document.getElementById("fileupload_lista")) {
                data.append('file', $("#fileupload_lista").get(0).files[0]);
            };
            data.append('tipo', "editar");
            $.ajax({
                type: "POST",
                url: "../controller/ajaxprofesor.php",
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

    function carga_profesor(id_institu) {
        console.log("Carga el profesor " + id_institu);
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "pkID=" + id_institu + "&tipo=consultar&nom_tabla=profesor",
        }).done(function(data) {
            $.each(data.mensaje[0], function(key, value) {
                if (key == "foto_pro" && value != "") {
                    $("#form_profesor").append('<div id="foto" class="form-group">' + '<label for="adjunto" id="lbl_pkID_archivo_" name="lbl_pkID_archivo_" class="custom-control-label">Foto</label>' + '<br>' + '<input type="text" style="width: 89%;display: inline;" class="form-control" id="pkID_archivo" name="btn_RmFuncionario" value="' + value + '" readonly="true"> <a id="btn_doc" title="Descargar Archivo" name="download_documento" type="button" class="btn btn-success" href = "../vistas/fotos/' + value + '" target="_blank" ><span class="glyphicon glyphicon-download-alt"></span></a><button name="btn_actionRmSaber" id="btn_actionRmSaber" data-id-contratos="1" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>' + '</div>');
                    $("#lbl_foto").remove();
                    $("#fileupload_lista").remove();
                    $("[name*='btn_actionRmSaber']").click(function(event) {
                        var id_archivo = $("#pkID").val();
                        console.log("este es el numero" + id_archivo);
                        elimina_foto(id_archivo);
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

    function elimina_profesor(id_profesor) {
        console.log('Eliminar la profesor: ' + id_profesor);
        var confirma = confirm("En realidad quiere eliminar esta profesor?");
        console.log(confirma);
        /**/
        if (confirma == true) {
            //si confirma es true ejecuta ajax
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: "pkID=" + id_profesor + "&tipo=eliminar_logico&nom_tabla=profesor",
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

    function cargar_input() {
        $("#form_profesor").append('<div class="form-group" id="foto">' + '<label for="adjunto" id="lbl_foto" class=" control-label">Foto</label>' + '<input type="file" class="form-control" id="fileupload_lista" name="fileupload_lista">' + '</div>')
    }

    function elimina_foto(id_archivo) {
        console.log('Eliminar el archivito: ' + id_archivo);
        var confirma = confirm("En realidad quiere eliminar la Foto?");
        console.log(confirma);
        /**/
        if (confirma == true) {
            var data = new FormData();
            data.append('pkID', id_archivo);
            data.append('tipo', "eliminararchivo");
            //si confirma es true ejecuta ajax
            $.ajax({
                type: "POST",
                url: '../controller/ajaxprofesor.php',
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