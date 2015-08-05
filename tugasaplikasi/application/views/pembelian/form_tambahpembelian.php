<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script>
    function readURL(input){
        if (input.files && input.files[0]){
            var reader = new FileReader();
    
            reader.onload = function(e){
                $('#gambar').attr('src',e.target.result);
                $('#gambar').attr('alt',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function checkedChange(checkbox){
        var value = checkbox.value;
        var isChecked  = checkbox.checked;
        
        //alert("Checked: " + isChecked + " value: " + value);
    }
    
    function calculateCost(){
        var checkboxes = $(".checkbox");
        var total = 0;
        //alert(checkboxes);
        for(var i = 0; i < checkboxes.length; i++){
            var id = checkboxes[i].id;
            var tmp = id.split("_");
            id = tmp[1];
            var value = $("#hargaModule_" + id).html();
            //alert(value);
            var isChecked  = true;
            if(isChecked){
                value = accounting.unformat(value, ",");
                total += Number(value);
            }
        }
        $("#harga_tampilan").val(accounting.formatMoney(Number(total), "Rp. ", 2, ".", ","));
        //alert("Total cost:" + total);
        
    }
    
    $(document).ready(function(){
        $("#source").change(function(){
            readURL(this);
        });
      
    });
    
   
    
    
    function loadmodule (){
        var id_paket= $('#nama_paket').val();
        var id_product= $('#nama_product').val();
        $.ajax({
            type : "post",
            url : "<?php echo BASE_URL; ?>index.php/paket/getModuleByPaket/"+id_paket + "_" + id_product,
            success: function(result){
                var json=JSON.parse(result);
                var tampil= "";
                $("#id_module2").html("");
                if ( json.length > 0){
                    for(var i = 0; i<json.length;i++) {
                        tampil += "<tr>";
                        //tampil += "<div aria-disabled='false' aria-checked='false' style='position: relative;' class='icheckbox_minimal'><input style='position: absolute; opacity: 0;' class='form-control' name'id_module[]' id='id_module' value='" + json[i].id_module + "' type='checkbox'><ins style='position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;' class='iCheck-helper'></ins></div>" + json[i].nama_module + "<br />";
                        tampil += "<td>"+ Number (i+1) +"<input id='moduleCheck_" + json[i].id_module +"' type='hidden' class='checkbox' name='id_module[]' value='" + json[i].id_module+ "' /></td>";
                        tampil += "<td> "+ json[i].nama_module+" </td>"
                        tampil += "<td align='right' id='hargaModule_" + json[i].id_module + "'>" + accounting.formatMoney(Number(json[i].harga_module), "Rp. ", 2, ".", ",") + "</td>"
                        tampil += "</tr>";
                    }
                    
                    $("#id_module2").html(tampil);
                    calculateCost();
                }
            }
        });
    }
    
    function submitForm(){
        var hargaTampilan = $("#harga_tampilan").val();
        hargaTampilan = accounting.unformat(hargaTampilan, ",");
        $("#harga_aplikasi").val(hargaTampilan);
        $("#formTambah").submit();
    }
        
</script>
<form id="formTambah" method="POST" action="<?php echo base_url(); ?>index.php/pembelian/simpan" enctype="multipart/form-data" runat="server">
    <div class="row" >
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Tambah Pembelian </h3>
                </div>
                <form>
                    <div class="box-body">
                        <!--
                        <div class="form-group">
                            <label for="nama">Nama Pembeli</label>
                            <input type="text" class="form-control" name="nama" id="nama_template" placeholder="Nama Pembeli" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E - Mail</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="E - Mail" required>
                        </div>
                        <div class="form-group">
                            <label for="telp">No. Telp</label>
                            <input type="text" class="form-control" name="telp" id="telp" placeholder="Telepon" required>
                        </div> -->
                        <div class="form-group">
                            <label for="nama_Product">Nama Product</label>
                            <select class="form-control" name="nama_product" id="nama_product" >
                                <option selected disabled >Pilih Product yang akan dibeli</option>
                                <?php foreach ($nama_product->result_array() as $p): ?>
                                    <option value="<?php echo $p ['id_product']; ?>"><?php echo $p ['nama_product']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_paket">Nama Paket</label>
                            <select class="form-control" name="nama_paket" id="nama_paket" onchange="loadmodule()">
                                <option selected disabled >Pilih Paket yang akan dibeli</option>
                                <?php foreach ($nama_paket->result_array() as $p): ?>
                                    <option value="<?php echo $p ['id_paket']; ?>"><?php echo $p ['nama_paket']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th >Nama Module</th>
                                        <th >Harga</th>

                                    </tr>


                                </thead>
                                <tbody id="id_module2">

                                </tbody>

                            </table>

                        </div>
                        <div class="form-group">
                            <label for="nama_template">Nama Template</label>
                            <select class="form-control" name="nama_template" id="nama_template">
                                <option selected disabled >Pilih Template</option>
                                <?php foreach ($nama_template->result_array() as $t): ?>
                                    <option value="<?php echo $t ['id_template']; ?>"><?php echo $t ['nama_template']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="source">Upload Icon Aplikasi</label>
                            <input type="file" accept="image/*" name="source" id="source" placeholder="" ><p></p>
                        </div>
                        <div class="form-group">
                            <img id="gambar" src="#" alt="" width="200px">
                        </div>
                        <div class="form-group">
                            <label for="harga_aplikasi">Harga Aplikasi</label>
                            <input type="text" class="form-control" id="harga_tampilan" value=""  readonly />
                            <!--<textarea type="text" class="form-control" name="harga_aplikasi" id="harga_aplikas" placeholder="Harga Aplikasi"  required></textarea> -->
                            <input type="hidden" name="harga_aplikasi" id="harga_aplikasi" value="" />
                        </div>

                    </div>
                </form>
            </div>
            <div class="box-footer">
                <button type="button" class="btn btn-default" onclick="submitForm()"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo base_url(); ?>index.php/pembelian" class="btn btn-default">kembali</a>
            </div>
        </div>
    </div>
</form>
