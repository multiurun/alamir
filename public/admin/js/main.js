pdfMake.fonts = {
	Arial : {
		normal : 'arial.ttf',
		bold : 'arial.ttf'
	}
}
$(document).ready(function() {    
    $('#example').DataTable({        
        language: {
			"lengthMenu": "  _MENU_  اختر  ",
			"info": " ",
			"infoEmpty": " ",
                "zeroRecords": "لا يوجد بيانات  حاليا ",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": " يمكنك البحث بجميع خصائص الجدول     ",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"التالي ",
                    "sPrevious": "السابق"
			     },
            },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',       
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      '<i class="fas fa-file-excel"></i> ',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
			},
			{
				extend:    'pdfHtml5',
				text:      '<i class="fas fa-file-pdf"></i> ',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-danger',
				customize:function(doc){
					doc.defaultStyle.font = 'Arial';
				}

			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info'
			},
		]	        
    });     
});