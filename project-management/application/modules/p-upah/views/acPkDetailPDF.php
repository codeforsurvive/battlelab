<script type="text/php">
    if ( isset($pdf) ) {

    // Open the object: all drawing commands will
    // go to the object instead of the current page
    $footer = $pdf->open_object();

    $w = $pdf->get_width();
    $h = $pdf->get_height();

    // Draw a line along the bottom
    $y = $h - 2 * $text_height - 24;
    $pdf->line(36, $y, $w - 36, $y, $color, 1);

    $pdf->page_text($w - 140, $y + 5, "Halaman {PAGE_NUM} dari {PAGE_COUNT}", $font, 12, array(0,0,0));
    $pdf->page_text($w - 220, 18, date("H:i:s d/m/Y")." dari AddPro", $font, 12, array(0,0,0));
    $img_w = 996; // 2 inches, in points
    $img_h = 573; // 1 inch, in points -- change these as required
    $pdf->image(base_url()."/assets/default/addprologotrans.png", "png", 20, $w, $img_h, $img_w);

    // Close the object (stop capture)
    $pdf->close_object();

    // Add the object to every page. You can
    // also specify "odd" or "even"
    $pdf->add_object($footer, "all");
    }
</script>
<?php

function toMoney($num) {
    return 'Rp ' . number_format(floatval($num), 0, '', '.') . ',00';
}

// defined style
$header_po = "style='background-color: #EEEEEE; width: 80px; word-wrap:break-word;'";
$content_po = "style='width: 100px; word-wrap:break-word;'";
$header_keterangan = "style='text-align: center; background-color: #0993D3; color: #FFFFFF; height: 20px; font-size: 18px;'";
?>
<style>
    @page { margin: 50px 50px; }
    body, h2, h3 {
        font-family: 'dotmatri';
    }
    body {
        font-size: 15px;
    }
</style>
<div style="width: 100%;" align="center"><h2><b>PERMINTAAN PEKERJAAN</b></h2></div>
<table class="table table-bordered centerTable">
    <thead>
        <tr class="label-info">
            <th colspan="6" <?= $header_keterangan ?>>Keterangan PK</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td <?= $header_po ?>><b>Kode</b></td>
            <td <?= $content_po ?>><?= $PP['PK_KODE']; ?></td>
            <td <?= $header_po ?>><b>RAB Kode</b></td>
            <td <?= $content_po ?>><?= $PP['RAB_KODE']; ?></td>
            <td <?= $header_po ?>><b>RAB Nama</b></td>
            <td <?= $content_po ?>><?= $PP['RAB_NAMA']; ?></td>
        </tr>
        <tr>
            <td <?= $header_po ?>><b>Status PK</b></td>
            <td><?= $PP['STATUS_PK_NAMA']; ?></td>
            <td <?= $header_po ?>><b>Kategori PK</b></td>
            <td><?= $PP['KATEGORI_PK_NAMA']; ?></td>
            <td <?= $header_po ?>><b>&nbsp;</b></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td <?= $header_po ?>><b>Tanggal Buat</b></td>
            <td><?= $PP['PK_TANGGAL']; ?></td>
            <td <?= $header_po ?>><b>Tanggal Validasi</b></td>
            <td><?= $PP['PK_VALIDATED']; ?></td>
            <td <?= $header_po ?>><b>Divalidasi oleh</b></td>
            <td><?= $PP['VALIDATOR_NAMA']; ?></td>
        </tr>

    </tbody>
</table>
<table class="table table-striped table-bordered table-hover centerTable" style="margin-top: 20px">
    <thead>
        <tr class="label-info">
            <th colspan="5" <?= $header_keterangan ?>>Detail Transaksi Permintaan Pekerjaan</th>
        </tr>
        <tr class="label-info">
            <th> No </th>
            <th>Nama</th>
            <th>Kode</th>
            <th>Volume PK</th>
            <th>Satuan</th>
        </tr>
    </thead>
    <tbody id="detail_po">
        <?php
        $jumlah = 0;
        $i = 1;
        foreach ($detailPP as $item) {
            ?>
            <tr class="item_po_detail">
                <td><?= $i++ ?></td>
                <td><?= $item["ANALISA_NAMA"] ?></td>
                <td><?= $item["ANALISA_KODE"] ?></td>
                <td><?= $item["VOLUME_PK"] ?></td>
                <td><?= $item["SATUAN"] ?></td>

            </tr>
<?php } ?>

    </tbody>
</table>
