<script type="text/javascript">
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
    
    $(document).ready(function(){
        $("#source").change(function(){
            readURL(this);
        });
      
    });
    
    function loadmodule (){
        var id_paket= $('#nama_paket').val();
        var id_product= $('#id_product').val();
        $.ajax({
            type : "post",
            url : "<?php echo BASE_URL; ?>index.php/ui_product/getModuleByPaket/"+id_paket + "_" + id_product,
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
        $("#harga_aplikasi").val(total);
        $("#harga_tampilan_1").val(accounting.formatMoney(Number(total), "Rp. ", 2, ".", ","));
        //$("#harga_tampilan").val(total);
        //alert("Total cost:" + total);
        
    }
    
    $(document).ready(function(){
        $("#sembunyi").hide();
        var visible = true;
        var text = "";
        $("#btn_show").click(function(){
            $("#sembunyi").slideToggle("fast");
            if(visible){
                text = "<i class='fa fa-eye'></i> Sembunyikan";
            } else{
                text = "<i class='fa fa-eye'></i> Tampilkan";
            }
            $("#btn_show").html(text);
            visible = !visible;
        });
    });
</script>
<div class="container">
    <div class="women_main">
        <!-- start content -->
        <div class="row single">
            <div class="col-md-9 det">
                <div class="single_left">
                    <div class="grid images_3_of_2">
                        <img src="<?php echo $source ?>" class="img-responsive" title="" />
                        <div class="clearfix"></div>	
                    </div>
                    <div class="desc1 span_3_of_2">
                        <h2><?php echo $nama_product ?></h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class="single-bottom1">
                        <h6>Details</h6>
                        <p class="prod-desc"><?php echo $penjelasanP; ?></p>
                    </div>
                    <div class="clearfix"></div>
                    <br/>
                </div>
                <div class="single-left">
                    <div class="single-bottom2">
                        <h6>Module Yang Tersedia</h6>
                        <br/>
                        <div class="clearfix"></div>
                    </div>
                    <div class="cr_btn1">
                        <button class="btn btn-success" id="btn_show"><i class="fa fa-eye"></i> Tampilkan</button>
                    </div>
                    <div id="sembunyi" class="single-bottom2">
                        <div class="our-left1">
                        </div>
                        <br/>
                        <?php
                        $no = 1;
                        foreach ($module as $m):
                            ?>
                            <div class="product">
                                <div class="product-desc">
                                    <div class="prod1-desc">
                                        <h5><a class="product_link"><?php echo $m['nama_module'] ?></a></h5>
                                        <h8><?php echo $m ['penjelasan']; ?></h8>								
                                    </div>
                                    <br/>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="product_price" id="harga_tampilan">
                                    <span class="price-access" ><?php echo $m ['harga_module']; ?></span>
                                </div>
                                <div class="clearfix"></div>
                            <?php endforeach; ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <br/>
            <div class="clearfix"></div>
            <div class="single-bottom2">
                <h6>Paket Module</h6>
                <br/>
                <div class="clearfix"></div>
            </div>
            <div id="sembunyi" class="single-bottom2">
                <div class="our-left1">
                </div>
                <div class="product">
                    <div class="product-desc">
                        <form action="<?php echo base_url(); ?>index.php/ui_product/chartproduct/" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id_product" id="id_product" value="<?php echo $paket ?>">
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
                                <label for="nama_template">Template</label>
                                <select class="form-control" name="nama_template" id="nama_template" >
                                    <option selected disabled >Pilih Template</option>
                                    <?php foreach ($nama_template->result_array() as $p): ?>
                                        <option value="<?php echo $p ['id_template']; ?>"><?php echo $p ['nama_template']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga_aplikasi">Harga Aplikasi</label>
                                <input type="text" class="form-control" id="harga_tampilan_1" value=""  readonly />
                                <!--<textarea type="text" class="form-control" name="harga_aplikasi" id="harga_aplikas" placeholder="Harga Aplikasi"  required></textarea> -->
                                <input type="hidden" name="harga_aplikasi" id="harga_aplikasi" value="" />
                            </div>
                            <div class="form-group">
                                <label for="source">Upload Icon Aplikasi</label>
                                <input type="file" accept="image/*" name="source" id="source" placeholder="" ><p></p>
                            </div>
                            <div class="form-group">
                                <img id="gambar" src="#" alt="" width="200px">
                            </div>
                    </div>
                    <br/>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-cart"></i> Tambahkan Ke Cart</button>
                    <div class="clearfix"></div>
                    </form>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end content -->
    </div>

</div>