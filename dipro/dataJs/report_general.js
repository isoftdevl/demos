$( document ).ready(function() {
 	select2_init();

    var start = moment().startOf('month');
    var end = moment().endOf('month');

    $('#daterange').daterangepicker({
        startDate: start,
        endDate: end,
        locale: {
          'format': 'Y/M/D',
        //   "separator": " - ",
        //     "applyLabel": "Aplicar",
        //     "cancelLabel": "Cancelar",
        //     "fromLabel": "Desde",
        //     "toLabel": "Hasta",
        //     "customRangeLabel": "Personalizado",
        //     "daysOfWeek": [
        //         "Do",
        //         "Lu",
        //         "Ma",
        //         "Mi",
        //         "Ju",
        //         "Vi",
        //         "Sa"
        //     ],
            // "monthNames": [
            //     "Enero",
            //     "Febrero",
            //     "Marzo",
            //     "Abril",
            //     "Mayo",
            //     "Junio",
            //     "Julio",
            //     "Agosto",
            //     "Septiembre",
            //     "Octubre",
            //     "Noviembre",
            //     "Diciembre"
            // ],
            // "firstDay": 1,
    },
       
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],

        }
    }).on('change', function (e) {
		load(1);
	});

 	load(1);

 });





//Cargar datos AJAX
function load(page){
	var status_courier=$("#status_courier").val();
	var customer_id=$("#customer_id").val();
	var method=$("#method").val();
	var agency=$("#agency").val();
	var daterange=$("#daterange").val();
	// var per_page=$("#per_page").val();
	var parametros = {"page":page, 'status_courier':status_courier, 'customer_id':customer_id, 'range':daterange, 'method':method, 'agency':agency};
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'./ajax/reports/report_general_ajax.php',
		data: parametros,
		 beforeSend: function(objeto){
		// $("#loader").html("<img src='./img/ajax-loader.gif'>");
	  },
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			// $("#loader").html("");
		}
	})
}


function select2_init(){

		$( ".select2" ).select2({        
		ajax: {
			url: "ajax/customers_select2.php",
			dataType: 'json',
			
			delay: 250,
			data: function (params) {
				return {
					q: params.term // search term
				};
			},
			processResults: function (data) {
				// parse the results into the format expected by Select2.
				// since we are using custom formatting functions we do not need to
				// alter the remote JSON data
				console.log(data)
				return {
					results: data
				};
			},
			cache: true
		},
		minimumInputLength: 2,
		 placeholder: "Select Customer",
		allowClear: true
	}).on('change', function (e) {
		load(1);
	});
}


function exportExcel() {

	var status_courier=$("#status_courier").val();
	var customer_id=$("#customer_id").val();
	var daterange=$("#daterange").val();
	var method=$("#method").val();
	var agency=$("#agency").val();


  window.open('report_general_excel.php?range='+daterange+'&status_courier='+status_courier+'&method='+method+'&agency='+agency+'&customer_id='+customer_id);

}


function exportPrint() {

	var status_courier=$("#status_courier").val();
	var customer_id=$("#customer_id").val();
	var daterange=$("#daterange").val();
	var method=$("#method").val();
	var agency=$("#agency").val();


  window.open('report_general_print.php?range='+daterange+'&status_courier='+status_courier+'&method='+method+'&agency='+agency+'&customer_id='+customer_id);

}