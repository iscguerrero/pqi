$(document).ready(function () {
	$('.list-group-item').click(function (e) {
		if ($(this).attr('data-art') && $(this).attr('data-fra')) {
			art = $(this).attr('data-art');
			fra = $(this).attr('data-fra');
			e.preventDefault();
			$.ajax({
				url: './Sitio/ObtenerArchivos',
				data: { art: art, fra: fra },
				type: 'POST',
				async: true,
				cache: false,
				dataType: 'json',
				success: function (json) {
					if (json.length > 0) {
						str = "<div class='list-group'>";
						$.each(json, function (index, item) {
							str = str + "<a href='" + item.url + "' target='_blank' class='list-group-item'><strong>" + item.nombre_archivo + "</strong> " + item.descripcion + "</a>"
						});
						str = str + "</div>"
						$('#documentos').html(str);
						$('#modalDocumentos').modal('show');
					}
				}
			});
		}
	});
});