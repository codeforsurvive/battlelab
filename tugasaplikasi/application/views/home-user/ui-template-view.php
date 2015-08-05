<div class="container">
    <br/>
    <br/>
    <br/>
    <h3>Template</h3>
    <div class="specia-top">
        <ul class="grid_2">
            <?php foreach ($data->result() as $row) { ?>
                <li style="width:auto;">
                    <img src="<?php echo $row->source ?>" class="img-responsive" alt="">
                    <div class="special-info grid_1 simpleCart_shelfItem">
                        <h3 style="color: rgb(63, 61, 61); font-size: 1.1em; font-weight: 400; font-family: 'Playfair Display',serif; text-align: center; margin: 0px;"><?php echo $row->nama_template ?></h3>
                        <br/>
                        <div class="item_add"><span class="item_price"><a href="">Detail</a></span></div>
                    </div>
                </li>
            <?php }; ?>
            <div class="clearfix"> </div>
        </ul>
    </div>
</div>