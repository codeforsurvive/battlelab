<!-- Page heading -->
<script src="<?php echo site_url() ?>assets/default/js/accounting.min.js"></script>
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Permintaan Pembelian</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">PP</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Ubah</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Ubah PP</div>
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
            <div class="page-tables" ng-if="displayField(['pp_admin'])">
                <div class="table-responsive">
                    <form id="formPP" action="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/updatePp' ?>" method="post" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Proyek</label>
                            <div class="col-lg-5">
                                <input type="hidden" name="PP_ID" id="PP_ID" value="" />
                                <input type="text" name="PP_KODE" id="PP_KODE" class="form-control" readonly value="" />
                            </div>
                        </div>
                        <div id="projects_" class="form-group">
                            <label class="col-lg-2 control-label">Proyek</label>
                            <div class="col-lg-5">
                                <input type="hidden" name="PROJECT_ID" id="PROJECT_ID" value="" />
                                <input type="text" name="PROJECT_NAME" id="PROJECT_NAME" class="form-control" readonly value="" />
                            </div>
                        </div>
                        <div id="rab_" class="form-group">
                            <label class="col-lg-2 control-label">RAB</label>
                            <div class="col-lg-5">
                                <input type="hidden" name="RAB_ID" id="RAB_ID" value="" />
                                <input type="text" name="RAB_NAME" id="RAB_NAME" class="form-control" readonly value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Jenis PP</label>
                            <div class="col-lg-5">
                                <input type="hidden" name="KATEGORI_PP_ID" id="KATEGORI_PP_ID" value="" />
                                <input type="text" name="KATEGORI_PP_NAMA" id="KATEGORI_PP_NAMA" class="form-control" readonly value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Gudang</label>
                            <div class="col-lg-5">
                                <input type="hidden" name="GUDANG_ID" id="GUDANG_ID" value="" />
                                <input type="text" name="GUDANG_NAMA" id="GUDANG_NAMA" class="form-control" readonly value="" />
                            </div>
                        </div>
                        <div class="barangBaru"></div>
                        <div class="form-group next">
                            <label class="col-lg-2 control-label"></label>
                            <div class="col-lg-10" ng-if="displayField(['pp_admin'])">
                                <input id="flag_save" type="hidden" name="flag" value="0" />
                                
                                <button type="button" class="pull-right btn btn-sm btn-primary addBtn" onclick="modalAddRap()"><i class="fa fa-plus fa-fw" ng-if="displayField(['pp_admin'])"></i> Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="snakeLoader1"></div>
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
                                <th>Volume PP</th>
                                <!--
                                <th>Harga</th>
                                <th>Subtotal</th> -->
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
                <div class="row" ng-if="displayField(['pp_admin'])">
                    <div class="col-lg-6"> 
                        <button type="button" class="pull-right btn btn-sm btn-primary saveForm" onclick="save()"> Simpan</button>
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
        $("#snakeLoader1").append('<img id="snake_loader" src="<?= base_url() ?>/assets/default/img/snake_loader.gif" width="20">');
        var loadedData = (<?= $editData ?>);
        if (loadedData.length > 0) {
            var parentData = loadedData[0];
            $('#PP_ID').val(parentData.PERMINTAAN_PEMBELIAN_ID);
            $('#PP_KODE').val(parentData.PERMINTAAN_PEMBELIAN_KODE);
            $('#RAB_ID').val(parentData.RAB_ID);
            $('#RAB_NAME').val(parentData.RAB_KODE + " | " + parentData.RAB_NAMA);
            $('#PROJECT_ID').val(parentData.PROJECT_ID);
            $('#PROJECT_NAME').val(parentData.PROJECT_KODE + " | " + parentData.PROJECT_NAMA);
            $('#KATEGORI_PP_ID').val(parentData.KATEGORI_PP_ID);
            $('#KATEGORI_PP_NAMA').val(parentData.KATEGORI_PP_NAMA);
            $('#GUDANG_ID').val(parentData.GUDANG_ID);
            $('#GUDANG_NAMA').val(parentData.GUDANG_NAMA);
            $('#flag_save').val(parentData.STATUS_PP_ID);
        }
        
        next().done(loadData);

    });

    var flag = [];
    var flagSubcon = [];

    function loadData() {
        var loadedData = (<?= $editData ?>);
        console.log('start load data');
        //console.log(loadedData);
        if (loadedData.length > 0) {
            var parentData = loadedData[0];
            $('#PP_ID').val(parentData.PERMINTAAN_PEMBELIAN_ID);
            $('#PP_KODE').val(parentData.PERMINTAAN_PEMBELIAN_KODE);
            $('#RAB_ID').val(parentData.RAB_ID);
            $("#modalTitle").html(parentData.RAB_KODE);
            $('#RAB_NAME').val(parentData.RAB_KODE + " | " + parentData.RAB_NAMA);
            $('#PROJECT_ID').val(parentData.PROJECT_ID);
            $('#PROJECT_NAME').val(parentData.PROJECT_KODE + " | " + parentData.PROJECT_NAMA);
            $('#KATEGORI_PP_ID').val(parentData.KATEGORI_PP_ID);
            $('#KATEGORI_PP_NAMA').val(parentData.KATEGORI_PP_NAMA);
            $('#GUDANG_ID').val(parentData.GUDANG_ID);
            $('#GUDANG_NAMA').val(parentData.GUDANG_NAMA);

            var volumes = (<?= $volumes ?>);
            //console.log(loadedData);
            //console.log(volumes);
            for (var i = 0; i < loadedData.length; i++) {
                if (!isNaN(loadedData[i].BARANG_ID)) {
                    flag[loadedData[i].BARANG_ID] = 0;
                    loadRap(
                            loadedData[i].BARANG_ID,
                            loadedData[i].BARANG_KODE,
                            loadedData[i].BARANG_NAMA,
                            loadedData[i].BARANG_HARGA,
                            loadedData[i].SATUAN_NAMA,
                            volumes[i].TOTAL,
                            volumes[i].USED,
                            loadedData[i].VOLUME_PP,
                            loadedData[i].RAB_ID,
                            loadedData[i].PERMINTAAN_PEMBELIAN_ID
                            );

                    //alert('loadRap!' + loadedData[i].BARANG_ID);

                } else {
                    flagSubcon[loadedData[i].SUBCON_ID] = 0;
                    loadRapSubcon(
                            loadedData[i].SUBCON_ID,
                            loadedData[i].BARANG_KODE,
                            loadedData[i].BARANG_NAMA,
                            loadedData[i].BARANG_HARGA,
                            loadedData[i].SATUAN_NAMA,
                            volumes[i].TOTAL,
                            volumes[i].AVAILABLE,
                            loadedData[i].VOLUME_PP,
                            loadedData[i].RAB_ID,
                            loadedData[i].PERMINTAAN_PEMBELIAN_ID);

                }
            }
        }

        console.log('finished load data!');
        $("#snake_loader").remove();

    }


    //var flagOverhead = [];
    function next() {
        var r1 = $.Deferred();
        var r2 = $.Deferred();
        var _id = $("#PERMINTAAN_PEMBELIAN_ID").val();
        //$("#modalTitle").html($("#RAB_NAME").val());
        
        var state = true;

        if (state) {
            $("#PERMINTAAN_PEMBELIAN_ID").attr("readonly", "true");
            $("select").attr("readonly", "true");
            $(".nextBtn").hide();

            var RAB_ID = $("#RAB_ID").val();
            //alert('RAB_ID' + RAB_ID);
            var KATEGORI_PP_ID = $("#KATEGORI_PP_ID").val();
            if (Number(KATEGORI_PP_ID) === 1) {
                // Overhead
                $("#tipeMaterial").html("Overhead");

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
                            flag[jsonData[i].OVERHEAD_MATERIAL_ID] = 0;
                            var elementString = "<tr>" +
                                    "<td>" + jsonData[i].OVERHEAD_MATERIAL_NAMA + "</td>" +
                                    "<td>" + jsonData[i].KATEGORI_OVERHEAD + "</td>" +
                                    "<td>" + jsonData[i].OVERHEAD_MATERIAL_KODE + "</td>" +
                                    "<td>" + jsonData[i].SATUAN_NAMA + "</td>" +
                                    "<td>" + jsonData[i].HARGA_SATUAN + "</td>" +
                                    "<td>" + jsonData[i].VOLUME_SISA + "</td>" +
                                    "<td>" + jsonData[i].TOTAL_VOLUME + "</td>";
                            if (Number(jsonData[i].VOLUME_SISA) <= 0)
                            {
                                elementString += "<td><button class='btn btn-xs btn-default' disabled id='materialSelector_" + jsonData[i].OVERHEAD_MATERIAL_ID + "'><i class='fa fa-plus fa-fw'></i> Pilih</button></td>";
                            } else {
                                elementString += "<td><button class='btn btn-xs btn-success' id='materialSelector_" + jsonData[i].OVERHEAD_MATERIAL_ID + "' onclick='addRap(\"" +
                                        jsonData[i].OVERHEAD_MATERIAL_ID + "\",\"" +
                                        jsonData[i].OVERHEAD_MATERIAL_KODE + "\",\"" +
                                        jsonData[i].OVERHEAD_MATERIAL_NAMA + "\",\"" +
                                        jsonData[i].HARGA_SATUAN + "\",\"" +
                                        jsonData[i].SATUAN_NAMA + "\",\"" +
                                        jsonData[i].TOTAL_VOLUME + "\", \"" +
                                        (Number(jsonData[i].TOTAL_VOLUME) - Number(jsonData[i].VOLUME_SISA)) + "\")'><i class='fa fa-plus fa-fw'></i> Pilih</button></td>";
                            }
                            elementString += "</tr>";

                            $(".bodyBahan").append(elementString);
                        }
                        r1.resolve();
                    }
                });
                $('#subconDiv').hide();


            } else {
                // Bahan
                $("#tipeMaterial").html("Material");
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
                                var sisa = Number(data[6]) - Number(data[5]);
                                flag[id] = 0;
                                //alert(id);
                                $('td', row).eq(4).html(accounting.formatMoney(Number(data[4]), "Rp. ", 2, ".", ","));
                                $('td', row).eq(5).html(sisa);
                                if (Number(sisa <= 0)) {
                                    $('td', row).eq(7).html("<button class='btn btn-xs btn-default' id='materialSelector_" + id + "' disabled><i class='fa fa-plus fa-fw'></i> Pilih</button>");
                                } else {
                                    $('td', row).eq(7).html("<button class='btn btn-xs btn-success' id='materialSelector_" + id + "' onclick='addRap(\"" + id + "\",\"" + data[2] + "\",\"" + data[0] + "\",\"" + data[4] + "\",\"" + data[3] + "\",\"" + data[6] + "\", \"" + data[5] + "\")'><i class='fa fa-plus fa-fw'></i> Pilih</button>");
                                }
                            },
                            "initComplete": function() {
                                console.log('finished load material!');
                                r1.resolve();
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
                                $('td', row).eq(5).html(accounting.formatMoney(Number(data[5]), "Rp. ", 2, ".", ","));
                                $('td', row).eq(4).html(sisa);
                                if (sisa > 0) {
                                    $('td', row).eq(6).html("<button class='btn btn-xs btn-success' id='subconSelector_" + id + "' onclick='addRapSubcon(\"" + id + "\",\"" + data[0] + "\",\"" + data[5] + "\",\"" + data[2] + "\",\"" + data[3] + "\", \"" + data[4] + "\")'><i class='fa fa-plus fa-fw'></i> Pilih</button>");
                                } else {
                                    $('td', row).eq(6).html("<button class='btn btn-xs btn-default' id='subconSelector_" + id + "' disabled><i class='fa fa-plus fa-fw'></i> Pilih</button>");
                                }
                            },
                            "initComplete": function() {
                                console.log('finished load subcon!');
                                r2.resolve();
                            }
                        });
                $('#subconDiv').show();
            }
            $(".addBtn").show();
            $(".saveForm").show();
            //loadData();
        }
        else {
            //alert('Data isian PP blm lengkap!');
        }
        return $.Deferred(function(def) {
            $.when(r1, r2).done(function() {
                def.resolve();
            });
        });
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

        //alert('Total: ' + total);
        if (!isNaN(value)) {
            var num = Number(value);
            //alert('onchange : ' + num);
            if (num > 0) {
                if (num > Number(total)) {
                    alert("Sisa material tidak mencukupi!");
                    $("#BARANG_VOLUME_" + id).val("0");
                    $("#BARANG_SISA_" + id).html(total);
                    return;
                }
                var cost = Number(accounting.unformat($("#BARANG_HARGA_" + id).text(), ","));
                var sub = cost * num;
                var result = Number(total) - num;
                //alert('Result : ' + result);
                //$("." + id + "_sub").html(accounting.formatMoney(Number(sub), "Rp. ", 2, ".", ","));
                $("#" + id + "_inpVolume").val(num);
                $("#BARANG_SISA_" + id).html(result);
                $("." + id + "_jml").val(num);
                //$("#grandTotal").text(accounting.formatMoney(calculateGrandTotal(), "Rp. ", 2, ".", ","));
                $(".saveForm").show();
            }
            else {
                alert("Volume material harus lebih dari nol!");
                $("#BARANG_VOLUME_" + id).val(total);
                $("#BARANG_SISA_" + id).html("0");
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
    function calculateGrandTotal() {
        var subselement = document.getElementsByClassName("subtotal_data");
        grandTotal = 0;
        for (i = 0; i < subselement.length; i++) {
            grandTotal += Number(accounting.unformat(subselement[i].innerHTML, ","));
        }
        return grandTotal;
    }
    var grandTotal = 0;
    function loadRapSubcon(BARANG_ID, BARANG_NAMA, BARANG_HARGA, SATUAN_NAMA, BARANG_VOLUME, BARANG_VOLUME_SISA, RAB_ID, PP_ID) {
        if (!BARANG_VOLUME_SISA || BARANG_VOLUME_SISA === null || BARANG_VOLUME_SISA === 'null') {
            //alert("null");
            BARANG_VOLUME_SISA = 0;
        }

        if (flagSubcon[BARANG_ID] === 0) {
            $(".barangBaru").append(
                    '<input type="hidden" id="' + BARANG_ID + '_inpBarang" name=SUBCON_ID[] value="' + BARANG_ID + '" />' +
                    '<input type="hidden" id="' + BARANG_ID + '_inpVolume" name=SUBCON_VOLUME[] value="0" class="volumeSelector"/>'
                    );
            var volumeSisa = BARANG_VOLUME_SISA + BARANG_VOLUME;
            $(".listBahan").append(
                    "<tr class='" + BARANG_ID + "'>" +
                    "<td>SUBCON" + BARANG_ID + "</td>" +
                    "<td>" + BARANG_NAMA + "</td>" +
                    "<td>" + SATUAN_NAMA + "</td>" +
                    "<td id='BARANG_VOLUME_RAP_'>" + BARANG_VOLUME + "</td>" +
                    "<td id='BARANG_SISA_" + BARANG_ID + "'>" + volumeSisa + "</td>" +
                    "<td><input class='form-control " + BARANG_ID + "_jml volumeForms' type='text' name='BARANG_VOLUME' value='" + BARANG_VOLUME + "' id='BARANG_VOLUME_" + BARANG_ID + "' onchange='onChange(" + BARANG_ID + ")' /><input type='hidden' id='BARANG_SISA_ORIGINAL_" + BARANG_ID + "' value='" + volumeSisa + "'/></td>" +
                    "<td>" +
                    "<button class='btn btn-xs btn-danger' onclick='deleteItem(0, " + PP_ID + ", " + RAB_ID + ", " + BARANG_ID + ")'><i class='fa fa-minus fa-fw'></i> Hapus</button>" +
                    "</td>" +
                    "</tr>"
                    );
            $("#" + BARANG_ID + "_inpVolume").val(volumeSisa);
            $("#BARANG_SISA_" + BARANG_ID).html(0);
            $("." + BARANG_ID + "_jml").val(volumeSisa);
            $('#subconSelector_' + BARANG_ID).prop('disabled', true);
            $('#subconSelector_' + BARANG_ID).removeClass('btn-success');
            $('#subconSelector_' + BARANG_ID).addClass('btn-default');
            flagSubcon[BARANG_ID] = 1;
        }
    }

    function addRapSubcon(BARANG_ID, BARANG_NAMA, BARANG_HARGA, SATUAN_NAMA, BARANG_VOLUME, BARANG_VOLUME_SISA, VOLUME_PP) {

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
                    '<input type="hidden" id="' + BARANG_ID + '_inpVolume" name=SUBCON_VOLUME[] value="0" class="volumeSelector"/>'
                    );
            var volumeSisa = BARANG_VOLUME_SISA;
            $(".listBahan").append(
                    "<tr class='" + BARANG_ID + "'>" +
                    "<td>SUBCON" + BARANG_ID + "</td>" +
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
            $("#" + BARANG_ID + "_inpVolume").val(volumeSisa);
            $("#BARANG_SISA_" + BARANG_ID).html(0);
            $("." + BARANG_ID + "_jml").val(volumeSisa);
            $('#subconSelector_' + BARANG_ID).prop('disabled', true);
            $('#subconSelector_' + BARANG_ID).removeClass('btn-success');
            $('#subconSelector_' + BARANG_ID).addClass('btn-default');
            flagSubcon[BARANG_ID] = 1;
        }
    }

    function loadRap(BARANG_ID, BARANG_KODE, BARANG_NAMA, BARANG_HARGA, SATUAN_NAMA, BARANG_VOLUME, BARANG_VOLUME_TERPAKAI, VOLUME_PP, RAB_ID, PP_ID) {
        if (!BARANG_VOLUME_TERPAKAI || BARANG_VOLUME_TERPAKAI === null || BARANG_VOLUME_TERPAKAI === 'null') {

            BARANG_VOLUME_TERPAKAI = 0;
        }
        var volumeSisa = (Number(BARANG_VOLUME) - Number(BARANG_VOLUME_TERPAKAI));
        if (flag[BARANG_ID] === 0) {
            $(".barangBaru").append(
                    '<input type="hidden" id="' + BARANG_ID + '_inpBarang" name=BARANG_ID[] value="' + BARANG_ID + '" />' +
                    '<input type="hidden" id="' + BARANG_ID + '_inpVolume" name=VOLUME[] value="0" class="volumeSelector" />'
                    );

            $(".listBahan").append(
                    "<tr class='" + BARANG_ID + "'>" +
                    "<td>" + BARANG_KODE + "</td>" +
                    "<td>" + BARANG_NAMA + "</td>" +
                    "<td>" + SATUAN_NAMA + "</td>" +
                    "<td id='BARANG_VOLUME_RAP_'>" + (BARANG_VOLUME) + "</td>" +
                    "<td id='BARANG_SISA_" + BARANG_ID + "'>" + volumeSisa + "</td>" +
                    "<td><input class='form-control " + BARANG_ID + "_jml volumeForms' type='text' name='BARANG_VOLUME' value='" + VOLUME_PP + "' id='BARANG_VOLUME_" + BARANG_ID + "' onchange='onChange(" + BARANG_ID + ")' /><input type='hidden' id='BARANG_SISA_ORIGINAL_" + BARANG_ID + "' value='" + (Number(volumeSisa) + Number(VOLUME_PP)) + "'/></td>" +
                    "<td>" +
                    "<button class='btn btn-xs btn-danger' onclick='deleteItem(1, " + PP_ID + ", " + RAB_ID + ", " + BARANG_ID + ")'><i class='fa fa-minus fa-fw'></i> Hapus</button>" +
                    "</td>" +
                    "</tr>"
                    );
            $("#" + BARANG_ID + "_inpVolume").val(VOLUME_PP);
            $("#BARANG_SISA_" + BARANG_ID).html(volumeSisa);
            $("." + BARANG_ID + "_jml").val(VOLUME_PP);
            $('#materialSelector_' + BARANG_ID).prop('disabled', true);
            $('#materialSelector_' + BARANG_ID).removeClass('btn-success');
            $('#materialSelector_' + BARANG_ID).addClass('btn-default');
            flag[BARANG_ID] = 1;
            console.log("flag: " + BARANG_ID);
        }

    }
    function addRap(BARANG_ID, BARANG_KODE, BARANG_NAMA, BARANG_HARGA, SATUAN_NAMA, BARANG_VOLUME, BARANG_VOLUME_TERPAKAI) {
        //console.log('AddRAP');
        //var prop = 'Barang VOLUME: ' + BARANG_VOLUME + ' Barang VOLUME_SISA' + BARANG_VOLUME_TERPAKAI;
        if (!BARANG_VOLUME_TERPAKAI || BARANG_VOLUME_TERPAKAI === null || BARANG_VOLUME_TERPAKAI === 'null') {
            //alert("null");
            BARANG_VOLUME_TERPAKAI = 0;
        }
        var volumeSisa = (Number(BARANG_VOLUME) - Number(BARANG_VOLUME_TERPAKAI));
        if (volumeSisa <= 0) {
            alert("Volume material tidak tersedia");
            return;
        }
        if (flag[BARANG_ID] === 0) {
            $(".barangBaru").append(
                    '<input type="hidden" id="' + BARANG_ID + '_inpBarang" name=BARANG_ID[] value="' + BARANG_ID + '" />' +
                    '<input type="hidden" id="' + BARANG_ID + '_inpVolume" name=VOLUME[] value="0" class="volumeSelector" />'
                    );

            $(".listBahan").append(
                    "<tr class='" + BARANG_ID + "'>" +
                    "<td>" + BARANG_KODE + "</td>" +
                    "<td>" + BARANG_NAMA + "</td>" +
                    "<td>" + SATUAN_NAMA + "</td>" +
                    "<td id='BARANG_VOLUME_RAP_'>" + BARANG_VOLUME + "</td>" +
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
            $('#materialSelector_' + BARANG_ID).prop('disabled', true);
            $('#materialSelector_' + BARANG_ID).removeClass('btn-success');
            $('#materialSelector_' + BARANG_ID).addClass('btn-default');
            flag[BARANG_ID] = 1;
            console.log("flag: " + BARANG_ID);
            //console.log("Volume: " + $('.volumeSelector').val());
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

    function validateVolumes()
    {
        var volumeList = document.getElementsByClassName("volumeForms");
        console.log(volumeList);
        console.log("volumeForms element: " + volumeList.length);
        var state = true;
        for (i = 0; i < volumeList.length; i++) {
            var res = isPositiveNumber(volumeList[i].id);
            console.log("res : " + res);
            state = (state && res);
            console.log("state : " + state);
        }
        console.log("state : " + state)
        return state;
    }

    function save() {
        //alert(flag);
        var volumeList = document.getElementsByClassName("volumeSelector");
        console.log(volumeList);
        console.log("VolumeSelector element: " + volumeList.length);
        var state = true;
        for (i = 0; i < volumeList.length; i++) {
            var res = isPositiveNumber(volumeList[i].id);
            console.log("res : " + res);
            state = (state && res);
            console.log("state : " + state);
        }
        console.log("state : " + state)

        if (state && validateVolumes()) {
            //$('#flag_save').val(param);
            $('#formPP').submit();
        } else {
            alert("Isian data PP tidak valid!");
        }
    }

    function deleteItem(_TYPE, _PP, _RAB, _ITEM) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>p-material/pp/deleteItem",
            data: {
                TYPE: _TYPE,
                PP_ID: _PP,
                RAB_ID: _RAB,
                ITEM_ID: _ITEM
            },
            cache: false,
            success: function(result) {
                console.log(result);
                document.location.reload();
            }
        });
    }

    function dialogHapus(BARANG_ID, BARANG_NAMA, SATUAN_NAMA, SUBCON) {
        $(".namaBarangHapus").text("Anda yakin untuk menghapus " + BARANG_NAMA + " " + SATUAN_NAMA + " ini?")
        $('#tobe_deleted_id').val(BARANG_ID);
        $('#subconItem').val(SUBCON);
        if (SUBCON === 'true')
            $('#materialType').html('Subcon');

        else
            $('#materialType').html('Barang');
        $('#materialSelector_' + BARANG_ID).prop('disabled', false);
        $('#materialSelector_' + BARANG_ID).removeClass('btn-default');
        $('#materialSelector_' + BARANG_ID).addClass('btn-success');

        $("#deleteModal").modal();
    }

    function deleteBarang(BARANG_ID, SUBCON) {
        $("#" + BARANG_ID + "_inpBarang").remove();
        $("#" + BARANG_ID + "_inpVolume").remove();
        $(".listBahan ." + BARANG_ID).remove();

        if (SUBCON !== 'true') {
            flag[BARANG_ID] = 0;

            console.log("barang " + BARANG_ID + " deleted!")
        }
        else {
            flagSubcon[BARANG_ID] = 0;
            console.log("subcon " + BARANG_ID + " deleted!")
        }
        var valid = validateVolumes();
        if (valid)
            $(".saveForm").show();
        else
            $(".saveForm").hide();
        $("#deleteModal").modal("hide");
        //$("#grandTotal").text(accounting.formatMoney(calculateGrandTotal(), "Rp. ", 2, ".", ","));
    }

</script>

<div id="modalPilihan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog page-tables" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><b>Daftar <span id="tipeMaterial"></span> RAP <span id="modalTitle"></span></b></h4>
            </div>
            <div class="modal-body">
                <div class="widget-content">
                    <div class="table-responsive">
                        <table cellpadding="5" cellspacing="0" border="0" id="tabelMaterial" width="100%" style="white-space: nowrap" class="display">
                            <thead id="head-bahan">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Kode</th>
                                    <th>Satuan</th>
                                    <th>Harga Satuan</th>
                                    <th>Volume Tersedia</th>
                                    <th>Total Volume</th>
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
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="clearfix">
                        </div>
                    </div>

                    <div class="table-responsive" id="subconDiv">
                        <h3>List Subcon</h3>
                        <table cellpadding="5" cellspacing="0" border="0" id="tabelSubcon" width="100%" style="white-space: nowrap" class="display">
                            <thead id="head-subcon">
                                <tr>
                                    <th>Nama Subcon</th>
                                    <th>Satuan Nama</th>
                                    <th>Volume Total</th>
                                    <th>Volume Sisa</th>
                                    <th>Harga Satuan</th>
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
                                </tr>
                            </tbody>
                        </table>
                        <div class="clearfix">
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
                    <!--
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Harga</label>
                        <div class="col-lg-5">
                            <input type="text" id="BARANG_HARGA" class="form-control" name="BARANG_HARGA" readonly="true">
                        </div>
                    </div>
                    -->
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Volume</label>
                        <div class="col-lg-5">
                            <input type="text" id="VOLUME" class="form-control" name="VOLUME" placeholder="Volume" onkeyup="calculate($('#BARANG_HARGA').val(), $('#VOLUME').val())">
                        </div>
                    </div>
                    <!--
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Sub Total</label>
                        <div class="col-lg-5">
                            <input type="text" id="SUBTOTAL" class="form-control" name="SUBTOTAL" placeholder="Sub Total" readonly="true">
                        </div>
                    </div>
                    -->
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