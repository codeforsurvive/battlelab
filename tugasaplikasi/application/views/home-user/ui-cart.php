<?php
if (!$this->session->userdata('cart_item')) {
    $cart = array();
    $this->session->set_userdata('cart_item', $cart);
}
$cart = $this->session->userdata('cart_item');
$cart_item = sizeof($cart);
?>

<script type="text/javascript">
    function updateTotal() {
        
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
                    <td><?php; ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        <select class="form-control" id="jumlah">
                            <option selected>1</option>

                        </select>
                    </td>
                    <td><input type="text" id="subtotal_" value="0" readonly class="form-control"/></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>