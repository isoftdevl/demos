$( document ).ready(function() {
	load(1);  

});


//Cargar datos AJAX
function load(page){
	var search=$("#search").val();
	// var per_page=$("#per_page").val();
	var parametros = {"page":page,'search':search};
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'./ajax/recipients/recipients_list_ajax.php',
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

	
//Eliminar
	function eliminar(id){

      // $('body').on('click',id, function () {
          // var id = $(this).attr('id').replace('item_', '')
          var parent = $('#item_'+id).parent().parent();
          var name = $(this).attr('data-rel');
          new Messi('<p class="messi-warning"><i class="icon-warning-sign icon-3x pull-left"></i>Are you sure you want to delete this record?<br /><strong>This action cannot be undone!!!</strong></p>', {
              title: 'Delete recipient',
              titleClass: '',
              modal: true,
              closeButton: true,
              buttons: [{
                  id: 0,
                  label: 'Delete',
                  class: '',
                  val: 'Y'
              }],
              	callback: function (val) {
                  	if (val === 'Y') {
                      	$.ajax({
                          type: 'post',
                          url:'./ajax/recipients/recipients_delete_ajax.php',
                          data: {		                          	
							  'id': id,								  
						  },
                          beforeSend: function () {
                              parent.animate({
                                  'backgroundColor': '#FFBFBF'
                              }, 400);
                          },
                          success: function (data) {
                              // parent.fadeOut(400, function () {
                              //     parent.remove();
                              // });
                              $('html, body').animate({
                                  scrollTop: 0
                              }, 600);
                              $('#resultados_ajax').html(data);
                              // console.log(data);

                              load(1);
                          }
                      	});
                  	}
              	}

          // });
      });		
	}



$( "#edit_user" ).submit(function( event ) {
	$('#save_data').attr("disabled", true);
	 var inputFileImage = document.getElementById("avatar");
	 var id = $('#id').val();
	 var email = $('#email').val();
	 var fname = $('#fname').val();
	 var lname = $('#lname').val();
	 var country = $('#country').val();
	 var city = $('#city').val();
	 var postal = $('#postal').val();
	 // var newsletter = $('#newsletter').val();
	 var notes = $('#notes').val();
	 var code_phone = $('#code_phone').val();
	 var phone = $('#phone').val();
	 var address = $('#address').val();
	 var gender = $('#gender').val();
	 // var userlevel = $('#userlevel').val();
	 // var active = $('#active').val();
	 var password = $('#password').val();
	 // var notify = $('#notify').val();
	 var active = $('input:radio[name=active]:checked').val();
	 var newsletter = $('input:radio[name=newsletter]:checked').val();
	 

	var file = inputFileImage.files[0];
	var data = new FormData();

	data.append('avatar',file);	
	data.append('password',password);	
	data.append('fname',fname);	
	data.append('lname',lname);	
	data.append('email',email);	
	data.append('address',address);	
	data.append('code_phone',code_phone);	
	data.append('phone',phone);	
	data.append('gender',gender);	
	data.append('country',country);	
	data.append('city',city);	
	data.append('postal',postal);	
	// data.append('userlevel',userlevel);	
	data.append('active',active);	
	data.append('newsletter',newsletter);	
	data.append('notes',notes);	
	data.append('id',id);	
	// data.append('notify',notify);	
	$.ajax({
			type: "POST",
			url: "ajax/recipients/recipients_edit_ajax.php",
			data: data,
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Please wait...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#save_data').attr("disabled", false);

			$('html, body').animate({
	            scrollTop: 0
	        }, 600);

			// window.setTimeout(function() {
			// $(".alert").fadeTo(500, 0).slideUp(500, function(){
			// $(this).remove();});}, 5000);				
		  }
	});
  event.preventDefault();
	
})