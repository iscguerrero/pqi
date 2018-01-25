$(document).ready(function () {
	// Configuracion de la tabla donde se visualizaran los documentos cargados al sitio
	$('#tabla').bootstrapTable({
		data: obtenerData(),
		clickToSelect: true,
		toolbar: '#toolbar',
		columns: [
			{ radio: true, align: 'center' },
			{ field: 'id', title: 'id', visible: false },
			{ field: 'articulo', title: 'Articulo', sortable: true },
			{ field: 'fraccion', title: 'Fracción', sortable: true },
			{ field: 'descripcion', title: 'Descripción', sortable: true },
			{
				field: 'nombre_archivo', title: "<i class='fa fa-file-pdf-o'></i> Descargar", formatter: function (value, row, index) {
					return "<a target='_blank' href='./" + row.url + "'>" + value + "</a>";
				}
			},
			{ field: 'estatus', title: 'estatus', visible: false },
		],
		onClickRow: function (row, $element, field) {
			$('#id').val(row.id);
			$('#articulo').val(row.articulo);
			$('#fraccion').val(row.fraccion);
			$('#descripcion').val(row.descripcion);
			$('#estatus').val(row.estatus);
		},
	});

	// Abrimos el modal para cargar un nuevo archivo
	$('#btnAlta').click(function () {
		$('#id').val('');
		$('#articulo').val('');
		$('#fraccion').val('');
		$('#descripcion').val('');
		$('#estatus').val('A');
		$('#modalArchivo').modal('show');
	});

	// Abrimos el modal para editar la informacion de un archivo
	$('#btnEditar').click(function () {
		if ($('#id').val() == '') {
			alert('Selecccion un registro de la tabla para continuar');
		} else {
			$('#modalArchivo').modal('show');
		}
	});

	// Enviamos el formulario para cargar o modificar la informacion de un archivo
	$('#formArchivo').on('submit', function (e) {
		e.preventDefault();
		var formData = new FormData(document.getElementById('formArchivo'));
		$.ajax({
			url: './Sitio/recibirArchivo',
			type: 'POST',
			dataType: 'JSON',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function (objeto) {
				$('#msjAlerta').html('ESPERA UN MOMENTO POR FAVOR...');
				$('#modalAlerta').modal('show');
			},
			success: function (json) {
				$('#msjAlerta').html(json.msj);
				if (json.flag == true) {
					$('#tabla').bootstrapTable('load', obtenerData());
					$('#modalArchivo').modal('hide');
				}
			},
			error: function () {
				$('#msjAlerta').html('LO SENTIMOS, EL SISTEMA EXPERIMENTA CONTRATIEMPOS INESPERADOS, INTENTALO DE NUEVO MAS TARDE');
				$('#modalAlerta').modal('show');
			}
		})
	});

	// Funcion para cerrar el modal de alerta
	$('#btnCerrar').click(function () {
		$('#modalAlerta').modal('hide');
	});

});

// Funcion para obtener la lista de clientes
var obtenerData = function () {
	response = ajax('./Sitio/ObtenerData', { });
	return response;
}

var ajax = function (url, str) {
	response = [];
	$.ajax({
		url: url,
		data: str,
		type: 'POST',
		async: false,
		cache: false,
		dataType: 'json',
		success: function (json) {
			response = json;
		}
	});
	return response;
}