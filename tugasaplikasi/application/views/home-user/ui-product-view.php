<script>
    function showModal(product){
        $("#id_product").val(product);
        $("#myProductModal").modal("show");
    }
    
    function hitungHarga(){
        var paket = $("#nama_paket").val();
        var product = $("#id_product").val();
        $.ajax({
            "type": "post",
            "url": "<?php echo base_url(); ?>index.php/ui_product/getHargaPaket/" + paket + "_" + product,
            "success": function(result){
                var json = JSON.parse(result);
                $("#harga_tampilan").val(json.harga);
            }
        });
        
    }
</script>
<div class="arriv">
    <div class="container">
        <div class="modal fade" id="myProductModal" tabindex="-1" role="dialog" aria-labelledby="myProductModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myProductModalLabel">Pembelian</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nama_paket">Pilih Paket</label>
                                    <input type="hidden" name="id_product" id="id_product" value="" />
                                    <select class="form-control" name="nama_paket" id="nama_paket" onchange="hitungHarga()">
                                        <option selected disabled >Pilih Paket yang akan dibeli</option>
                                        <?php foreach ($nama_paket->result_array() as $p): ?>
                                            <option value="<?php echo $p ['id_paket']; ?>"><?php echo $p ['nama_paket']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_template">Pilih Template</label>
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
                                    <img id="gambar" src="#" alt="">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <label for="harga_aplikasi">Harga Aplikasi</label>
                                    <input type="text" class="form-control" id="harga_tampilan" value=""  readonly />
                                    <!--<textarea type="text" class="form-control" name="harga_aplikasi" id="harga_aplikas" placeholder="Harga Aplikasi"  required></textarea> -->
                                    <input type="hidden" name="harga_aplikasi" id="harga_aplikasi" value="" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"onclick="addCartItem()"><i class="fa fa-fw fa-lg fa-cart-plus"></i> Tambahkan Ke Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <?php foreach ($data->result() as $row) { ?>
            <div class="arriv-top">
                <div class="col-md-6 arriv-left">
                    <?php echo $row->nama_product ?>
                    <img src="<?php echo $row->source ?>" border="2px" class="img-responsive" />
                    <ul class="megamenu skyblue">
                        <li class="active grid"><a class="color6 btn" href="<?php echo base_url(); ?>index.php/ui_product/detailproduct/<?php echo $row->id_product ?>"> <i class="fa fa-lg fa-fw fa-search"></i> Detail</a></li>
                        <li class="active grid"><a class="color5 btn" onclick="showModal(<?php echo $row->id_product; ?>)"> <i class="fa fa-lg fa-fw fa-shopping-cart"></i> Beli</a></li>
                    </ul>

                </div>
            </div>
        <?php }; ?>
        <div class="clearfix"> </div>
    </div>


</div>