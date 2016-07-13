$(document).ready(function(){
   $('#tabla_lista').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        //"sPaginationType": "full_numbers", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
		//"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"iDisplayLength": -1,
		"bLengthChange": false,
		"oLanguage": {
				"sProcessing": "Cargando...",
				"sLengthMenu": "Ver _MENU_ registros",
				"sZeroRecords": "No se produjo ningún resultado",
				"sEmptyTable": "No existen registros para mostrar",
				"sInfo": "Resultado _START_ - _END_ de _TOTAL_ registros",
				"sInfoEmpty": "Registros 0 - 0 de 0 Entradas",
				"sInfoFiltered": "(Filtrado de _MAX_ registros)",
				"sInfoPostFix": "",
				"sSearch": "Buscar:",
				"sUrl": "",
				"oPaginate": {
					"sFirst":    "Primero",
					"sPrevious": "Anterior",
					"sNext":     "Siguiente",
					"sLast":     "Último"
				},
			}
    } );
    
    
     $('.edit').editable(urls['up'], {
        id          : 'id',
        name        : 'progreso',
        tooltip     : 'Clic para editar',
		style       : 'display:inline',
		width	    : 40,
		callback    : function(value, settings) {
						$('#'+value.id).html(value.progreso);
						$('#link_' + value.id).data('link', value.progreso*1 + 1);
						$('#d_'+value.id).html(value.descarga ? value.descarga : '-');
						$('#link2_' + value.id).data('link', value.descarga*1 + 1);
                     },
		ajaxoptions : {dataType : "json"}
    });
	
	$('.dl').editable(urls['upd'], {
        id          : 'sId',
        name        : 'descarga',
        tooltip     : 'Clic para editar',
		style       : 'display:inline',
		width	    : 40,
		submitdata  : function(value, settings) {
       					return {'id': $(this).attr('id').split('_')[1]};
   					 },
   		callback    : function(value, settings) {
						$('#d_'+value.id).html(value.descarga);
   						$('#link2_' + value.id).data('link', value.descarga*1 + 1);
                     },
		ajaxoptions : {dataType : "json"}
    });

    $('.datepicker').datepicker({
	  	inline: true,
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
        showButtonPanel: true,
	});
	
	$(".link").on("click", function (event) {
		var id = this.id.split('_')[1];
		$.ajax({
			url: urls['up'],
			data: $.param({"id":id, "progreso": $(this).data('link')}),
			type: 'POST',
			dataType: 'json',
			success:function (datos, textStatus) {
				$('#' + id).html(datos.progreso); 
				$('#link_' + id).data('link', datos.progreso*1 + 1);
				$('#d_' + id).html(datos.descarga ? datos.descarga : '-');
				$('#link2_' + id).data('link', datos.descarga*1 + 1);
			}
		});
		return false;
	});

	$(".link2").on("click", function (event) {
		var id = this.id.split('_')[1];
		$.ajax({
			url: urls['upd'],
			data: $.param({"id":id, "descarga": $(this).data('link')}),
			type: 'POST',
			dataType: 'json',
			success:function (datos, textStatus) {
				$('#d_' + id).html(datos.descarga);
				$('#link2_' + id).data('link', datos.descarga*1 + 1);
			}
		});
		return false;
	});
});
