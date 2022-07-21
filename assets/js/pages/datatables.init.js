/*
Template Name: Minia - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Datatables Js File
*/

$(document).ready(function() {
   
  
	$('.table_passwords').DataTable( {
        "language": {
            "lengthMenu": "_MENU_",
            "zeroRecords": "Извините, ничего не найдено",
            "info": "Показано _PAGE_ из _PAGES_ записей",
            "infoEmpty": "Нет похожих записей",
            "infoFiltered": "",
            "search": "Поиск",
            "oPaginate": {
                "sFirst":    "Первая",
                "sLast":    "Последняя",
                "sNext":    "Вперед",
                "sPrevious": "Назад"
            },
        },
		"order": []
    } );
	
	$('#datatable').DataTable( {
        "language": {
            "lengthMenu": "_MENU_",
            "zeroRecords": "Извините, ничего не найдено",
            "info": "Показано _PAGE_ из _PAGES_ записей",
            "infoEmpty": "Нет доступных записей",
            "infoFiltered": "(отфильтровано из _MAX_ общих записей)",
            "search": "Поиск",
            "oPaginate": {
                "sFirst":    "Первая",
                "sLast":    "Последняя",
                "sNext":    "Вперед",
                "sPrevious": "Назад"
            },
        },
		"order": []
    } );

    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

    $(".dataTables_length select").addClass('form-select form-select-sm');
});