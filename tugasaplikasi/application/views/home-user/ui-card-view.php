<script>
    function showModal(product){
        $("#id_product").val(product);
        $("#myModal").modal("show");
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
</script>
<div class="arriv">
    <div class="container">
        <div class="arriv">
            <div class="container">
                <div class="check">	 
                    <div class="col-md-3 cart-total">
                        <a class="color5 btn btn-primary" width="50px" onclick="showModal(<?php echo $id_product; ?>)"> Beli</a>
                        <a class="continue btn btn-succes">Continue Shopping</a>
                        <div class="clearfix"></div>
                        <div class="price-details">
                            <h3>Price Details</h3>
                            <span>Total</span>
                            <span class="total1">6200.00</span>
                            <span>Discount</span>
                            <span class="total1">---</span>
                            <span>Delivery Charges</span>
                            <span class="total1">150.00</span>
                            <div class="clearfix"></div>				 
                        </div>	
                        <ul class="total_price">
                            <li class="last_price"> <h4>TOTAL</h4></li>	
                            <li class="last_price"><span>6350.00</span></li>
                            <div class="clearfix"> </div>
                        </ul>
                    </div>
                    <div class="col-md-9 cart-items">
                        <h1>My Shopping Bag</h1>
                        <script>$(document).ready(function(c) {
                            $('.close1').on('click', function(c){
                                $('.cart-header').fadeOut('slow', function(c){
                                    $('.cart-header').remove();
                                });
                            });	  
                        });
                        </script>
                        <?php
                        foreach ($data as $d):
                            ?>
                            <div class="cart-header">
                                <div class="close1"> </div>
                                <div class="cart-sec simpleCart_shelfItem">
                                    <div class="cart-item cyc">
                                        <img src="images/8.jpg" class="img-responsive" alt=""/>
                                    </div>
                                    <?php ?>
                                    <div class="cart-item-info">
                                        <h3><a ><?php echo $d['product']['nama_product'];?></a><span></span></h3>
                                        <h3><a ><img src="<?php echo $d['source'] ?>" alt="" width="200"></a><span></span></h3>
                                        <ul class="qty">
                                            <li><p>Harga : <?php echo $d['harga'] ?></p></li>
                                            <li><p>Jenis Paket : <?php echo $d['paket']['nama_paket'] ?></p></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                        <script>$(document).ready(function(c) {
                        $('.close2').on('click', function(c){
                            $('.cart-header2').fadeOut('slow', function(c){
                                $('.cart-header2').remove();
                            });
                        });	  
                    });
                        </script>		
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Transaksi</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nama_paket">Pilih Pembayaran</label>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>