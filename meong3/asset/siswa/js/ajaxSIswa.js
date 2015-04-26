$(document).ready(function () 
{
    //pilih Mata Pelajaran
    //pilih KI -- kompetisi
    //pilih Metode
    //pilih indikator
    //pilih KD
       $.ajax({
                url: $("#pilihMapel").attr("href"),
                 type:'GET',
                 dataType: 'json',
                 success: function(results){
                        console.log(JSON.stringify(results));
                        $.each(results, function (i, item) {
                        $('#pilihMapel').append($('<option>', { 
                            value: item.ID_MASTER_PENILAIAN,
                            text : item.INDIKATOR_PENILAIAN
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
    
        
    
    $('#pilihMapel').change(function(){
               $.ajax({
                url: $("#pilihKI").attr("href")+"/"+$('#pilihMapel').val(),
                 type:'GET',
                 dataType: 'json',
                 success: function(results){
                        $('#pilihKI').html($('<option>',{
                            value:'null',
                            text:'-- Pilih Aspek Penilaian --'
                        }));
                        $('#pilihMetode').html($('<option>',{
                            value:'null',
                            text:'-- Pilih Metode Penilaian --'
                        }));
                        $('#pilihIndikator').html($('<option>',{
                            value:'null',
                            text:'-- Pilih Indikator Penilaian --'
                        }));
                        $('#pilihKD').html($('<option>',{
                            value:'null',
                            text:'-- Pilih Kompetensi Dasar --'
                        }));
                        console.log(JSON.stringify(results));
                        $.each(results, function (i, item) {
                        $('#pilihKI').append($('<option>', { 
                            value: item.ID_MASTER_PENILAIAN,
                            text : item.INDIKATOR_PENILAIAN
                        }));
                    });

                  } 
                  });
    }); 
    
    $('#pilihKI').change(function(){
               $.ajax({
                url: $("#pilihMetode").attr("href")+"/"+$('#pilihKI').val(),
                 type:'GET',
                 dataType: 'json',
                 success: function(results){
                      $('#pilihMetode').html($('<option>',{
                            value:'null',
                            text:'-- Pilih Metode Penilaian --'
                        }));
                      $('#pilihIndikator').html($('<option>',{
                            value:'null',
                            text:'-- Pilih Indikator Penilaian --'
                        }));
                      $('#pilihKD').html($('<option>',{
                            value:'null',
                            text:'-- Pilih Kompetensi Dasar --'
                        }));
                        console.log(JSON.stringify(results));
                        $.each(results, function (i, item) {
                        $('#pilihMetode').append($('<option>', { 
                            value: item.ID_MASTER_PENILAIAN,
                            text : item.INDIKATOR_PENILAIAN
                        }));
                    });

                  } 
                });
    });

    $('#pilihMetode').change(function(){
               $.ajax({
                url: $("#pilihIndikator").attr("href")+"/"+$('#pilihMetode').val(),
                 type:'GET',
                 dataType: 'json',
                 success: function(results){
                      $('#pilihIndikator').html($('<option>',{
                            value:'null',
                            text:'-- Pilih Metode Penilaian --'
                        }));
                      $('#pilihKD').html($('<option>',{
                            value:'null',
                            text:'-- Pilih Kompetensi Dasar --'
                        }));
                        console.log(JSON.stringify(results));
                        $.each(results, function (i, item) {
                        $('#pilihIndikator').append($('<option>', { 
                            value: item.ID_MASTER_PENILAIAN,
                            text : item.INDIKATOR_PENILAIAN
                        }));
                    });

                  } 
                });
    });

    $('#pilihIndikator').change(function(){
                   $.ajax({
                    url: $("#pilihKD").attr("href")+"/"+$('#pilihIndikator').val(),
                     type:'GET',
                     dataType: 'json',
                     success: function(results){
                          $('#pilihKD').html($('<option>',{
                                value:'null',
                                text:'-- Pilih Kompetensi Dasar --'
                            }));
                            console.log(JSON.stringify(results));
                            $.each(results, function (i, item) {
                            $('#pilihKD').append($('<option>', { 
                                value: item.ID_MASTER_PENILAIAN,
                                text : item.INDIKATOR_PENILAIAN
                            }));
                        });

                      } 
                    });
        });
    
    $('#cariBtn').click(function(){
               $('#result').html("<img class=\"center-block\" src=\""+CI_ROOT+"/assets/img/ajax_loading.gif\">");      
               $.ajax({
                url: $(this).attr("href")+"/"+$('#pilihJenis').val().trim()+
                     '/'+$('#pilihMapel').val().trim()+
                     '/'+$('#pilihKI').val().trim()+
                     '/'+$('#pilihMetode').val().trim()+
                     '/'+$('#pilihIndikator').val().trim()+
                     '/'+$('#pilihKD').val().trim() ,
                 type:'GET',
                 dataType: 'html',
                 success: function(results){
                    $('#result').html(results);
                   
                  } 
                });
        });
    
});



