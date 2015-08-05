<script>
    function loadmodule (){
        var id_product= $('#nama_product').val(); 
        $.ajax({
            type : "post",
            url : "<?php echo BASE_URL; ?>index.php/module/getModuleByProduct/"+id_product,
            success: function(result){
                var json=JSON.parse(result);
                var tampil= " ";
                if ( json.length > 0){
                    for(var i = 0; i<json.length;i++) {
                        //tampil += "<div aria-disabled='false' aria-checked='false' style='position: relative;' class='icheckbox_minimal'><input style='position: absolute; opacity: 0;' class='form-control' name'id_module[]' id='id_module' value='" + json[i].id_module + "' type='checkbox'><ins style='position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;' class='iCheck-helper'></ins></div>" + json[i].nama_module + "<br />";
                        var desc = json[i].penjelasan;
                        var descArray = desc.split(" ");
                        var max = descArray.length;
                        //console.info("max: " + max);
                        if(max > 30){
                            descArray = descArray.slice(0, 30);
                            descArray.push(" . . . ");
                        }
                        var joinedArray = descArray.join(" ");
                        tampil += "<tr>" +
                            "<td>" + Number(i+1) + "</td>" +
                            "<td>" + json[i].nama_product + "</td>" +
                            "<td>" + json[i].id_module + "</td>" +
                            "<td>" + json[i].nama_module + "</td>" +
                            "<td>" + json[i].harga_module + "</td>" +
                            "<td>" +  joinedArray + "</td>" +
                            "<td>" +
                                "<a href='<?php echo base_url(); ?>index.php/module/edit/"+ json[i].id_module +"' class='label label-success'><i class='fa fa-pencil'></i> Edit</a>" +
                               "<a href='<?php echo base_url(); ?>index.php/module/delete/" + json[i].id_module + "' onclick='return confirm (\'anda yakin akan menghapus data ini?\')' class='label label-danger'><i class='fa fa-trash'></i> Delete</a>" +
                            "</td>" +

                        "</tr>";
                    }
                    $('#tampil').html(tampil);
                }
            }
        });
    }
</script>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Module</h3><br/><br/><br/>

            </div><!-- /.box-header -->

            <div class="box-body table-responsive">
                <?php
                $info = $this->session->flashdata('info');
                if (!empty($info)) {
                    echo $info;
                }
                ?>
                <p></p>
                <table >
                    <th width="150px" height="50px">
                        <select class="form-control" name="nama_product" id="nama_product" onchange="loadmodule()" height="30px">
                            <option selected disabled >Category</option>
                            <?php foreach ($nama_product->result_array() as $p): ?>
                                <option value="<?php echo $p ['id_product']; ?>"><?php echo $p ['nama_product']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </th>
                </table>
                <table id="example1"class="table table-bordered table-striped">
                    
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="5%">Nama Product</th>
                            <th width="5%">ID Module</th>
                            <th >Nama Module</th>
                            <th >Harga Module</th>
                            <th width="40%">Penjelasan</th>
                            <th >aksi</th>

                        </tr>

                    </thead>
                    <tbody id="tampil">
                    
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer text-left">
                <a href="<?php echo base_url(); ?>index.php/module/tambah" class="btn btn-primary"><i class="fa fa-link"></i> Tambah Data</a>
            </div>
        </div><!-- /.box -->
    </div>
</div>
