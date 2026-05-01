$( document ).ready(function() {

	//saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
	$("#provinsi").change(function(){
	      var id_provinces = $(this).val(); 
	      $.ajax({
	         type: "POST",
	         dataType: "html",
	         url: "data-wilayah.php?jenis=kota",
	         data: "id_provinces="+id_provinces,
	         success: function(msg){
	            $("select#kota").html(msg);
	            getAjaxKota();                                                        
	         }
	      });                    
     });  

	$("#kota").change(getAjaxKota);
     function getAjaxKota(){
          var id_regencies = $("#kota").val();
          $.ajax({
             type: "POST",
             dataType: "html",
             url: "data-wilayah.php?jenis=kecamatan",
             data: "id_regencies="+id_regencies,
             success: function(msg){
                $("select#kecamatan").html(msg); 
               getAjaxKecamatan();                                                    
             }
          });
     }

     $("#kecamatan").change(getAjaxKecamatan);
     function getAjaxKecamatan(){
          var id_district = $("#kecamatan").val();
          $.ajax({
             type: "POST",
             dataType: "html",
             url: "data-wilayah.php?jenis=kelurahan",
             data: "id_district="+id_district,
             success: function(msg){
                $("select#kelurahan").html(msg);                                                 
             }
          });
     }
});