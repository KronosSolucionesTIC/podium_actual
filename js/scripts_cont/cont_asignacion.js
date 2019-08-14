$(function() {
    var arrFecha = [];
    var arrCosto = [];
    var arrValor = [];
    var arrAfiliado = [];
    //INGRESA A LOS ATRIBUTOS AL FORMULARIO PARA INSERTAR asignacion 
    $("#btn_nuevoasignacion").click(function() {
        $("#lbl_form_asignacion").html("Nueva asignacion");
        $("#lbl_btn_actionasignacion").html("Guardar <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actionasignacion").attr("data-action", "crear");
        $("#form_asignacion")[0].reset();
    });
    //Definir la acción del boton del formulario 
    $("#btn_actionasignacion").click(function() {
        console.log("al principio");
        action = $(this).attr("data-action");
        //define la acción que va a realizar el formulario
        valida_actio(action);
        console.log("accion a ejecutar: " + action);
    });
    $("[name*='edita_asignacion']").click(function() {
        $("#lbl_form_asignacion").html("Edita asignacion");
        $("#lbl_btn_actionasignacion").html("Guardar Cambios <span class='glyphicon glyphicon-save'></span>");
        $("#btn_actionasignacion").attr("data-action", "editar");
        $("#form_asignacion")[0].reset();
        id = $(this).attr('data-id-asignacion');
        console.log(id);
        carga_asignacion(id);
    });
    $("[name*='elimina_costo_afiliado']").click(function(event) {
        id_institu = $(this).attr('data-id-costo_afiliado');
        console.log(id_institu)
        elimina_asignacion(id_institu);
    });
    //---------------------------------------------------
    //---------------------------------------------------------
    //
    sessionStorage.setItem("id_tab_asignacion", null);
    //---------------------------------------------------------
    //click al detalle en cada fila----------------------------
    $('.table').on('click', '.detail', function() {
        window.location.href = $(this).attr('href');
    });
    //valida accion a realizar
    function valida_actio(action) {
        console.log("en la mitad");
        if (action === "crear") {
            crea_asignacion();
        } else if (action === "editar") {
            edita_asignacion();
        };
    };

    function crea_asignacion() {
        console.log('Entra a crear');
        recorreArray();
        items = parseInt(arrFecha.length);
        contador = parseInt($('#contador').val());
        if (contador == items - 1) {
            location.reload();
        }
    }

    function recorreArray() {
        $.each(arrFecha, function(key, value) {
            console.log("key=" + key + " value=" + value);
            costo = arrCosto[key];
            valor = arrValor[key];
            afiliado = arrAfiliado[key];
            data = "fecha=" + value + "&fkID_costo=" + costo + "&valor=" + valor + "&fkID_afiliado=" + afiliado;
            $.ajax({
                url: "../controller/ajaxController12.php",
                data: data + "&tipo=inserta&nom_tabla=costo_afiliado",
            })
            $('#contador').val(key);
        });
    }

    function edita_asignacion() {
        objt = $("#form_asignacion").valida();
        if (objt.estado == true) {
            var data = new FormData(document.getElementById("form_asignacion"));
            if (document.getElementById("fileupload_lista")) {
                data.append('file', $("#fileupload_lista").get(0).files[0]);
            };
            data.append('tipo', "editar");
            $.ajax({
                type: "POST",
                url: "../controller/ajaxasignacion.php",
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

    function carga_asignacion(id_institu) {
        console.log("Carga el asignacion " + id_institu);
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "pkID=" + id_institu + "&tipo=consultar&nom_tabla=asignacion",
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

    function elimina_asignacion(id_asignacion) {
        console.log('Eliminar la asignacion: ' + id_asignacion);
        var confirma = confirm("En realidad quiere eliminar esta asignacion?");
        console.log(confirma);
        /**/
        if (confirma == true) {
            //si confirma es true ejecuta ajax
            $.ajax({
                url: '../controller/ajaxController12.php',
                data: "pkID=" + id_asignacion + "&tipo=eliminar_logico&nom_tabla=costo_afiliado",
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
    $("#nombre_asignacion").change(function(event) {
        /* valida que no tenga menos de 8 caracteres*/
        validaEqualIdentifica($(this).val());
    });

    function validaEqualIdentifica(num_id) {
        console.log("busca valor " + encodeURI(num_id));
        var consEqual = "SELECT COUNT(*) as res_equal FROM `asignacion` WHERE estado=1 and `nombre_asignacion`= '" + num_id + "'";
        $.ajax({
            url: '../controller/ajaxController12.php',
            data: "query=" + consEqual + "&tipo=consulta_gen",
        }).done(function(data) {
            /**/
            //console.log(data.mensaje[0].res_equal);
            if (data.mensaje[0].res_equal > 0) {
                alert("El Nombre de la asignacion ya existe, por favor ingrese un nombre diferente.");
                $("#nombre_asignacion").val("");
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
                url: '../controller/ajaxasignacion<.php',
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
    $("#fkID_costo").change(function(event) {
        console.log('Entro a costo');
        completaCosto($("#fkID_costo").val());
    });

    function completaCosto(id) {
        var ruta = "../controller/ajaxasignacion.php";
        $.ajax({
            url: ruta,
            type: 'POST',
            data: {
                tipo: "consultaValor",
                id: id
            },
            success: function(data) {
                //convierte la cadena que se recibe json
                var tipos = JSON.parse(data);
                $("#valor").val(tipos.mensaje[0]["val_costo"]);
            }
        })
    }
    $("#fkID_afiliado").change(function(event) {
        console.log('Entro a afiliado');
        creaItem();
    });

    function creaItem() {
        fecha = $("#fecha").val();
        id = $("#fkID_afiliado").val();
        fkID_costo = $("#fkID_costo").val();
        costo = $("#fkID_costo option:selected").text();
        valor = $("#valor").val();
        afiliado = $("#fkID_afiliado option:selected").text();
        $("#form_asignacion").append('<div class="form-group" id="frm_group' + id + '">' + '<input type="text" style="width: 93%;display: inline;" class="form-control" id="fkID_usuario_form_' + id + '" name="fkID_usuario" value=" Fecha: ' + fecha + ', Costo: ' + costo + ', Valor: ' + valor + ', Afiliado: ' + afiliado + '" readonly="true"> <button name="btn_actionRmUsuario_' + id + '" data-id-tutor="' + id + '" data-id-frm-group="frm_group' + id + '" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>' + '</div>');
        arrFecha.push(fecha);
        arrCosto.push(fkID_costo);
        arrValor.push(valor);
        arrAfiliado.push(id);
        $("[name*='btn_actionRmUsuario_" + id + "']").click(function(event) {
            console.log('click remover asignacion ' + $(this).data('id-frm-group'));
            removeUsuario($(this).data('id-frm-group'));
            //buscar el indice
            var idUsuario = $(this).attr("data-id-tutor");
            console.log('el elemento es:' + idUsuario);
            var indexArr = arrAfiliado.indexOf(idUsuario);
            console.log("El indice encontrado es:" + indexArr);
            //quitar del array
            if (indexArr >= 0) {
                arrAfiliado.splice(indexArr, 1);
                console.log(arrAfiliado);
                arrFecha.splice(indexArr, 1);
                console.log(arrFecha);
                arrCosto.splice(indexArr, 1);
                console.log(arrCosto);
                arrValor.splice(indexArr, 1);
                console.log(arrValor);
            } else {
                console.log('salio menor a 0');
                console.log(arrFecha);
                console.log(arrCosto);
                console.log(arrValor);
                console.log(arrAfiliado);
            }
        });
    }

    function removeUsuario(id) {
        $("#" + id).remove();
    }
});