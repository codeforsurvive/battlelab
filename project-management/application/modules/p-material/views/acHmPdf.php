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
    @page { margin: 70px 50px; }
    body,h2,h3 {
        font-family: 'dotmatri';
    }
    body {
        font-size: 15px;
    }
    table.equalDevide tr td { width: 50%; }
</style>

<div style="width: 100%" align="center"><h2><b>HUTANG MATERIAL</b></h2></div>



<?php
// defined style
$header_po = "style=\"background-color: #EEEEEE; width: 80px; word-wrap:break-word;\"";
$content_po = "style=\"width: 100px; word-wrap:break-word;\"";
$header_keterangan = "style=\"text-align: center; background-color: #0993D3; color: #FFFFFF; height: 30px; font-size: 12px;\"";
?>
<table class="table table-bordered centerTable">
    <thead>
        <tr class="label-info">
            <th colspan="6" <?= $header_keterangan ?>>Keterangan Hutang Material</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td <?= $header_po ?>><b>Kode HM</b></td>
            <td <?= $content_po ?>><?= $hm['HUTANG_BARANG_KODE'] ?></td>
            <td <?= $header_po ?>><b>RAB Pemberi</b></td>
            <td <?= $content_po ?>><?= $hm['RAB_KODE_PEMBERI'] ?></td>
            <td <?= $header_po ?>><b>Gudang Pemberi</b></td>
            <td <?= $content_po ?>><?= $hm['GUDANG_NAMA_PEMBERI'] . ' ' . $hm['GUDANG_LOKASI_PEMBERI'] ?></td>
        </tr>
        <tr>
            <td <?= $header_po ?>><b>Tanggal Transaksi</b></td>
            <td <?= $content_po ?>><?= $hm['TANGGAL_TRANSAKSI_HM'] ?></td>
            <td <?= $header_po ?>><b>RAB Penerima</b></td>
            <td <?= $content_po ?>><?= $hm['RAB_KODE_PENERIMA'] ?></td>
            <td <?= $header_po ?>><b>Gudang Penerima</b></td>
            <td <?= $content_po ?>><?= $hm['GUDANG_NAMA_PENERIMA'] . ' ' . $hm['GUDANG_LOKASI_PENERIMA'] ?></td>
        </tr>
        <tr>
            <td <?= $header_po ?>><b>Tanggal Mulai Hutang</b></td>
            <td <?= $content_po ?>><?= substr($hm['TANGGAL_MULAI_HUTANG'], 0, 10) ?></td>
            <td <?= $header_po ?>><b>Tanggal Prediksi Kembali</b></td>
            <td <?= $content_po ?>><?= substr($hm['TANGGAL_PREDIKSI_KEMBALI'], 0, 10) ?></td>
            <td <?= $header_po ?>><b>Status</b></td>
            <td <?= $content_po ?>><?= $hm['STATUS_NAMA'] ?></td>
        </tr>
    </tbody>
</table>

<table class="table table-bordered centerTable">
    <thead>
        <tr class="label-info">
            <th colspan="6" style="text-align: center">Detail Hutang Material</th>
        </tr>
        <tr>
            <th>No.</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>                                
            <th>Jumlah Pinjam</th>
            <?php if ($hm['STATUS_ID'] != '3') { ?>
                <th>Jumlah Stok</th>
            <?php } ?>
            <th>Satuan</th>
        </tr>
    </thead>
    <tbody class="listBahan">
        <?php
        $counter = 0;
        foreach ($detailHM as $dhm) {
            $counter++;
            ?>
            <tr>
                <td><?= $counter ?></td>
                <td><?= $dhm['BARANG_KODE'] ?></td>
                <td><?= $dhm['BARANG_NAMA'] ?></td>
                <td><?= $dhm ['VOLUME'] ?></td>
                <?php if ($hm['STATUS_ID'] != '3') { ?>
                    <td><?= $dhm ['stok_sisa'] ?></td>
                <?php } ?>
                <td><?= $dhm ['SATUAN_NAMA'] ?></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan="6" style="background-color: #167CAC;"><b style="color: #FFF"></b></td>
        </tr>
    </tbody>

</table>
<div align="center" style="width: 100%">
    <table class="table equalDevide centerTable" style="width: 100%">
        <tr>			
            <?php
            echo '<td><div align="center" style="padding-bottom: 60px">Drafter</div><div align="center" style="padding: 0, margin: 0">' . $hm['DRAFTER_NAMA'] . '<div></td>';
            echo '<td><div align="center" style="padding-bottom: 60px">Validator</div><div align="center" style="padding: 0, margin: 0">' . $hm['VALIDATOR_NAMA'] . '<div></td>';
            ?>
        </tr>
    </table>
</div>