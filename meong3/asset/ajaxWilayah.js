$(document).ready(function () 
{
    //pilih Mata Pelajaran
    //pilih KI -- kompetisi
    //pilih Metode
    //pilih indikator
    //pilih KD

    /*ajax wira
    $.get($("#pilihMapel").attr("href"), function(results){
                        console.log(JSON.stringify(results));
                        $.each(results, function (i, item) {
                        $('#pilihMapel').append($('<option>', { 
                            value: item.ID_MASTER_PENILAIAN,
                            text : item.INDIKATOR_PENILAIAN
                        }));
                    });

                  }, 'json');
    */
       $.ajax({
                url: $("#pilihKecamatan").attr("href"),
                 type:'GET',
                 dataType: 'json',
                 success: function(results){
                        console.log(JSON.stringify(results));
                        $.each(results, function (i, item) {
                        $('#pilihKecamatan').append($('<option>', { 
                            value: item.KODE_WILAYAH,
                            text : item.NAMA_WILAYAH
                        }));
                    });

                  } 
                  });
    
    /*   
      $('#pilihJenis').change(function(){
          $.when(
               $.ajax({
                    url: 'http://172.16.3.101/index.php/sekolah/'+$('#pilihJenis').val(),
                     type:'GET',
                     dataType: 'html',
                     success: function(results){

                   $('#result').html(results);

                      } 
                      }),
               $.ajax({
                    url: 'http://172.16.3.101/index.php/sekolah/rekap/'+$('#pilihJenis').val(),
                     type:'GET',
                     dataType: 'json',
                     success: function(json){
                   console.log(JSON.stringify(json[0].jumlah));
                    $("#jmlsekolah").html("Jumlah : "+json[0].jumlah);
                   }
                      })
                ) 
           

            });*/
    
        
    
    $('#pilihKecamatan').change(function(){
               $.ajax({
                url: $("#pilihKelurahan").attr("href")+"/"+$('#pilihKecamatan').val(),
                 type:'GET',
                 dataType: 'json',
                 success: function(results){
                        $('#pilihKelurahan').html($('<option>',{
                            value:'null',
                            text:'-- Pilih Kelurahan --'
                        }));
                        console.log(JSON.stringify(results));
                        $.each(results, function (i, item) {
                        $('#pilihKelurahan').append($('<option>', { 
                            value: item.KODE_WILAYAH,
                            text : item.NAMA_WILAYAH
                        }));
                    });

                  } 
                  });
    }); 
    
    
    $('#cariBtn').click(function(){
               $('#result').html("<img class=\"center-block\" src=\""+CI_ROOT+"/assets/img/ajax_loading.gif\">");      
               $.ajax({
                url: $(this).attr("href")+"/"+$('#pilihJenis').val().trim()+
                     '/'+$('#pilihKecamatan').val().trim()+
                     '/'+$('#pilihKelurahan').val().trim(),
                 type:'GET',
                 dataType: 'html',
                 success: function(results){
                    $('#result').html(results);
                   
                  } 
                });
        });
    
});



