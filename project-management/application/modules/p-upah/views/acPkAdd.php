<!-- Page heading -->
<script src="<?php echo site_url() ?>assets/default/js/accounting.min.js"></script>
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Permintaan Pekerjaan</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">PK</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Tambah</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Tambah PK Baru</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a href="#" class="wclose">
                    <i class="fa fa-times"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <div class="page-tables" ng-if="displayField(['pk_admin'])">
                <div class="table-responsive">
                    <form id="formPP" action="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/save' ?>" method="post" class="form-horizontal" role="form">

                        <!--
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Kode PK</label>
                            <div class="col-lg-5">
                                <input type="text" id="PERMINTAAN_PEMBELIAN_ID" class="form-control" name="PERMINTAAN_PEMBELIAN_KODE" placeholder="Kode PK">
                            </div>
                        </div>
                        -->
                        <div class="form-group" id="main_project">
                            <label class="col-lg-2 control-label">Main Proyek</label>
                            <div class="col-lg-5">
                                <select name="MAIN_PROJECT_ID" id="MAIN_PROJECT_ID" class="form-control" onchange="getListProject()">
                                    <option disabled selected value="0"> -- pilih main project -- </option>
                                </select>
                            </div>

                        </div>
                        <div id="projects_" class="form-group">
                            <label class="col-lg-2 control-label">Proyek</label>
                            <div class="col-lg-5">
                                <select name="PROJECT_ID" id="PROJECT_ID" class="form-control" onchange="getListRAB()">
                                    <option disabled selected value="0"> -- pilih sub project -- </option>
                                </select>
                            </div>
                        </div>
                        <div id="rab_" class="form-group">
                            <label class="col-lg-2 control-label">RAB</label>
                            <div class="col-lg-5">
                                <select name="RAB_ID" id="RAB_ID" class="form-control">
                                    <option disabled selected value="0"> -- pilih rap -- </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Jenis PK</label>
                            <div class="col-lg-5">

                                <select name="KATEGORI_PP_ID" id="KATEGORI_PP_ID" class="form-control">
                                    <option disabled selected value="0"> -- pilih kategori PK -- </option>
                                    <?php for ($j = 0; $j < sizeof($listKategoriPk); $j++): ?>
                                        <option value="<?= $listKategoriPk[$j]['KATEGORI_PK_ID'] ?>"><?= $listKategoriPk[$j]['KATEGORI_PK_NAMA'] ?></option>
                                    <?php endfor; ?>    
                                </select>
                            </div>
                        </div>
                        <div class="barangBaru"></div>
                        <div class="form-group next" ng-if="displayField(['pk_admin'])">
                            <label class="col-lg-2 control-label"></label>
                            <div class="col-lg-10">
                                <input id="flag_save" type="hidden" name="flag" value="0" />
                                <input id="grandTotalForm" type="hidden" name="GRAND_TOTAL" value="0" />
                                <button type="button" class="btn btn-sm btn-primary nextBtn" onclick="next()" ng-if="displayField(['pk_admin'])"><i class="fa fa-plus fa-fw"></i> Next</button>
                                <button type="button" class="pull-right btn btn-sm btn-primary addBtn" onclick="modalAddRap()" ng-if="displayField(['pk_admin'])"><i class="fa fa-plus fa-fw"></i> Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <div class="clearfix">
                        <br />
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Satuan</th>
                                <th>Volume RAP</th>
                                <th>Volume Sisa</th>
                                <th>Volume PK</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="listBahan">
                        </tbody>
                    </table>
                    <div class="clearfix">
                    </div>
                </div>

                <br/>
                <div class="row" ng-if="displayField(['pk_admin'])">
                    <div class="col-lg-6"> 
                        <button type="button" class="pull-right btn btn-md btn-primary saveForm" onclick="save('0')"><i class="fa fa-save"></i> Simpan Sebagai Draft</button>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="pull-left btn btn-md btn-success saveForm" onclick="save('1')"><i class="fa fa-check"></i> Setujui</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    //getListRAB();
    $(document).ready(function() {
        //$("#rab_").hide();
        //$("#projects_").hide();
        //$("#main_project").hide();
        $(".addBtn").hide();
        $(".saveForm").hide();
        $(".nextBtn").hide();
        $("#main_project").append('<img id="snake_loader" src="<?= base_url() ?>/assets/default/img/snake_loader.gif" width="20">');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/getAllMainProjects'; ?>",
            success: function(data) {
                var val = JSON.parse(data);
                if (val.length > 0) {
                    $('#MAIN_PROJECT_ID').html('<option value="0" disabled selected> -- pilih main project -- </option>');
                    for (var i = 0; i < val.length; i++) {
                        $('#MAIN_PROJECT_ID').append(
                                '<option value="' + val[i].MAIN_PROJECT_ID + '" >' + val[i].MAIN_PROJECT_KODE + ' | ' + val[i].MAIN_PROJECT_NAMA + '</option>'
                                );
                    }
                    //getListProject();
                    $("#snake_loader").remove();
                }
                else {
                    alert("Main Project Tidak Ada");
                }
            }
        });
    });
    function getListProject() {
        var MAIN_PROJECT_ID = $("#MAIN_PROJECT_ID").val();
        $("#projects_").append('<img id="snake_loader" src="<?= base_url() ?>/assets/default/img/snake_loader.gif" width="20">');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/getCurrentProjects'; ?>",
            data: {MAIN_PROJECT_ID: MAIN_PROJECT_ID},
            success: function(data) {
                //alert(data);
                var val = JSON.parse(data);
                if (val.length > 0) {

                    $('#PROJECT_ID').html('<option value="0" disabled selected> -- pilih sub project -- </option>');
                    for (var i = 0; i < val.length; i++) {
                        $('#PROJECT_ID').append(
                                '<option value="' + val[i].PROJECT_ID + '" >' + val[i].PROJECT_KODE + ' | ' + val[i].PROJECT_NAMA + '</option>'
                                );
                    }

                    //getListRAB();
                    $("#snake_loader").remove();
                }
                else {
                    alert("Sub Project Tidak Ada");
                    $("#snake_loader").remove();
                }
            }
        });
    }

    function getListRAB() {
        var PROJECT_ID = $("#PROJECT_ID").val();
        $("#rab_").append('<img id="snake_loader" src="<?= base_url() ?>/assets/default/img/snake_loader.gif" width="20">');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/getCurrentRab'; ?>",
            data: {PROJECT_ID: PROJECT_ID},
            success: function(data) {
//                alert(data);
                var val = JSON.parse(data);
                if (val.length > 0) {
                    //$("#rab_").show();
                    $('#RAB_ID').html('<option value="0" disabled selected> -- pilih rap -- </option>');
                    for (var i = 0; i < val.length; i++) {
//                        $("#"+val[0].RAB_ID).attr("selected","selected");
                        $('#RAB_ID').append(
                                '<option value="' + val[i].RAB_ID + '">' + val[i].RAB_KODE + ' | ' + val[i].RAB_NAMA + '</option>'
                                );
                    }
                    $("#snake_loader").remove();
                    $(".nextBtn").show();
                }
                else {
                    alert("RAP Tidak Ada");
                    $("#snake_loader").remove();
                }
            }
//            ,error: function (xhr, ajaxOptions, thrownError) {
//              alert(xhr.status);
//              alert(thrownError);
//              alert(xhr.responseText);
//            }
        });
    }

    var flag = [];
    var flagSubcon = [];
    //var flagOverhead = [];
    function next() {
        var _id = $("#PERMINTAAN_PEMBELIAN_ID").val();
        $("#modalTitle").html($("#RAB_ID").find('option:selected').text());
        var state = true;
        console.log('state 0: ' + state);
        state &= validate("#main_project");
        console.log('state 1: ' + state);
        state &= validate("#project_");
        console.log('state 2: ' + state);
        state &= validate("#rab_");
        console.log('state 3: ' + state);
        state &= validate("#KATEGORI_PP_ID");
        console.log('state 4: ' + state);
        state &= (_id !== '');
        console.log('state 6: ' + state);
        state = Boolean(state);
        console.log('state 7: ' + state);
        if (state) {
            $("#PERMINTAAN_PEMBELIAN_ID").attr("readonly", "true");
            $("select").attr("readonly", "true");
            $(".nextBtn").hide();
            var PROJECT_ID = $("#PROJECT_ID").val();
            var RAB_ID = $("#RAB_ID").val();
            //alert('RAB_ID' + RAB_ID);
            var KATEGORI_PP_ID = $("#KATEGORI_PP_ID").val();
            if (Number(KATEGORI_PP_ID) === 1) {
                // Overhead
                $("#globalProcessing").show();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/getOverhead/'; ?>" + RAB_ID,
                    cache: true,
                    success: function(json) {
                        console.log(json);
                        var jsonData = JSON.parse(json);
                        //console.log(jsonData[0]);
                        $(".bodyBahan").html("");
                        for (var i = 0; i < jsonData.length; i++) {
                            flag[jsonData[i].OVERHEAD_UPAH_ID] = 0;
                            var percentage = Math.round(100 * 100.0 * (Number(jsonData[i].TOTAL_VOLUME) - Number(jsonData[i].VOLUME_SISA)) / Number(jsonData[i].TOTAL_VOLUME)) / 100.0;
                            var itemTipe = jsonData[i].OVERHEAD_ITEM_TIPE;
                            var elementString = "<tr>" +
                                    "<td>" + jsonData[i].OVERHEAD_UPAH_NAMA + "</td>" +
                                    "<td>" + jsonData[i].OVERHEAD_UPAH_KODE + "</td>" +
                                    "<td>" + jsonData[i].SATUAN_NAMA + "</td>" +
                                    "<td>" + accounting.formatMoney(Number(jsonData[i].HARGA_SATUAN), "Rp. ", 2, ".", ",") + "</td>" +
                                    "<td>" + jsonData[i].TOTAL_VOLUME + "</td>" +
                                    "<td>" + (Number(jsonData[i].TOTAL_VOLUME) - Number(jsonData[i].VOLUME_SISA)) + "</td>";

                            if (Number(jsonData[i].VOLUME_SISA) <= 0)
                            {
                                elementString += "<td><button class='btn btn-xs btn-default' disabled><i class='fa fa-plus fa-fw'></i> Pilih</button></td>";
                            } else {
                                elementString += "<td><button class='btn btn-xs btn-success' onclick='addRap(\"" +
                                        jsonData[i].OVERHEAD_UPAH_ID + "\",\"" +
                                        jsonData[i].OVERHEAD_UPAH_KODE + "\",\"" +
                                        jsonData[i].OVERHEAD_UPAH_NAMA + "\",\"" +
                                        jsonData[i].HARGA_SATUAN + "\",\"" +
                                        jsonData[i].SATUAN_NAMA + "\",\"" +
                                        jsonData[i].TOTAL_VOLUME + "\", \"" +
                                        (Number(jsonData[i].TOTAL_VOLUME) - Number(jsonData[i].VOLUME_SISA)) + "\", \"" +  Number(Number(itemTipe) + 1) + "\")'><i class='fa fa-plus fa-fw'></i> Pilih</button></td>";
                            }
                            elementString += "</tr>";

                            $(".bodyBahan").append(elementString);
                        }
                        $('#globalProcessing').hide();
                    },
                    error: function(err) {
                        console.log(err);
                        $('#globalProcessing').hide();
                    }
                });
                $('#subconDiv').hide();


            } else {
                // Bahan
                var table = $("#tabelMaterial").dataTable(
                        {
                            "processing": true,
                            "serverSide": true,
                            "ajax": {
                                "url": "<?php echo base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/getCurrentRAPJson/'; ?>" + RAB_ID,
                                "dataSrc": function(json) {
                                    jsonData = json.data;
                                    return jsonData;
                                }
                            },
                            "createdRow": function(row, data, index) {
                                var id = data[7];
                                flag[id] = 0;
                                //alert(data[6]);
                                var percentage = Math.round(100 * 100.0 * Number(data[5]) / Number(data[4])) / 100.0;
                                $('td', row).eq(3).html(accounting.formatMoney(Number(data[3]), "Rp. ", 2, ".", ","));
                                $('td', row).eq(5).html(data[5]);

                                if (Number(data[4]) - Number(data[5]) <= 0) {
                                    $('td', row).eq(6).html("<button class='btn btn-xs btn-default' disabled><i class='fa fa-plus fa-fw'></i> Pilih</button>");
                                } else {
                                    $('td', row).eq(6).html("<button class='btn btn-xs btn-success' onclick='addRap(\"" + id + "\",\"" + data[1] + "\",\"" + data[0] + "\",\"" + data[3] + "\",\"" + data[2] + "\",\"" + data[4] + "\", \"" + Number(data[5]) + "\", 1)'><i class='fa fa-plus fa-fw'></i> Pilih</button>");
                                }
                            }
                        });

                var tableSubcon = $("#tabelSubcon").dataTable(
                        {
                            "processing": true,
                            "serverSide": true,
                            "ajax": {
                                "url": "<?php echo base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/getSubcon/'; ?>" + RAB_ID,
                                "dataSrc": function(json) {
                                    jsonData = json.data;
                                    return jsonData;
                                }
                            },
                            "createdRow": function(row, data, index) {
                                var id = data[6];
                                var sisa = Number(data[4]);
                                flagSubcon[id] = 0;
                                $('td', row).eq(3).html(accounting.formatMoney(Number(data[5]), "Rp. ", 2, ".", ","));
                                $('td', row).eq(5).html(sisa);
                                if (sisa > 0) {
                                    $('td', row).eq(6).html("<button class='btn btn-xs btn-success' onclick='addRapSubcon(\"" + id + "\",\"" + data[0] + "\",\"" + data[5] + "\",\"" + data[2] + "\",\"" + data[3] + "\", \"" + data[4] + "\", \"" + data[1] + "\")'><i class='fa fa-plus fa-fw'></i> Pilih</button>");
                                }
                                else {
                                    $('td', row).eq(6).html("<button class='btn btn-xs btn-default' disabled><i class='fa fa-plus fa-fw'></i> Pilih</button>");
                                }

                            }
                        });


            }
            $(".addBtn").show();
            //$(".saveForm").show();
        }
        else {
            alert('Data isian PK blm lengkap!');
        }
    }

    function modalAddRap() {
        $('#modalPilihan').modal('show');
    }

    function onChange(id)
    {
        $("#validateCheckBox").removeProp("checked");
        //alert('onchange : ' + value);
        var value = $("#BARANG_VOLUME_" + id).val();
        var allowed = $("#BARANG_SISA_" + id).text();
        var total = $("#BARANG_SISA_ORIGINAL_" + id).val();
        var volumeRap = $("#BARANG_VOLUME_RAP_" + id).html();
        var percentage = Math.round(100 * 100.0 * Number(total - value) / Number(volumeRap)) / 100.0;
        //alert('Total: ' + total);
        if (!isNaN(value)) {
            var num = Number(value);
            //alert('onchange : ' + num);
            if (num > 0) {
                if (num > Number(total)) {
                    percentage = Math.round(100 * 100.0 * Number(volumeRap - total) / Number(volumeRap)) / 100.0;
                    alert("Sisa analisa upah tidak mencukupi!");
                    $("#BARANG_SISA_" + id).html(total - 1);
                    $("#BARANG_VOLUME_" + id).val(1);
                    $("#BARANG_PROGRESS_" + id).html(accounting.formatMoney(Number(percentage), "%", 2, ",", ".", "%v %s"));
                    return;
                }
                var cost = Number(accounting.unformat($("#BARANG_HARGA_" + id).text(), ","));
                var sub = cost * num;
                var result = Number(total) - num;
                percentage = Math.round(100 * 100.0 * (Number(volumeRap) - Number(result)) / Number(volumeRap)) / 100.0;
                $("#BARANG_PROGRESS_" + id).html(accounting.formatMoney(Number(percentage), "%", 2, ",", ".", "%v %s"));
                console.log("volumeRap: " + volumeRap);
                console.log("sisa: " + result);
                console.log("percentage: " + percentage);

                //alert('Result : ' + result);
                //$("." + id + "_sub").html(accounting.formatMoney(Number(sub), "Rp. ", 2, ".", ","));
                $("#" + id + "_inpVolume").val(num);
                $("#BARANG_SISA_" + id).html(result);
                $("." + id + "_jml").val(num);
                //$("#grandTotal").text(accounting.formatMoney(calculateGrandTotal(), "Rp. ", 2, ".", ","));
                $(".saveForm").show();
                //$("#grandTotalForm").val(calculateGrandTotal());
            }
            else {
                alert("Volume harus lebih dari nol");
                $("#BARANG_SISA_" + id).html(0);
                $("#BARANG_VOLUME_" + id).val(total);
                $("#BARANG_PROGRESS_" + id).html(accounting.formatMoney(Number(100), "%", 2, ",", ".", "%v %s"));
                //$(".saveForm").hide();
            }
        }
        else
            $(".saveForm").hide();

        if (validateVolumes())
            $(".saveForm").show();
        else
            $(".saveForm").hide();
    }

    function validateVolumes()
    {
        var volumeList = document.getElementsByClassName("volumeForms");
        console.log(volumeList);
        console.log("volumeForms element: " + volumeList.length);
        var state = false;
        if(volumeList.length > 0)
            state = true;
        for (i = 0; i < volumeList.length; i++) {
            var res = isPositiveNumber(volumeList[i].id);
            console.log("res : " + res);
            state = (state && res);
            console.log("state : " + state);
        }
        console.log("state : " + state)
        return state;
    }

    function calculateGrandTotal() {
        var subselement = document.getElementsByClassName("subtotal_data");
        grandTotal = 0;
        for (i = 0; i < subselement.length; i++) {
            grandTotal += Number(accounting.unformat(subselement[i].innerHTML, ","));
        }
        $("#grandTotalForm").val(grandTotal);
        return grandTotal;
    }
    var grandTotal = 0;

    function addRap(BARANG_ID, BARANG_KODE, BARANG_NAMA, BARANG_HARGA, SATUAN_NAMA, BARANG_VOLUME, BARANG_VOLUME_TERPAKAI, TIPE) {
        //var prop = 'Barang VOLUME: ' + BARANG_VOLUME + ' Barang VOLUME_SISA' + BARANG_VOLUME_TERPAKAI;
        if (!BARANG_VOLUME_TERPAKAI || BARANG_VOLUME_TERPAKAI === null || BARANG_VOLUME_TERPAKAI === 'null') {
            //alert("null");
            BARANG_VOLUME_TERPAKAI = 0;
        }
        var volumeSisa = (Number(BARANG_VOLUME) - Number(BARANG_VOLUME_TERPAKAI));
        var percentage = Math.round(100 * 100.0 * Number(volumeSisa) / Number(BARANG_VOLUME)) / 100.0;
        if (volumeSisa <= 0) {
            alert("Volume analisa tidak tersedia");
            return;
        }
        var type = Number(TIPE);
        if(type === 1)
            TIPE = 1;
        else if(type === 2)
            TIPE = 3;
        else if(type === 3)
            TIPE = 4;
        else
            TIPE = type;
        
        if (flag[BARANG_ID] === 0) {
            $(".barangBaru").append(
                    '<input type="hidden" id="' + BARANG_ID + '_inpBarang" name=BARANG_ID[] value="' + BARANG_ID + '" />' +
                    '<input type="hidden" id="' + BARANG_ID + '_inpVolume" name=VOLUME[] value="0" class="volumeSelector"/>' + 
                    '<input type="hidden" id="' + BARANG_ID + '_inpTipe" name=TYPE[] value="' + TIPE +'" />'
                    );

            $(".listBahan").append(
                    "<tr class='" + BARANG_ID + "'>" +
                    "<td>" + BARANG_KODE + "</td>" +
                    "<td>" + BARANG_NAMA + "</td>" +
                    "<td>" + SATUAN_NAMA + "</td>" +
                    "<td id='BARANG_VOLUME_RAP_" + BARANG_ID + "'>" + BARANG_VOLUME + "</td>" +
                    "<td id='BARANG_SISA_" + BARANG_ID + "'>" + volumeSisa + "</td>" +
                    "<td><input class='form-control " + BARANG_ID + "_jml volumeForms' type='text' name='BARANG_VOLUME' value='" + volumeSisa + "' id='BARANG_VOLUME_" + BARANG_ID + "' onchange='onChange(" + BARANG_ID + ")' /><input type='hidden' id='BARANG_SISA_ORIGINAL_" + BARANG_ID + "' value='" + volumeSisa + "'/></td>" +
                    "<td>" +
                    "<button class='btn btn-xs btn-danger' onclick='dialogHapus(\"" + BARANG_ID + "\",\"" + BARANG_NAMA + "\",\"" + SATUAN_NAMA + "\", \"false\")'><i class='fa fa-minus fa-fw'></i> Hapus</button>" +
                    "</td>" +
                    "</tr>"
                    );
            //grandTotal += (volumeSisa * BARANG_HARGA);
            //grandTotal = calculateGrandTotal();
            //$("#subtotalRow").remove();
            //$(".listBahan").append(
            //        "<tr id='subtotalRow'><td></td><td></td><td></td><td></td><td></td><td></td><td>Grand Total</td><td id='grandTotal'>" + accounting.formatMoney(grandTotal, "Rp. ", 2, ".", ",") + "</td><td>&nbsp;</td></tr>"
            //        );
            $("#" + BARANG_ID + "_inpVolume").val(volumeSisa);
            $("#BARANG_SISA_" + BARANG_ID).html(0);
            $("." + BARANG_ID + "_jml").val(volumeSisa);
            flag[BARANG_ID] = 1;
            console.log("flag : " + flag);
            $(".saveForm").show();
            //console.log("Volume: " + $('.volumeSelector').val());
        }
        


    }
    
    function addRapSubcon(BARANG_ID, BARANG_NAMA, BARANG_HARGA, SATUAN_NAMA, BARANG_VOLUME, BARANG_VOLUME_SISA, BARANG_KODE) {

        if (!BARANG_VOLUME_SISA || BARANG_VOLUME_SISA === null || BARANG_VOLUME_SISA === 'null') {
            //alert("null");
            BARANG_VOLUME_SISA = 0;
        }
        if (BARANG_VOLUME_SISA <= 0) {
            alert("Volume material tidak tersedia");
            return;
        }
        if (flagSubcon[BARANG_ID] === 0) {
            $(".barangBaru").append(
                    '<input type="hidden" id="' + BARANG_ID + '_inpBarang" name=SUBCON_ID[] value="' + BARANG_ID + '" />' +
                    '<input type="hidden" id="' + BARANG_ID + '_inpTipe" name=SUBCON_TYPE[] value="2" />' +
                    '<input type="hidden" id="' + BARANG_ID + '_inpVolume" name=SUBCON_VOLUME[] value="0" class="volumeSelector"/>'
                    );
            var volumeSisa = BARANG_VOLUME_SISA;
            $(".listBahan").append(
                    "<tr class='" + BARANG_ID + "'>" +
                    "<td>" + BARANG_KODE + "</td>" +
                    "<td>" + BARANG_NAMA + "</td>" +
                    "<td>" + SATUAN_NAMA + "</td>" +
                    "<td id='BARANG_VOLUME_RAP_'>" + BARANG_VOLUME + "</td>" +
                    "<td id='BARANG_SISA_" + BARANG_ID + "'>" + volumeSisa + "</td>" +
                    "<td><input class='form-control " + BARANG_ID + "_jml volumeForms' type='text' name='BARANG_VOLUME' value='" + volumeSisa + "' id='BARANG_VOLUME_" + BARANG_ID + "' onchange='onChange(" + BARANG_ID + ")' /><input type='hidden' id='BARANG_SISA_ORIGINAL_" + BARANG_ID + "' value='" + volumeSisa + "'/></td>" +
                    "<td>" +
                    "<button class='btn btn-xs btn-danger' onclick='dialogHapus(\"" + BARANG_ID + "\",\"" + BARANG_NAMA + "\",\"" + SATUAN_NAMA + "\", \"true\")'><i class='fa fa-minus fa-fw'></i> Hapus</button>" +
                    "</td>" +
                    "</tr>"
                    );
            //grandTotal += (volumeSisa * BARANG_HARGA);
            //grandTotal = calculateGrandTotal();
            //$("#subtotalRow").remove();
            //$(".listBahan").append(
            //        "<tr id='subtotalRow'><td></td><td></td><td></td><td></td><td></td><td></td><td>Grand Total</td><td id='grandTotal'>" + accounting.formatMoney(grandTotal, "Rp. ", 2, ".", ",") + "</td><td>&nbsp;</td></tr>"
            //        );
            $("#" + BARANG_ID + "_inpVolume").val(volumeSisa);
            $("#BARANG_SISA_" + BARANG_ID).html(0);
            $("." + BARANG_ID + "_jml").val(volumeSisa);
            flagSubcon[BARANG_ID] = 1;
            //console.log("Volume: " + $('.volumeSelector').val());
            $(".saveForm").show();
        }
        
    }

    function editBarang(BARANG_ID, BARANG_NAMA, SATUAN_NAMA, BARANG_HARGA, BARANG_VOLUME) {
        var VOLUME = $("." + BARANG_ID + "_jml").val();
        $('#VOLUME').attr('min', 0);
        $('#VOLUME').attr('max', BARANG_VOLUME);
        $('#BARANG_ID').val(BARANG_ID);
        $('#BARANG_NAMA').val(BARANG_NAMA);
        $('#VOLUME').val(Number(VOLUME));
        $('#SATUAN_NAMA').val(SATUAN_NAMA);
        $('#BARANG_HARGA').val(BARANG_HARGA);
        var SUBTOTAL = $("." + BARANG_ID + "_sub").text();
        $('#SUBTOTAL').val(SUBTOTAL);
        $('#modalEdit').modal('show');
    }

    function saveBarang(BARANG_ID, VOLUME, SUBTOTAL) {
        var vol = parseInt(VOLUME);
        var sub = parseInt(SUBTOTAL);
        $("." + BARANG_ID + "_jml").val(vol);
        $("." + BARANG_ID + "_sub").html(sub);
        $("#" + BARANG_ID + "_inpVolume").val(vol);
    }

    function calculate(BARANG_HARGA, VOLUME) {
        var max = $('#VOLUME').attr('max');
        var vol = parseInt(VOLUME);
        var harga = parseInt(BARANG_HARGA);
        if (max < vol) {
            $('#VOLUME').val(0);
            $('#SUBTOTAL').val(0);
        }
        else if (max >= VOLUME) {
            $('#SUBTOTAL').val(harga * vol);
        }
    }

    function validate(id) {
        var $id = $(id + " option:selected").id;
        var value = $(id + " option:selected").val();
        console.log('select value ' + $id + ' : ' + value);
        if (Number(value) === 0) {
            return false;
        }
        return true;
    }

    function isPositiveNumber(id) {
        var value = $("#" + id).val();
        console.log(id + ": " + value);
        if (isNaN(value))
            return false;

        if (Number(value) > 0)
            return true;

        return false;

    }

    function save(param) {
        //alert(flag);
        var volumeList = document.getElementsByClassName("volumeSelector");
        console.log(volumeList);
        console.log("VolumeSelector element: " + volumeList.length);
        var state = false;
        if(volumeList.length > 0)
            state = true;
        for (i = 0; i < volumeList.length; i++) {
            var res = isPositiveNumber(volumeList[i].id);
            console.log("res : " + res);
            state = (state && res);
            console.log("state : " + state);
        }
        console.log("state : " + state)

        if (state && validateVolumes()) {
            $('#flag_save').val(param);
            $('#formPP').submit();
        } else {
            alert("Isian data PP tidak valid!");
        }
    }

    function dialogHapus(BARANG_ID, BARANG_NAMA, SATUAN_NAMA, SUBCON) {
        $(".namaBarangHapus").text("Anda yakin untuk menghapus " + BARANG_NAMA + " " + SATUAN_NAMA + " ini?")
        $('#tobe_deleted_id').val(BARANG_ID);
        $('#subconItem').val(SUBCON);
        if (SUBCON === 'true')
            $('#materialType').html('Subcon');
        else
            $('#materialType').html('Barang');

        $("#deleteModal").modal();
    }

    function deleteBarang(BARANG_ID, SUBCON) {
        $("#" + BARANG_ID + "_inpBarang").remove();
        $("#" + BARANG_ID + "_inpVolume").remove();
        $("#" + BARANG_ID + "_inpTipe").remove();
        $(".listBahan ." + BARANG_ID).remove();

        if (SUBCON !== 'true') {
            flag[BARANG_ID] = 0;
            console.log("barang " + BARANG_ID + " deleted!")
        }
        else {
            flagSubcon[BARANG_ID] = 0;
            console.log("subcon " + BARANG_ID + " deleted!")
        }
        if (validateVolumes())
            $(".saveForm").show();
        else
            $(".saveForm").hide();
        $("#deleteModal").modal("hide");
        $("#grandTotal").text(accounting.formatMoney(calculateGrandTotal(), "Rp. ", 2, ".", ","));
    }

</script>

<div id="modalPilihan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog page-tables" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><b>Daftar Analisa RAP <span id="modalTitle"></span></b></h4>
            </div>
            <div class="modal-body">
                <div class="widget-content">
                    <ul id="myTab" class="nav nav-tabs">
                        <li class="active"><a href="#material" data-toggle="tab">List Analisa</a></li>
                        <li><a href="#subcon" data-toggle="tab">List LS Upah</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="material">
                            <div class="clearfix">
                                <br/>
                            </div>
                            <div id="globalProcessing" class="dataTables_processing" style="display: none;z-index: 2000"></div>
                            <div class="table-responsive">
                                <table cellpadding="5" cellspacing="0" border="0" id="tabelMaterial" width="100%" style="white-space: nowrap" class="display">
                                    <thead id="head-bahan">
                                        <tr>
                                            <th>Nama Analisa</th>
                                            <th>Kode</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Volume RAP</th>
                                            <th>Volume Terpakai</th>
                                            <th>Pilih</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bodyBahan">
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade in active" id="subcon">
                            <div class="clearfix">
                                <br/>
                            </div>
                            <div class="table-responsive">
                                <table cellpadding="5" cellspacing="0" border="0" id="tabelSubcon" width="100%" style="white-space: nowrap" class="display">
                                    <thead id="head-subcon">
                                        <tr>
                                            <th>Nama LS Upah</th>
                                            <th>Kode</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Volume</th>
                                            <th>Volume Sisa</th>
                                            <th>Pilih</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bodySubcon">
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>

<div id="modalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog page-tables">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><b>Detail Barang</b></h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nama Barang</label>
                        <div class="col-lg-5">
                            <input type="hidden" id="BARANG_ID" class="form-control" name="BARANG_ID">
                            <input type="text" id="BARANG_NAMA" class="form-control" name="BARANG_NAMA" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Satuan</label>
                        <div class="col-lg-5">
                            <input type="text" id="SATUAN_NAMA" class="form-control" name="SATUAN_NAMA" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Harga</label>
                        <div class="col-lg-5">
                            <input type="text" id="BARANG_HARGA" class="form-control" name="BARANG_HARGA" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Volume</label>
                        <div class="col-lg-5">
                            <input type="text" id="VOLUME" class="form-control" name="VOLUME" placeholder="Volume" onkeyup="calculate($('#BARANG_HARGA').val(), $('#VOLUME').val())">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Sub Total</label>
                        <div class="col-lg-5">
                            <input type="text" id="SUBTOTAL" class="form-control" name="SUBTOTAL" placeholder="Sub Total" readonly="true">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="saveBarang($('#BARANG_ID').val(), $('#VOLUME').val(), $('#SUBTOTAL').val())">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Konfirmasi penghapusan <span id="materialType"></span></h4>
            </div>
            <div class="modal-body">
                <h3 class="namaBarangHapus">Anda yakin untuk menghapus item ini?</h3>
                <input type="hidden" value="" name="tobe_deleted_id" id="tobe_deleted_id" />
                <input type="hidden" value="" id="subconItem" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="deleteBarang($('#tobe_deleted_id').val(), $('#subconItem').val());">Ya</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
            </div>
        </div>
    </div>
</div>