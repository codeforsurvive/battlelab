<?php
if (!$this->session->userdata('cart_item')) {
    $cart = array();
    $this->session->set_userdata('cart_item', $cart);
}
$cart = $this->session->userdata('cart_item');
$cart_item = sizeof($cart);

//print_r($cart);
//die();
?>

<script type="text/javascript">
    
    
    function hitungharga(id) {
        //alert("change " + id);
        var harga = $("#harga-" + id).html();
        var jumlah = $("#jumlah-" + id).val();
        
        var subtotal = Number(harga) * Number(jumlah);
        
        $("#subtotal-" + id).val(subtotal);
    }
    
    function emptycart(){
        document.location.href = "<?php echo base_url(); ?>index.php/ui_product/emptycart";
    }


</script>

<div class="container-fluid">
    <h4>Total item di cart: <?php echo $cart_item ?></h4>
    <div class="clearfix"></div>
    <button class="btn btn-danger" onclick="emptycart()"><i class="fa fa-lg fa-fw fa-cart-arrow-down"></i> Kosongkan Cart</button>
    <div class="clearfix"></div>
    <form method="post" action="<?php echo base_url() ?>index.php/ui_product/checkout" id="form_jumlah">

        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Produk</td>
                    <td>Paket</td>
                    <td>icon Aplikasi</td>
                    <td>Harga</td>
                    <td>Jumlah</td>
                    <td>Sub Total</td>
                    <td>&nbsp;</td>
                </tr>
            </thead>
            <tbody>
                <?php
                //print_r($cart);
                foreach ($cart as $k => $d):
                    ?>
                    <tr>
                        <td><?php echo $k; ?></td>
                        <td><?php echo $d['product']['nama_product']; ?></td>
                        <td><?php echo $d['paket']['nama_paket']; ?></td>
                        <td><img src="<?php echo $d ['source']; ?>" width="50px"></td>
                        <td id="harga-<?php echo $k; ?>"><?php echo $d['harga']; ?></td>
                        <td>
                            <input type="number" id="jumlah-<?php echo $k; ?>" value="<?php echo $d['jumlah']; ?>" min="1" name="jumlah[]" class="number-input form-control" />

                        </td>
                        <td><input type="text" id="subtotal-<?php echo $k; ?>" value="<?php echo $d['subtotal']; ?>" name="subtotal[]" readonly class="form-control"/></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>

</div>