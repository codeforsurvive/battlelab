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

<div style="width: 100%" align="center"><h2><b>PENERIMAAN BARANG</b></h2></div>
<table class="table table-bordered centerTable">
    <thead>
        <tr class="label-info">
            <th colspan="6">Keterangan Penerimaan Barang</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td width="100" class="ket_po"><b>Kode LPB</b></td>
            <td><?= $lpb['PENERIMAAN_BARANG_KODE'] ?></td>
            <td class="ket_po"><b>Tanggal Transaksi</b></td>
            <td><?= $lpb['PENERIMAAN_BARANG_TANGGAL'] ?></td>
            <td class="ket_po"><b>Status Validasi</b></td>
            <td><?= $lpb['STATUS_LPB_NAMA'] ?></td>
        </tr>
        <tr>
            <td width="100" class="ket_po"><b>Surat Jalan</b></td>
            <td><?= $lpb['LPB_SURAT_JALAN'] ?></td>
            <td class="ket_po"><b>Gudang</b></td>
            <td><?= $lpb['GUDANG_NAMA'] . ' ' . $lpb['GUDANG_LOKASI'] ?></td>
            <td class="ket_po"><b>Tanggal Validasi</b></td>
            <td><?= $lpb['PENERIMAAN_BARANG_TANGGAL_VALIDASI'] ?></td>
        </tr>
        <tr>
            <td width="100" class="ket_po"><b>No Kendaraan</b></td>
            <td><?= $lpb['LPB_KENDARAAN'] ?></td>
            <td class="ket_po"><b>Supplier</b></td>
            <td><?= $lpb['SUPPLIER_NAMA'] . ' ' . $lpb['SUPPLIER_ALAMAT'] ?></td>

        </tr>
    </tbody>
</table>

<table class="table table-striped table-bordered table-hover centerTable" style="margin-top: 20px">
    <thead>
        <tr class="label-info">
            <th colspan="<?= ($lpb['STATUS_LPB_ID'] == '3' ? 7 : 8) ?>">Detail Transaksi Penerimaan Barang</th>
        </tr>
        <tr class="label-info">
            <th>No.</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kode PO</th>
            <th>Kode PP</th>
            <th>Volume LPB</th>
            <?php if ($lpb['STATUS_LPB_ID'] != '3') { ?>
                <th>Volume PO Tersedia</th>
            <?php } ?>
            <th>Satuan</th>
        </tr>
    </thead>
    <tbody id="detail_po">
        <?php
        $last_kode_po = '';
        $total = 0;
        $counter = 0;
        foreach ($list_detail_lpb as $dlpb) {
            $counter++;
            ?>
            <tr>
                <td><?= $counter ?></td>
                <td><?= $dlpb['KODE_MATERIAL'] ?></td>
                <td><?= $dlpb['NAMA_MATERIAL'] ?></td>
                <td><?= $dlpb['PURCHASE_ORDER_KODE'] ?></td>
                <td><?= $dlpb['PERMINTAAN_PEMBELIAN_KODE'] ?></td>
                <td><?= $dlpb['VOLUME_LPB'] ?></td>
                <?php if ($lpb['STATUS_LPB_ID'] != '3') { ?>
                    <td><?= $dlpb['VOLUME_PO'] - $dlpb['VOLUME_PO_IN_LPB'] ?></td>
                <?php } ?>
                <td><?= $dlpb['SATUAN_MATERIAL'] ?></td>
            </tr>
        <?php }
        ?>
        <tr class="item_po_detail">
            <td colspan="<?= ($lpb['STATUS_LPB_ID'] == '3' ? 7 : 8) ?>" style="background-color: #167CAC;">
                <b style="color: #FFF"></b></td>
        </tr>
    </tbody>
</table>
<div align="center" style="width: 100%">
    <table class="table equalDevide centerTable" style="width: 100%">
        <tr>			
            <?php
            echo '<td><div align="center" style="padding-bottom: 60px">Drafter</div><div align="center" style="padding: 0, margin: 0">' . $lpb['DRAFTER_NAMA'] . '<div></td>';
            echo '<td><div align="center" style="padding-bottom: 60px">Validator</div><div align="center" style="padding: 0, margin: 0">' . $lpb['VALIDATOR_NAMA'] . '<div></td>';
            ?>
        </tr>
    </table>
</div>
<style type="text/css">
    .centerTable th{
        text-align: center;
        background-color: #0993D3;
        color: #FFFFFF;
        height: 30px;
        font-size: 12px;
    }
    .ket_po{
        background-color: #EEEEEE;
    }
</style>