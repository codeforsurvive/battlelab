<script type="text/javascript">

    function showModal(id)
    {
        //alert('Ok');
        $("#detailModal #kodeProject").text($("#kode_" + id).text());
        $("#formEstimasi #rabId").val(id);
        $("#formEstimasi #rabIdValidate").val(id);
        $("#formEstimasi #inputPekerja").val($("#jumlahPekerja_" + id).val());
        $("#formEstimasi #inputCuaca").val($("#cuaca_" + id).val());
        $("#formEstimasi #inputBangunan").val($("#umurBangunan_" + id).val());
        $("#formEstimasi #totalWaktu").val($("#totalwaktu_" + id).text());
        $("#formEstimasi #statusApproval").val($("#status_" + id).text());
        $("#detailModal").modal();
        
    }
    
    function editEstimasi(url)
    {        
        
        var base_url = window.location.origin;
        url = base_url +"/"+ window.location.pathname.split( '/' )[1]+"/estimasi/Estimasi";
        
        window.open(url,"_blank");
    }

</script>
<script>
    var tableRAB, tableRAP;
    var current_id_rab = -1;
    var current_id_rap = -1;
    var current_id_est = -1;
	<?php
		$newroles = array();
		$val_count_max = 0;
		$urutan = 0;
		foreach($enrollProject as $item){
			if($item["PENGGUNA_ID"]==$iduseractive){
				array_push($newroles, $item["PENUGASAN_NAMA"]);
				if($item["PENUGASAN_ID"]==4){
					$urutan = $item["URUTAN"];
				}
			}
			if($item["PENUGASAN_ID"]==4){
				$val_count_max++;
			}
		}
	?>
	var current_role = JSON.parse('<?php echo json_encode($newroles) ?>');
	var val_count_max = <?= $val_count_max ?>;
	var urutan = <?= $urutan ?>;
	
    $(document).ready(function() {
        var url = document.location.toString();
        if (url.match('#')) {
            $('#myTab a[href=#' + url.split('#')[1] + ']').tab('show');
        }

        $('#myTab a').on('shown', function(e) {
            window.location.hash = e.target.hash;
        })
		
		$('#buttonAddRab').hide();
		if(isPermitted(["estimator"],current_role)){
			$('#buttonAddRab').show();
		}
        tableRAB = $('#tabelRAB').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "<?php echo base_url(); ?>rab/rabs/getViewRabById?project_id=<?= $detailProject[0]['PROJECT_ID'] ?>",
					"createdRow": function(row, data, index) {
						var id = data[7];
						var cur_val_count = data[8];
						var status_approval = data[9];
						$('td', row).eq(2).html(parseFloat(data[2]).formatMoney(2));
						$('td', row).eq(4).html(parseFloat(data[4]).formatMoney(2));
						var text = '<a target="_blank" href="<?= base_url(); ?>rab/rabs/printRABpdf/'+id+'"><img height="15" src="<?= base_url(); ?>assets/default/img/icons/pdf.png" class="icons" title="Export to PDF" /></a><button class="btn btn-primary btn-xs" onclick="viewRAB(' + id + ')"><i class="fa fa-eye fa-fw"></i> Lihat</button><button class="btn btn-primary btn-xs" onclick="viewRABDetail(' + id + ')"><i class="fa fa-eye fa-fw"></i> Detail</button><button class="btn btn-info btn-xs" onclick="lihatRAP(' + id + ')"><i class="fa fa-list fa-fw"></i> RAP</button>';
						if(status_approval!=3 && status_approval!=4){
							if(isPermitted(["estimator"],current_role)  && status_approval!=2){
								text += '<button class="btn btn-success btn-xs" onclick="editRAB(' + id + ')"><i class="fa fa-pencil fa-fw"></i> Edit</button>';
								text += '<button class="btn btn-primary btn-xs" onclick="saveForValidationRAB(' + id + ')"><i class="fa fa-pencil fa-fw"></i> Save for validation</button>';
							}
							if (isPermitted(["validator"],current_role) && status_approval!=1){
								if(cur_val_count<=val_count_max){
									if(cur_val_count==urutan){
										if(cur_val_count==val_count_max-1){
											text += '<button class="btn btn-success btn-xs" onclick="validasiRAB(' + id + ',3)"><i class="fa fa-check fa-fw"></i> Validasi</button><button class="btn btn-danger btn-xs" onclick="validasiRAB(' + id + ',4)"><i class="fa fa-times fa-fw"></i> Tolak</button>';
										} else {
											text += '<button class="btn btn-success btn-xs" onclick="validasiRAB(' + id + ')"><i class="fa fa-check fa-fw"></i> Validasi</button><button class="btn btn-danger btn-xs" onclick="validasiRAB(' + id + ',4)"><i class="fa fa-times fa-fw"></i> Tolak</button>';
										}
									}
									else if(cur_val_count<urutan){
										text += '<button class="btn btn-danger btn-xs"><i class="fa fa-warning fa-fw"></i> Validator sebelum Anda belum memberikan validasi</button>';
									} else {
										text += '<button class="btn btn-danger btn-xs"><i class="fa fa-bookmark fa-fw"></i>Anda telah selesai memvalidasi</button>';
									}
								}
							}
						}
						$('td', row).eq(7).html(text);
						$(row).attr('id', 'item_rab_' + id);
					}
			});
		tableRAP = $('#tabelRAP').dataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>rab/rabs/getViewRabById?project_id=<?= $detailProject[0]['PROJECT_ID'] ?>",
						"createdRow": function(row, data, index) {
							var id = data[7];
							$('td', row).eq(2).html(parseFloat(data[2]).formatMoney(2));
							$('td', row).eq(4).html(parseFloat(data[4]).formatMoney(2));
							$('td', row).eq(7).html('<button class="btn btn-primary btn-xs" onclick="viewRAP(' + id + ')"><i class="fa fa-eye fa-fw"></i> Lihat</button>');
							$(row).attr('id', 'item_rap_' + id);
						}
					});
				
                tableEstimasi= $('#tabelEstimasi').dataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>rab/rabs/getViewRabById?project_id=<?= $detailProject[0]['PROJECT_ID'] ?>",
						"createdRow": function(row, data, index) {
							var id = data[7];
							$('td', row).eq(2).html(parseFloat(data[2]).formatMoney(2));
							$('td', row).eq(4).html(parseFloat(data[4]).formatMoney(2));
							$('td', row).eq(7).html('<button class="btn btn-primary btn-xs" onclick="viewEstimasi(' + id + ')"><i class="fa fa-eye fa-fw"></i> Lihat</button><button class="btn btn-success btn-xs" style="margin-left: 10px" onclick="editEstimasi(\'' + id + '\')"><i class="fa fa-pencil fa-fw"></i> Edit</button>');
							$(row).attr('id', 'item_est_' + id);
						}
					});
				});

//	function startProject(id)
//        {
//            if (confirm('Apakah Anda ingin memulai Project ini?')) {
//                window.location.assign( '<?= base_url() ?>projects/project/startProject/'+id);
//            }
//            else {
//                alert ('Transaksi dibatalkan oleh Pengguna');
//            }
//            
//        }
        function nextChar(c, d) {
		if (d == null) {
			d = 1;
		}
		return String.fromCharCode(c.charCodeAt(0) + d);
	}

	function editRAB(id) {
		$("#id_to_edit").val(id);
		$("#form_edit").submit();
	}
	
	function saveForValidationRAB(id) {
		$("#rab_id_to_validate").val(id);
		$("#form_savetovalidate").submit();
	}
	
	function validasiRAB(id,val) {
		if (typeof(val)==='undefined') {
			$("#id_to_validate").val(id);
			$("#val_to_validate").val('next');
		}
		else {
			$("#id_to_validate").val(id);
			$("#val_to_validate").val(val);
		}
		$("#validateModal").modal();
	}
        
        function startProject(id) {
		
			$("#id_to_start").val(id);
		
		$("#startModal").modal();
	}
	
	function validateSign(){
		var password = $('#validate_password').val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>auth/sign/verifysign",
			data: {iduser: <?= $iduseractive ?>, password: password},
			cache: false,
			success: function(result) {
				if(result=="false"){
					$('#alertSign').show();
				} else {
					$("#form_validasi").submit();
				}
			}
		});
	 }
         
         function validateSignPro(){
		var password = $('#validate_passwordPro').val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>auth/sign/verifysign",
			data: {iduser: <?= $iduseractive ?>, password: password},
			cache: false,
			success: function(result) {
				if(result=="false"){
					$('#alertSignPro').show();
				} else {
					$("#form_validasi_Pro").submit();
				}
			}
		});
	 }

	function lihatRAP(id) {
		window.open('<?= base_url(); ?>rap/raps/viewDetail?id=' + id, '_blank');
	}
        function viewEstimasi(id) {
		if (current_id_est != id) {
			current_id_est = id;
			$("#row_ubah_estimasi").remove();
			$("<tr id='row_ubah_estimasi'><td colspan='9'><div style='margin-top:10px; margin-bottom:10px' id='form_ubah_est' align='center'><img id='bar_loader_est' src='<?= base_url() . 'assets/default/img/bar_loader.gif' ?>'></div></td></tr>").insertAfter("#item_est_" + current_id_est);
			var x = $("#template_view_detail_estimasi").clone();
			x.appendTo("#form_ubah_est");
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>estimasi/getDataEstimation/",
				data: {rab_id: id},
				cache: true,
				success: function(result) {
					var res = JSON.parse(result);
					console.log(res);
					$("#bar_loader_est").remove();
					$(".item_est_detail").remove();
					item='<tr><td><b>Total Upah</b>:</td><td>';
					item+=(parseInt(res[0]['TOTAL_UPAH'])).formatMoney(2)+'</td></tr>';
					item+="<tr><td><b>Koefisien Upah Minimum dalam RAB</b>:</td><td>";
					item+=(parseInt(res[0]['KOEFISIEN_UPAH'])).formatMoney(2)+'</td></tr>';
					item+="<tr><td><b>Jumlah Hari (1 orang)</b>:</td><td>";
					item+=(parseInt(res[0]['TOTAL_UPAH'])  / parseInt(res[0]['KOEFISIEN_UPAH'])).toFixed(2)+' hari </td></tr>';
					item+="<tr><td><b>Jumlah Prediksi Pekerja</b>:</td><td>";
					item+=res[0]['ESTIMASI_JUMLAH_ORANG']+' orang </td></tr>';
					item+="<tr><td><b>Prediksi Toleransi Waktu akibat cuaca</b>:</td><td>";
					item+=res[0]['ESTIMASI_CUACA']+' hari </td></tr>';
					item+="<tr><td><b>Prediksi Toleransi Waktu dari umur bangunan</b>:</td><td>";
					item+=res[0]['ESTIMASI_UMUR_BANGUNAN']+' hari </td></tr>';
					item+="<tr><td><b>Prediksi Lama Waktu Pembangunan</b>:</td><td>";
					item+="<h3>"+res[0]['TOTAL_WAKTU']+' hari </h3></td></tr>';
					$("#template_view_detail_estimasi #detail_estimasi").html(item);
					x.slideDown();
				}
			});
		} else {
			$('#form_ubah_est').slideUp('normal', function() {
				$('#row_ubah_est').remove();
			});
			current_id_est = -1;
		}
	}
        
	function viewRAP(id) {
		if (current_id_rap != id) {
			current_id_rap = id;
			$("#row_ubah_rap").remove();
			$("<tr id='row_ubah_rap'><td colspan='9'><div style='margin-top:10px; margin-bottom:10px' id='form_ubah_rap' align='center'><img id='bar_loader_rap' src='<?= base_url() . 'assets/default/img/bar_loader.gif' ?>'></div></td></tr>").insertAfter("#item_rap_" + current_id_rap);
			var x = $("#template_view_detail_analisa_rap").clone();
			x.appendTo("#form_ubah_rap");
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>rap/raps/detail",
				data: {id: id},
				cache: true,
				success: function(result) {
					var res = JSON.parse(result);
					console.log(res);
					var res_barang = res["detail_barang"];
					//var res_upah = res["detail_upah"];
					var res_upah = res["detail_analisa_upah"];
					var subcon = res["subcon"];
					var item = '';
					var jumlah = 0;
					var sub_jumlah = 0;
					$("#bar_loader_rap").remove();
					$(".item_rap_detail").remove();
					if (res_barang.length > 0) {
						item += '<tr class="item_rap_detail"><td colspan="6"><b>BARANG / BAHAN</b></td></tr>';
						for (var i = 0; i < res_barang.length; i++) {
							var nama = res_barang[i]["BARANG_NAMA"];
							var kode = res_barang[i]["BARANG_KODE"];
							var volume = parseFloat(res_barang[i]["BARANG_VOLUME"]) || 0;
							var satuan = res_barang[i]["SATUAN_NAMA"];
							var harga = parseFloat(res_barang[i]["DETAIL_ANALISA_HARGA"])  || 0;
							var sub_total = harga*volume;
							item += '<tr class="item_rap_detail"><td>' + nama + '</td><td>' + kode + '</td><td>' + volume + '</td><td>' + satuan + '</td><td align="right">' + harga.formatMoney(2) + '</td><td align="right">' + sub_total.formatMoney(2) + '</td></tr>';
							jumlah += sub_total;
							sub_jumlah += sub_total;
						}
						if(subcon.length>0){
							for(var i=0; i<subcon.length; i++){
								if(parseFloat(subcon[i]["SUBCON_TIPE_ID"]) == 2){
									item += '<tr class="item_rap_detail"><td>'+subcon[i]["SUBCON_NAMA"]+'</td><td>'+subcon[i]["SUBCON_TIPE_KODE"]+'</td><td>'+subcon[i]["DETAIL_PEKERJAAN_VOLUME"]+'</td><td>'+subcon[i]["SATUAN_NAMA"]+'</td><td align="right">'+(parseFloat(subcon[i]["SUBCON_HARGA"])).formatMoney(2)+'</td><td align="right">'+(parseFloat(subcon[i]["SUBCON_HARGA"])*parseFloat(subcon[i]["DETAIL_PEKERJAAN_VOLUME"])).formatMoney(2)+'</td></tr>';
									var sub_total = (parseFloat(subcon[i]["SUBCON_HARGA"])*parseFloat(subcon[i]["DETAIL_PEKERJAAN_VOLUME"]));
									jumlah += sub_total;
									sub_jumlah += sub_total;
								}
							}
						}
						item += '<tr class="item_rap_detail"><td colspan="5" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' + (sub_jumlah).formatMoney(2) + '</td></tr>';
						sub_jumlah = 0;
					}
					/*if(res_upah.length>0){
						item += '<tr class="item_rap_detail"><td colspan="6"><b>UPAH</b></td></tr>';
						for(var i=0; i<res_upah.length; i++){
							item += '<tr class="item_rap_detail"><td>'+res_upah[i]["UPAH_NAMA"]+'</td><td>'+res_upah[i]["UPAH_KODE"]+'</td><td>'+res_upah[i]["UPAH_VOLUME"]+'</td><td>'+res_upah[i]["SATUAN_UPAH_NAMA"]+'</td><td align="right">'+(parseFloat(res_upah[i]["UPAH_HARGA"])).formatMoney(2)+'</td><td align="right">'+(parseFloat(res_upah[i]["UPAH_HARGA"])*parseFloat(res_upah[i]["UPAH_VOLUME"])).formatMoney(2)+'</td></tr>';
							jumlah += (parseFloat(res_upah[i]["UPAH_HARGA"])*parseFloat(res_upah[i]["UPAH_VOLUME"]));
							sub_jumlah += (parseFloat(res_upah[i]["UPAH_HARGA"])*parseFloat(res_upah[i]["UPAH_VOLUME"]));
						}
						item += '<tr class="item_rap_detail"><td colspan="5" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' + (sub_jumlah).formatMoney(2) + '</td></tr>';
						sub_jumlah = 0;
					}*/
					if(res_upah.length > 0){
						item += '<tr class="item_rap_detail"><td colspan="6"><b>UPAH ANALISA</b></td></tr>';
						for(var i=0; i<res_upah.length; i++){
							var nama = res_upah[i]["ANALISA_NAMA"];
							var kode = res_upah[i]["ANALISA_KODE"];
							var volume = parseFloat(res_upah[i]["UPAH_ANALISA_VOLUME"]) || 0;
							var satuan = res_upah[i]["SATUAN_NAMA"];
							var harga = parseFloat(res_upah[i]["UPAH_ANALISA_TOTAL"]) || 0;
							var sub_total = harga*volume;
							item += '<tr class="item_rap_detail"><td>'+nama+'</td><td>'+kode+'</td><td>'+volume+'</td><td>'+satuan+'</td><td align="right">'+harga.formatMoney(2)+'</td><td align="right">'+sub_total.formatMoney(2)+'</td></tr>';
							jumlah += sub_total;
							sub_jumlah += sub_total;
						}
						if(subcon.length>0){
							for(var i=0; i<subcon.length; i++){
								if(parseFloat(subcon[i]["SUBCON_TIPE_ID"]) == 3){
									item += '<tr class="item_rap_detail"><td>'+subcon[i]["SUBCON_NAMA"]+'</td><td>'+subcon[i]["SUBCON_TIPE_KODE"]+'</td><td>'+subcon[i]["DETAIL_PEKERJAAN_VOLUME"]+'</td><td>'+subcon[i]["SATUAN_UPAH_NAMA"]+'</td><td align="right">'+(parseFloat(subcon[i]["SUBCON_HARGA"])).formatMoney(2)+'</td><td align="right">'+(parseFloat(subcon[i]["SUBCON_HARGA"])*parseFloat(subcon[i]["DETAIL_PEKERJAAN_VOLUME"])).formatMoney(2)+'</td></tr>';
									var sub_total = (parseFloat(subcon[i]["SUBCON_HARGA"])*parseFloat(subcon[i]["DETAIL_PEKERJAAN_VOLUME"]));
									jumlah += sub_total;
									sub_jumlah += sub_total;
								}
							}
						}
						item += '<tr class="item_rap_detail"><td colspan="5" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' + (sub_jumlah).formatMoney(2) + '</td></tr>';
						sub_jumlah = 0;
					}
					if(subcon.length>0){
						item += '<tr class="item_rap_detail"><td colspan="6"><b>SUBCON</b></td></tr>';
						for(var i=0; i<subcon.length; i++){
							if(parseFloat(subcon[i]["SUBCON_TIPE_ID"]) == 1){
								item += '<tr class="item_rap_detail"><td>'+subcon[i]["SUBCON_NAMA"]+'</td><td>'+subcon[i]["SUBCON_TIPE_KODE"]+'</td><td>'+subcon[i]["DETAIL_PEKERJAAN_VOLUME"]+'</td><td>'+subcon[i]["SATUAN_NAMA"]+'</td><td align="right">'+(parseFloat(subcon[i]["SUBCON_HARGA"])).formatMoney(2)+'</td><td align="right">'+(parseFloat(subcon[i]["SUBCON_HARGA"])*parseFloat(subcon[i]["DETAIL_PEKERJAAN_VOLUME"])).formatMoney(2)+'</td></tr>';
								var sub_total = (parseFloat(subcon[i]["SUBCON_HARGA"])*parseFloat(subcon[i]["DETAIL_PEKERJAAN_VOLUME"]));
								jumlah += sub_total;
								sub_jumlah += sub_total;
							}
						}
						item += '<tr class="item_rap_detail"><td colspan="5" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' + (sub_jumlah).formatMoney(2) + '</td></tr>';
						sub_jumlah = 0;
					}
					item += '<tr class="item_rab_detail"><td colspan="5" style="background-color: #167CAC;"><b style="color: #FFF">JUMLAH TOTAL</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' + (jumlah).formatMoney(2) + '</td></tr>';
					item += '<tr class="item_rab_pekerjaan"><td colspan="5" style="background-color: #167CAC;"><b style="color: #FFF">OVERHEAD (5 %)</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' + (0.05*jumlah).formatMoney(2) + '</td></tr>';
					item += '<tr class="item_rab_pekerjaan"><td colspan="5" style="background-color: #167CAC;"><b style="color: #FFF">TOTAL SETELAH OVERHEAD</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' + (1.05*jumlah).formatMoney(2) + '</td></tr>';
					$("#template_view_detail_analisa_rap #detail_rap").html(item);
					x.slideDown();
				}
			});
		} else {
			$('#form_ubah_rap').slideUp('normal', function() {
				$('#row_ubah_rap').remove();
			});
			current_id_rap = -1;
		}
	}

	function viewRAB(id) {
		if (current_id_rab != id) {
			current_id_rab = id;
			$("#row_ubah_rab").remove();
			$("<tr id='row_ubah_rab'><td colspan='9'><div style='margin-top:10px; margin-bottom:10px' id='form_ubah_rab' align='center'><img id='bar_loader_rab' src='<?= base_url() . 'assets/default/img/bar_loader.gif' ?>'></div></td></tr>").insertAfter("#item_rab_" + current_id_rab);
			var x = $("#template_view_detail_analisa_rab").clone();
			x.appendTo("#form_ubah_rab");
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>rab/rabs/detail",
				data: {id: id},
				cache: true,
				success: function(result) {
					var res = JSON.parse(result);
					console.log(res);
					var res_pekerjaan = res["detail_pekerjaan"];
					var pekerjaan = '';
					var jumlah_kategori = 0;
					var jumlah_total = 0;
					var header_kategori = '';
					$("#bar_loader_rab").remove();
					$(".item_rab_pekerjaan").remove();
					var cString = 'A';
					var c = 0;
					for (var i = 0; i < res_pekerjaan.length; i++) {
						if (header_kategori != res_pekerjaan[i]["KATEGORI_PEKERJAAN_ID"]) {
							if (header_kategori != '') {
								pekerjaan += '<tr class="item_rab_pekerjaan"><td colspan="6" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' + (jumlah_kategori).formatMoney(2) + '</td></tr>';
								jumlah_total += jumlah_kategori;
								jumlah_kategori = 0;
							}
							pekerjaan += '<tr class="item_rab_pekerjaan"><td><b>' + nextChar(cString, c) + '</b></td><td colspan="6"><b>' + res_pekerjaan[i]["KATEGORI_PEKERJAAN_NAMA"] + '</b></td></tr>';
							c++;
							header_kategori = res_pekerjaan[i]["KATEGORI_PEKERJAAN_ID"];
						}

						if (res_pekerjaan[i]["ANALISA_ID"] != null) {
							pekerjaan += '<tr class="item_rab_pekerjaan"><td>' + res_pekerjaan[i]["DETAIL_PEKERJAAN_URUTAN"] + '</td><td><button class="btn btn-primary btn-xs" onclick="viewDetailAnalisa(' + res_pekerjaan[i]["ANALISA_ID"] + ')"><i class="fa fa-search fa-fw"></i></button> ' + res_pekerjaan[i]["ANALISA_NAMA"] + '</td><td>' + res_pekerjaan[i]["ANALISA_KODE"] + '</td><td>' + res_pekerjaan[i]["DETAIL_PEKERJAAN_VOLUME"] + '</td><td>' + res_pekerjaan[i]["SATUAN_ANALISA_NAMA"] + '</td><td align="right">' + (parseFloat(res_pekerjaan[i]["ANALISA_TOTAL"])).formatMoney(2) + '</td><td align="right">' + (parseFloat(res_pekerjaan[i]["DETAIL_PEKERJAAN_TOTAL"])).formatMoney(2) + '</td></tr>';
						} else {
							if(parseFloat(res_pekerjaan[i]["TIPE_SUBCON"]) == 3)
								pekerjaan += '<tr class="item_rab_pekerjaan"><td>' + res_pekerjaan[i]["DETAIL_PEKERJAAN_URUTAN"] + '</td><td>' + res_pekerjaan[i]["SUBCON_NAMA"] + '</td><td>' + res_pekerjaan[i]["SUBCON_TIPE_KODE"] + '</td><td>' + res_pekerjaan[i]["DETAIL_PEKERJAAN_VOLUME"] + '</td><td>' + res_pekerjaan[i]["SATUAN_SUBCON_UPAH_NAMA"] + '</td><td align="right">' + (parseFloat(res_pekerjaan[i]["SUBCON_HARGA"])).formatMoney(2) + '</td><td align="right">' + (parseFloat(res_pekerjaan[i]["DETAIL_PEKERJAAN_TOTAL"])).formatMoney(2) + '</td></tr>';
							else
								pekerjaan += '<tr class="item_rab_pekerjaan"><td>' + res_pekerjaan[i]["DETAIL_PEKERJAAN_URUTAN"] + '</td><td>' + res_pekerjaan[i]["SUBCON_NAMA"] + '</td><td>' + res_pekerjaan[i]["SUBCON_TIPE_KODE"] + '</td><td>' + res_pekerjaan[i]["DETAIL_PEKERJAAN_VOLUME"] + '</td><td>' + res_pekerjaan[i]["SATUAN_SUBCON_NAMA"] + '</td><td align="right">' + (parseFloat(res_pekerjaan[i]["SUBCON_HARGA"])).formatMoney(2) + '</td><td align="right">' + (parseFloat(res_pekerjaan[i]["DETAIL_PEKERJAAN_TOTAL"])).formatMoney(2) + '</td></tr>';
						}

						jumlah_kategori += parseFloat(res_pekerjaan[i]["DETAIL_PEKERJAAN_TOTAL"]);
					}
					pekerjaan += '<tr class="item_rab_pekerjaan"><td colspan="6" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' + (jumlah_kategori).formatMoney(2) + '</td></tr>';
					jumlah_total += jumlah_kategori;
					pekerjaan += '<tr class="item_rab_pekerjaan"><td colspan="6" style="background-color: #167CAC;"><b style="color: #FFF">JUMLAH TOTAL</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' + (jumlah_total).formatMoney(2) + '</td></tr>';
					pekerjaan += '<tr class="item_rab_pekerjaan"><td colspan="6" style="background-color: #167CAC;"><b style="color: #FFF">OVERHEAD (5 %)</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' + (0.05*jumlah_total).formatMoney(2) + '</td></tr>';
					pekerjaan += '<tr class="item_rab_pekerjaan"><td colspan="6" style="background-color: #167CAC;"><b style="color: #FFF">TOTAL SETELAH OVERHEAD</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' + (1.05*jumlah_total).formatMoney(2) + '</td></tr>';
					$("#template_view_detail_analisa_rab #detail_pekerjaan").html(pekerjaan);

					x.slideDown();
				}
			});
		} else {
			$('#form_ubah_rab').slideUp('normal', function() {
				$('#row_ubah_rab').remove();
			});
			current_id_rab = -1;
		}
	}
	
	function viewRABDetail(id) {
		if (current_id_rab != id) {
			current_id_rab = id;
			$("#row_ubah_rab").remove();
			$("<tr id='row_ubah_rab'><td colspan='9'><div style='margin-top:10px; margin-bottom:10px' id='form_ubah_rab' align='center'><img id='bar_loader_rab' src='<?= base_url() . 'assets/default/img/bar_loader.gif' ?>'></div></td></tr>").insertAfter("#item_rab_" + current_id_rab);
			var x = $("#template_view_detail_analisa_rab_complex").clone();
			x.appendTo("#form_ubah_rab");
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>rab/rabs/detailKompleks",
				data: {id: id},
				cache: true,
				success: function(result) {
					var res = JSON.parse(result);
					console.log(res);
					var res_pekerjaan = res["detail_pekerjaan"];
					var pekerjaan = '';
					var jumlah_kategori = 0;
					var jumlah_total = 0;
					var header_kategori = '';
					$("#bar_loader_rab").remove();
					$(".item_rab_pekerjaan").remove();
					var cString = 'A';
					var c = 0;
					for (var i = 0; i < res_pekerjaan.length; i++) {
						if (header_kategori != res_pekerjaan[i]["KATEGORI_PEKERJAAN_ID"]) {
							if (header_kategori != '') {
								pekerjaan += '<tr class="item_rab_pekerjaan"><td colspan="9" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' + (jumlah_kategori).formatMoney(2) + '</td></tr>';
								jumlah_total += jumlah_kategori;
								jumlah_kategori = 0;
							}
							pekerjaan += '<tr class="item_rab_pekerjaan"><td><b>' + nextChar(cString, c) + '</b></td><td colspan="9"><b>' + res_pekerjaan[i]["KATEGORI_PEKERJAAN_NAMA"] + '</b></td></tr>';
							c++;
							header_kategori = res_pekerjaan[i]["KATEGORI_PEKERJAAN_ID"];
						}

						if (res_pekerjaan[i]["ANALISA_ID"] != null) {
							var harga_material = 0;
							var harga_upah = 0;
							var volume = parseFloat(res_pekerjaan[i]["DETAIL_PEKERJAAN_VOLUME"]);
							if(res_pekerjaan[i]["BARANG_ID"] != null){
								harga_material = parseFloat(res_pekerjaan[i]["TOTAL_MATERIAL"]);
								i++;
							}
							if(res_pekerjaan[i]["UPAH_ID"] != null){
								harga_upah = parseFloat(res_pekerjaan[i]["TOTAL_MATERIAL"]);
							}
							pekerjaan += '<tr class="item_rab_pekerjaan"><td>' + res_pekerjaan[i]["DETAIL_PEKERJAAN_URUTAN"] + '</td><td><button class="btn btn-primary btn-xs" onclick="viewDetailAnalisa(' + res_pekerjaan[i]["ANALISA_ID"] + ')"><i class="fa fa-search fa-fw"></i></button> ' + res_pekerjaan[i]["ANALISA_NAMA"] + '</td><td>' + res_pekerjaan[i]["ANALISA_KODE"] + '</td><td>' + volume + '</td><td>' + res_pekerjaan[i]["SATUAN_ANALISA_NAMA"] + '</td><td align="right">' + harga_material.formatMoney(2) + '</td><td align="right">' + (harga_material*volume).formatMoney(2) + '</td><td align="right">' + harga_upah.formatMoney(2) + '</td><td align="right">' + (harga_upah*volume).formatMoney(2) + '</td><td align="right">' + (parseFloat(res_pekerjaan[i]["DETAIL_PEKERJAAN_TOTAL"])).formatMoney(2) + '</td></tr>';
						} else {
							var volume = parseFloat(res_pekerjaan[i]["DETAIL_PEKERJAAN_VOLUME"]);
							var harga = parseFloat(res_pekerjaan[i]["TOTAL_MATERIAL"]);
							console.log(res_pekerjaan[i]);
							if(parseFloat(res_pekerjaan[i]["TIPE_SUBCON"]) == 3)
								pekerjaan += '<tr class="item_rab_pekerjaan"><td>' + res_pekerjaan[i]["DETAIL_PEKERJAAN_URUTAN"] + '</td><td>' + res_pekerjaan[i]["SUBCON_NAMA"] + '</td><td>' + res_pekerjaan[i]["SUBCON_TIPE_KODE"] + '</td><td>' + volume + '</td><td>' + res_pekerjaan[i]["SATUAN_SUBCON_UPAH_NAMA"] + '</td><td align="right">' + (0).formatMoney(2) + '</td><td align="right">' + (0).formatMoney(2) + '</td><td align="right">' + (parseFloat(res_pekerjaan[i]["TOTAL_MATERIAL"])).formatMoney(2) + '</td><td align="right">' + (harga*volume).formatMoney(2) + '</td><td align="right">' + (parseFloat(res_pekerjaan[i]["DETAIL_PEKERJAAN_TOTAL"])).formatMoney(2) + '</td></tr>';
							else
								pekerjaan += '<tr class="item_rab_pekerjaan"><td>' + res_pekerjaan[i]["DETAIL_PEKERJAAN_URUTAN"] + '</td><td>' + res_pekerjaan[i]["SUBCON_NAMA"] + '</td><td>' + res_pekerjaan[i]["SUBCON_TIPE_KODE"] + '</td><td>' + volume + '</td><td>' + res_pekerjaan[i]["SATUAN_SUBCON_NAMA"] + '</td><td align="right">' + (parseFloat(res_pekerjaan[i]["TOTAL_MATERIAL"])).formatMoney(2) + '</td><td align="right">' + (harga*volume).formatMoney(2) + '</td><td align="right">' + (0).formatMoney(2) + '</td><td align="right">' + (0).formatMoney(2) + '</td><td align="right">' + (parseFloat(res_pekerjaan[i]["DETAIL_PEKERJAAN_TOTAL"])).formatMoney(2) + '</td></tr>';
						}

						jumlah_kategori += parseFloat(res_pekerjaan[i]["DETAIL_PEKERJAAN_TOTAL"]);
					}
					pekerjaan += '<tr class="item_rab_pekerjaan"><td colspan="9" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' + (jumlah_kategori).formatMoney(2) + '</td></tr>';
					jumlah_total += jumlah_kategori;
					pekerjaan += '<tr class="item_rab_pekerjaan"><td colspan="9" style="background-color: #167CAC;"><b style="color: #FFF">JUMLAH TOTAL</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' + (jumlah_total).formatMoney(2) + '</td></tr>';
					pekerjaan += '<tr class="item_rab_pekerjaan"><td colspan="9" style="background-color: #167CAC;"><b style="color: #FFF">OVERHEAD (5 %)</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' + (0.05*jumlah_total).formatMoney(2) + '</td></tr>';
					pekerjaan += '<tr class="item_rab_pekerjaan"><td colspan="9" style="background-color: #167CAC;"><b style="color: #FFF">TOTAL SETELAH OVERHEAD</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' + (1.05*jumlah_total).formatMoney(2) + '</td></tr>';
					$("#template_view_detail_analisa_rab_complex #detail_pekerjaan").html(pekerjaan);

					x.slideDown();
				}
			});
		} else {
			$('#form_ubah_rab').slideUp('normal', function() {
				$('#row_ubah_rab').remove();
			});
			current_id_rab = -1;
		}
	}

	function addRab() {
		$("#rab_add").submit();
	}
	
	function viewDetailAnalisa(id){
		var current_id = id;
		$("#row_ubah").remove();
		$("<div id='row_ubah'><td colspan='7'><div style='margin-top:10px; margin-bottom:10px' id='form_ubah' align='center'><img id='bar_loader' src='<?= base_url().'assets/default/img/bar_loader.gif' ?>'></div></td></div>").appendTo("#form_detail_view_analisa");
		var x = $("#template_view_detail_analisa").clone();
		x.appendTo("#form_ubah");
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>rab/analisa/detailAnalisaRAB",
			data: {id: id}, 
			cache: true,
			success: function(result){
				var res = JSON.parse(result);
				var analisa = res["detail_analisa"];
				$("#form_ubah #analisa_detail_nama").html(analisa["ANALISA_NAMA"]);
				$("#form_ubah #analisa_detail_kode").html(analisa["ANALISA_KODE"]);
				$("#form_ubah #analisa_detail_kategori").html(analisa["KATEGORI_ANALISA_NAMA"]);
				$("#form_ubah #analisa_detail_satuan").html(analisa["SATUAN_NAMA"]);
				$("#form_ubah #analisa_detail_total").html(parseFloat(analisa["ANALISA_TOTAL"]).formatMoney(2));
				$("#form_ubah #analisa_detail_lokasi").html(analisa["LOKASI_UPAH_NAMA"]);
				var res_barang = res["detail_barang"];
				var barang = '';
				var jumlah_barang = 0;
				$(".item_bahan").remove();
				$("#bar_loader").remove();
				for(var i=0; i<res_barang.length; i++){
					barang += '<tr class="item_bahan"><td>'+res_barang[i]["BARANG_NAMA"]+'</td><td>'+res_barang[i]["DETAIL_ANALISA_KOEFISIEN"]+'</td><td>'+res_barang[i]["SATUAN_NAMA"]+'</td><td align="right">'+(parseFloat(res_barang[i]["DETAIL_ANALISA_HARGA"])).formatMoney(2)+'</td><td align="right">'+(parseFloat(res_barang[i]["DETAIL_ANALISA_TOTAL"])).formatMoney(2)+'</td></tr>';
					jumlah_barang += parseFloat(res_barang[i]["DETAIL_ANALISA_TOTAL"]) || 0;
				}
				barang += '<tr class="item_bahan"><td colspan="4"><b>JUMLAH BAHAN</b></td><td align="right">'+(jumlah_barang).formatMoney(2)+'</td></tr>';
				$(barang).insertAfter("#template_view_detail_analisa #header_bahan");
				
				var res_upah = res["detail_upah"];
				var upah = '';
				var jumlah_upah = 0;
				$(".item_upah").remove();
				for(var i=0; i<res_upah.length; i++){
					upah += '<tr class="item_upah"><td>'+res_upah[i]["UPAH_NAMA"]+'</td><td>'+res_upah[i]["DETAIL_ANALISA_KOEFISIEN"]+'</td><td>'+res_upah[i]["SATUAN_UPAH_NAMA"]+'</td><td align="right">'+(parseFloat(res_upah[i]["DETAIL_ANALISA_HARGA"])).formatMoney(2)+'</td><td align="right">'+(parseFloat(res_upah[i]["DETAIL_ANALISA_TOTAL"])).formatMoney(2)+'</td></tr>';
					jumlah_upah += parseFloat(res_upah[i]["DETAIL_ANALISA_TOTAL"]) || 0;
				}
				upah += '<tr class="item_upah"><td colspan="4"><b>JUMLAH PEKERJA</b></td><td align="right">'+(jumlah_upah).formatMoney(2)+'</td></tr>';
				$(upah).insertAfter("#template_view_detail_analisa #header_upah");
				
				$("#form_ubah #jumlah_bahan_pekerja").html(((jumlah_barang+jumlah_upah)).formatMoney(2));
				$("#form_ubah #jumlah_total").html(((jumlah_barang+jumlah_upah)).formatMoney(2));
				$("#form_ubah #dibulatkan").html((Math.floor((jumlah_barang+jumlah_upah)*100)/100).formatMoney(2));
				x.slideDown();
			}
		});
		$('#detailAnalisaModal').modal('show');
	}
</script>

<style>
    table{

    }
    
    #detail_estimasi{
        text-align: justify;
    }
    .centerTable th{
        text-align: center;
        background-color: #0993D3;
        color: #FFFFFF;
        height: 30px;
        font-size: 15px;
    }
    .currency{
        margin-right: 10px;
        display: inline-block;
    }
    .number{
        display: inline-block;  
        text-align: right;
    }
    .header_info{

    }
	.detail_analisa{
		background-color: #EEEEEE;
	}
	th, td {
		white-space: nowrap; 
	}
</style>

<form style="display: none" id="form_edit" action="<?php echo base_url(); ?>rab/rabs/edit" method="POST">
    <input type="hidden" value="" id="id_to_edit" name="id_to_edit" />
</form>

<form style="display: none" id="form_savetovalidate" action="<?php echo base_url(); ?>rab/rabs/savetovalidate" method="POST">
    <input type="hidden" value="" id="rab_id_to_validate" name="rab_id_to_validate" />
	<input type="hidden" id="proj_id_to_validate" name="proj_id_to_validate" value="<?= $detailProject[0]['PROJECT_ID'] ?>" />
</form>

<form style="display: none" id="form_validasi" action="<?php echo base_url(); ?>rab/rabs/validasi" method="POST">
    <input type="hidden" value="" id="id_to_validate" name="id_to_validate" />
	<input type="hidden" value="" id="val_to_validate" name="val_to_validate" />
	<input type="hidden" value="<?= $detailProject[0]['PROJECT_ID'] ?>" id="project_to_validate" name="project_to_validate" />
</form>

<form style="display: none" id="form_validasi_Pro" action="<?php echo base_url(); ?>projects/project/startProject/" method="POST">
    <input type="hidden" value="" id="id_to_start" name="id_to_start" />
</form>

<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Detail Project</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . 'projects/project' ?>" class="bread-current">Project</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Detail</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->
<div id="validateModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Konfirmasi validasi RAB</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal" role="form">
					<div class="form-group">
						<div class="col-lg-9">
							<input type="password" class="form-control" id="validate_password" name="validate_password" placeholder="Password untuk validasi" onkeyup="$('#alertSign').hide();">
						</div>
						<label id="alertSign" class="col-lg-3 control-label" style="color: red; display: none">Sign password salah</label>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="validateSign();">Lanjutkan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
			</div>
		</div>
	</div>
</div>

<div id="startModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Konfirmasi Berjalan / Berhentinya Proyek</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal" role="form">
					<div class="form-group">
						<div class="col-lg-9">
							<input type="password" class="form-control" id="validate_passwordPro" name="validate_passwordPro" placeholder="Password untuk validasi" onkeyup="$('#alertSignPro').hide();">
						</div>
						<label id="alertSignPro" class="col-lg-3 control-label" style="color: red; display: none">Sign password salah</label>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="validateSignPro();">Lanjutkan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
			</div>
		</div>
	</div>
</div>


<div id="template_view_detail_analisa_rab" style="display:none; margin-top: 20px; margin-bottom: 20px">
    <table class="table table-striped table-bordered centerTable">
        <thead>
            <tr class="label-info">
                <th>No</th>
                <th>Uraian Pekerjaan</th>
                <th>Kode</th>
                <th>Volume</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Jumlah Harga</th>
            </tr>
        </thead>
        <tbody id="detail_pekerjaan">

        </tbody>
    </table>
    <div class="clearfix">
        <br />
    </div>
</div>
<div id="template_view_detail_analisa_rab_complex" style="display:none; margin-top: 20px; margin-bottom: 20px">
    <table class="table table-striped table-bordered centerTable">
        <thead>
            <tr class="label-info">
                <th>No</th>
                <th>Uraian Pekerjaan</th>
                <th>Kode</th>
                <th>Volume</th>
                <th>Satuan</th>
                <th>Harga Material</th>
				<th>Jumlah Harga Material</th>
				<th>Harga Upah</th>
				<th>Jumlah Harga Upah</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody id="detail_pekerjaan">

        </tbody>
    </table>
    <div class="clearfix">
        <br />
    </div>
</div>
<div id="template_view_detail_estimasi" style="display:none; margin-top: 20px; margin-bottom: 20px">
   <table class="table table-striped table-bordered centerTable">
        <tbody id="detail_estimasi">

        </tbody>
    </table>
        
    <div class="clearfix">
        <br />
    </div>
</div>

<div id="template_view_detail_analisa_rap" style="display:none; margin-top: 20px; margin-bottom: 20px">
    <table class="table table-striped table-bordered table-hover centerTable">
        <thead>
            <tr class="label-info">
                <th>Nama</th>
                <th>Kode</th>
                <th>Volume</th>
				<th>Satuan</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="detail_rap">

        </tbody>
    </table>
    <div class="clearfix">
        <br />
    </div>
</div>

<div id="template_view_detail_analisa" style="display:none; margin-top: 20px; margin-bottom: 20px">
	<table class="table table-bordered table-hover centerTable">
	  <thead>
		<tr class="label-info">
		  <th colspan="6">Keterangan Analisa</th>
		</tr>
	  </thead>
	  <tbody>
		<tr>
		  <td width="100" class="detail_analisa"><b>Nama</b></td>
		  <td id="analisa_detail_nama"></td>
		  <td width="100" class="detail_analisa"><b>Kode</b></td>
		  <td id="analisa_detail_kode"></td>
		  <td width="100" class="detail_analisa"><b>Satuan</b></td>
		  <td id="analisa_detail_satuan"></td>
		</tr>
		<tr>
		  <td class="detail_analisa"><b>Lokasi</b></td>
		  <td id="analisa_detail_lokasi"></td>
		  <td class="detail_analisa"><b>Kategori</b></td>
		  <td id="analisa_detail_kategori"></td>
		  <td class="detail_analisa"><b>Total</b></td>
		  <td id="analisa_detail_total"></td>
		</tr>
	  </tbody>
	</table>

	<table class="table table-striped table-bordered table-hover centerTable">
	  <thead>
		<tr class="label-info">
		  <th>Uraian</th>
		  <th>Koefisien</th>
		  <th>Satuan</th>
		  <th>Harga Satuan</th>
		  <th>Jumlah</th>
		</tr>
	  </thead>
	  <tbody>
		<tr id="header_bahan">
		  <td colspan="5"><b>BAHAN</b></td>
		</tr>
		<tr id="header_upah">
		  <td colspan="5"><b>UPAH</b></td>
		</tr>
		<tr>
		  <td colspan="4"><b>JUMLAH BAHAN + PEKERJA</b></td>
		  <td align="right" id="jumlah_bahan_pekerja"></td>
		</tr>
		<tr>
		  <td colspan="4"><b>JUMLAH TOTAL</b></td>
		  <td align="right" id="jumlah_total"></td>
		</tr>
		<tr>
		  <td colspan="4"><b>DIBULATKAN</b></td>
		  <td align="right" id="dibulatkan"></td>
		</tr>
	  </tbody>
	</table>
</div>
	
<div id="detailAnalisaModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog page-tables" style="width: 80%">
  <div class="modal-content">
  <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title">Detail Analisa</h4>
  </div>
  <div class="modal-body" id="form_detail_view_analisa" align="center">
  </div>
</div>
</div>
</div>

<div class="matter">
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <!-- edit here -->
                <div class="widget">
                    <div class="widget-head">
                        <div class="pull-left">Detail Project</div>
                        <div class="widget-icons pull-right">
                            <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                            <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                        </div>  
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-content">
                        <div class="padd">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if ($this->session->flashdata('notifStartProject') != null) { ?>
                                        <div class="alert alert-danger">
                                            <?=$this->session->flashdata('notifStartProject')?>
                                            </div>
                                    <?php } ?>
                                    <ul id="myTab" class="nav nav-tabs">
                                        <li class="active"><a href="#dataProject" data-toggle="tab">Data Project</a></li>
                                        <li ng-if="displayField(['rab_estimator','rab_viewer','rab_validator'])"><a href="#rab" data-toggle="tab">RAB</a></li>
                                        <li ng-if="displayField(['rab_estimator','rab_viewer','rab_validator'])"><a href="#rap" data-toggle="tab">RAP</a></li>
                                        <li ng-if="displayField(['rab_estimator','rab_viewer','rab_validator'])"><a href="#estimasi" data-toggle="tab">Estimasi</a></li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div class="tab-pane fade in active" id="dataProject">
                                            <table class="table table-striped table-bordered table-hover centerTable">
                                                <tbody>
                                                    <tr>
                                                        <td width="200"><b>Kode Proyek</b></td>
                                                        <td><?= $detailProject[0]['PROJECT_KODE'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="200"><b>Nama Proyek</b></td>
                                                        <td><?= $detailProject[0]['PROJECT_NAMA'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Deskripsi</b></td>
                                                        <td><?= $detailProject[0]['PROJECT_DESCRIPTION'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Status Proyek</b></td>
                                                        <td><i> -- <?= $detailProject[0]['STATUS_PROJECT_NAMA'] ?></i> -- 
                                                            <div ng-if="displayField(['proyek_admin','top_admin','top_viewer'])"><?php if ($detailProject[0]['STATUS_PROJECT_ID']==2){ ?><a href="#" class="btn btn-danger btn-xs"   onclick="startProject(<?= $detailProject[0]['PROJECT_ID'] ?>);"><i class="fa fa-youtube-play" ></i> Mulai Proyek</a><?php } ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Tanggal dibuat</b></td>
                                                        <td><?= $detailProject[0]['PROJECT_CREATE'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Tanggal dimulai</b></td>
                                                        <td><?= $detailProject[0]['PROJECT_START'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Tanggal berakhir</b></td>
                                                        <td><?= $detailProject[0]['PROJECT_END'] ?></td>
                                                    </tr>
													<tr>
                                                        <td style="background-color: #167CAC" colspan="2"><h5><b style="color: #FFF;">PEMBAGIAN TUGAS</b></h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Creator/PJ</b></td>
                                                        <td><?php
                                                            for ($x = 0; $x < sizeof($enrollProject); $x++) {
                                                                if ($enrollProject[$x]['PENUGASAN_ID'] == 1) {
                                                                    echo $enrollProject[$x]['PENGGUNA_NAMA'] . '<br/>';
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Estimator</b></td>
                                                        <td><?php
															$i = 1;
                                                            for ($x = 0; $x < sizeof($enrollProject); $x++) {
                                                                if ($enrollProject[$x]['PENUGASAN_ID'] == 2) {
                                                                    echo $i.'. '.$enrollProject[$x]['PENGGUNA_NAMA'] . '<br/>';
																	$i++;
                                                                    $estimator = $enrollProject[$x]['PENGGUNA_ID'];
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>PM</b></td>
                                                        <td><?php
															$i = 1;
                                                            for ($x = 0; $x < sizeof($enrollProject); $x++) {
                                                                if ($enrollProject[$x]['PENUGASAN_ID'] == 3) {
                                                                    echo $i.'. '.$enrollProject[$x]['PENGGUNA_NAMA'] . '<br/>';
																	$i++;
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Validator</b></td>
                                                        <td><?php
															$i = 1;
                                                            for ($x = 0; $x < sizeof($enrollProject); $x++) {
                                                                if ($enrollProject[$x]['PENUGASAN_ID'] == 4) {
                                                                    echo $i.'. '.$enrollProject[$x]['PENGGUNA_NAMA'] . '<br/>';
																	$i++;
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            
                                        </div>

                                        <div class="tab-pane fade" id="rab" ng-if="displayField(['rab_estimator','rab_viewer','rab_validator'])">
                                            <div class="padd">
                                                <button type="button" class="btn btn-sm btn-primary" id="buttonAddRab" onclick="addRab();"><i class="fa fa-plus fa-fw"></i> Tambahkan RAB</button>

                                                <form method="POST" action="<?php echo base_url(); ?>rab/rabs/add" id="rab_add">
                                                    <input type="hidden" value="<?= $detailProject[0]['PROJECT_ID'] ?>" name="project_id" id="project_id" />
                                                    <input type="hidden" value="<?= $estimator ?>" name="estimator_id" id="estimator_id" />
                                                </form>

                                                <div class="clearfix">
                                                    <br />
                                                </div>
                                                <div class="page-tables">
                                                    <!-- Table -->
                                                    <div class="table-responsive" style="overflow-x: auto">
                                                        <table id="tabelRAB" class="display" cellspacing="0" width="100%" style="margin-bottom: 10px">
                                                            <thead>
                                                                <tr>
                                                                    <th>Kode</th>
                                                                    <th>Nama</th>
                                                                    <th>Harga</th>
                                                                    <th>Luas</th>
                                                                    <th>Rata-rata harga</th>
                                                                    <th>Lokasi</th>
                                                                    <th>Status</th>
                                                                    <th width="300">Detail</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <div class="clearfix">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="rap" ng-if="displayField(['rab_estimator','rab_viewer','rab_validator'])">
                                            <div class="padd">
                                                <div class="page-tables">
                                                    <!-- Table -->
                                                    <div class="table-responsive" style="overflow-x: auto">
                                                        <table id="tabelRAP" class="display" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Kode</th>
                                                                    <th>Nama</th>
                                                                    <th>Harga</th>
                                                                    <th>Luas</th>
                                                                    <th>Rata-rata harga</th>
                                                                    <th>Lokasi</th>
                                                                    <th>Status</th>
                                                                    <th>Detail RAP</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <div class="clearfix">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="estimasi" ng-if="displayField(['rab_estimator','rab_viewer','rab_validator'])">
                                            <div class="padd">
                                                <div class="page-tables">
                                                    <!-- Table -->
                                                    <div class="table-responsive" style="overflow-x: auto">
                                                        <table id="tabelEstimasi" class="display" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Kode</th>
                                                                    <th>Nama</th>
                                                                    <th>Harga</th>
                                                                    <th>Luas</th>
                                                                    <th>Rata-rata harga</th>
                                                                    <th>Lokasi</th>
                                                                    <th>Status</th>
                                                                    <th>Detail Estimasi</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <div class="clearfix">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/><br/>
            </div>
        </div>
    </div>
</div>
