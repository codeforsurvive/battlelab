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
<div style="width: 100%" align="center"><h2><b>Laporan Pembayaran <?php echo ( (int) $pym['INVOICE_ID'] > 0 ? 'Material' : 'Upah') ?></b></h2></div>
<table class="table table-bordered centerTable">
    <thead>
        <tr class="label-info">
            <th colspan="6">Keterangan Pembayaran <?php echo ( (int) $pym['INVOICE_ID'] > 0 ? 'Material' : 'Upah') ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="ket_po" width="100"><b>Kode Payment</b></td>
            <td><?= $pym['PAYMENT_KODE'] ?></td>
            <td class="ket_po"><b>Tanggal Transaksi</b></td>
            <td><?= $pym['TANGGAL_TRANSAKSI'] ?></td>
        </tr>
        <tr>
            <td class="ket_po"><b>Status</b></td>
            <td><?= $pym['STATUS_NAMA'] ?></td>
        </tr>
        <tr>

        </tr>
    </tbody>
</table>
<table class="table table-striped table-bordered table-hover centerTable" style="margin-top: 20px">
    <thead>
        <tr class="label-info">
            <th colspan="10">Detail Transaksi Pembayaran <?php echo ( (int) $pym['INVOICE_ID'] > 0 ? 'Material' : 'Upah') ?></th>
        </tr>
        <tr class="label-info">
            <th>No.</th>
            <th>Kode Barang </th>
            <th>Nama Barang</th>
            <th>Volume</th>
            <th>Satuan</th>
            <th>Harga Satuan</th>
            <th >Diskon</th>
            <th colspan="2">Pajak</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody id="detail_">
        <?php
        $c = 0;
        $harga_total = 0;
        $kode_opname = "";
        $kode_lpb = '';
        $jumlah_lpb = 0;
        $subtotal = 0;
        foreach ($detail as $key => $d) {
            $c++;
            if ((int) $pym['INVOICE_ID'] > 0) {

                if ($kode_lpb != $d['PENERIMAAN_BARANG_KODE']) {
                    if (strlen($kode_lpb) > 0) {
                        echo '<tr><td colspan="9" style="text-align:right;font-weight:bold">Sub Total</td><td>Rp. ' . number_format($subtotal, 2, ',', '.') . '</td></tr>';
                    }
                    $jumlah_lpb++;
                    $kode_lpb = $d['PENERIMAAN_BARANG_KODE'];
                    echo '<tr><td></td><td colspan="9">' . $kode_lpb . '</td></tr>';
                    $subtotal = 0;
                }
                $harga = $d['BARANG_HARGA_SATUAN'] * $d['VOLUME_LPB'];
                $harga_awal = $harga;
                $diskon1 = $d['DISKON1'] * $harga / 100;
                $harga = $harga - $diskon1;
                $diskon2 = $d['DISKON2'] * $harga / 100;
                $harga = $harga - $diskon2;
                $diskon3 = $d['DISKON3'] * $harga / 100;
                $pajak = 0;
                $diskon = $diskon1 + $diskon2 + $diskon3;
                $nama_pajak = '';
                $harga = $harga - $diskon3;
                if ($d['KATEGORI_PAJAK_ID'] == 1) {
                    $nama_pajak = 'inc';
                    $pajak = $d['PAJAK_VALUE'] * $harga / (100 + $d['PAJAK_VALUE']);
                } else if ($d['KATEGORI_PAJAK_ID'] == 2) {
                    $nama_pajak = 'exc';
                    $pajak = $d['PAJAK_VALUE'] * $harga / (100);
                    $harga = $harga + $pajak;
                } else if ($d['KATEGORI_PAJAK_ID'] == 3) {
                    $nama_pajak = 'notax';
                }
                $harga_total+=$harga;
                $subtotal+=$harga;
                ?>
                <tr>
                    <td><?= $c ?></td>
                    <td><?= $d['KODE_MATERIAL'] ?></td>
                    <td><?= $d['NAMA_MATERIAL'] ?></td>
                    <td><?= $d['VOLUME_LPB'] ?></td>
                    <td><?= $d['SATUAN_NAMA'] ?></td>
                    <td>Rp. <?= number_format($d['BARANG_HARGA_SATUAN'], 2, ',', '.') ?></td>
                    <td>Rp. <?= number_format($diskon, 2, ',', '.') ?></td>
                    <td><?= $nama_pajak ?> <?= $d['PAJAK_VALUE'] ?>%</td>
                    <td>Rp. <?= number_format($pajak, 2, ',', '.') ?></td>
                    <td>Rp. <?= number_format($harga, 2, ',', '.') ?></td>
                </tr>
                <?php
            } else if ((int) $pym['LPU_ID'] > 0) {
                //print_r($d);
                if ($kode_opname != $d['OPNAME_KODE']) {
                    if (strlen($kode_opname) > 0) {
                        echo '<tr><td colspan="9" style="text-align:right;font-weight:bold">Sub Total</td><td>Rp. ' . number_format($subtotal, 2, ',', '.') . '</td></tr>';
                    }
                    $jumlah_lpb++;
                    $kode_opname = $d['OPNAME_KODE'];
                    echo '<tr><td></td><td colspan="9">' . $kode_opname . '</td></tr>';
                    $subtotal = 0;
                }
                $harga = $d['HARGA_OPNAME'] * $d['VOLUME'];
                $pajak = 0;
                $diskon = 0;
                $nama_pajak = '';

                if ($d['KATEGORI_PAJAK_ID'] == 1) {
                    $nama_pajak = 'inc';
                    $pajak = $d['PAJAK_VALUE'] * $harga / (100 + $d['PAJAK_VALUE']);
                } else if ($d['KATEGORI_PAJAK_ID'] == 2) {
                    $nama_pajak = 'exc';
                    $pajak = $d['PAJAK_VALUE'] * $harga / (100);
                    $harga = $harga + $pajak;
                } else if ($d['KATEGORI_PAJAK_ID'] == 3) {
                    $nama_pajak = 'notax';
                }
                $harga_total+=$harga;
                $subtotal+=$harga;
                ?>
                <tr>
                    <td><?= $c ?></td>
                    <td><?php
//                                            if ((int) $d['ANALISA_ID'] > 0)
//                                                echo $d['ANALISA_KODE'];
//                                            else if ((int) $d['UPAH_ID'] > 0)
//                                                echo $d['UPAH_KODE'];
//                                            else if ((int) $d['PAKET_OVERHEAD_UPAH_ID'] > 0)
//                                                echo 'LSUOV';
                        echo $d['KODE_PEKERJAAN'];
                        ?></td>
                    <td><?php
//                                            if ((int) $d['ANALISA_ID'] > 0)
//                                                echo $d['ANALISA_NAMA'];
//                                            else if ((int) $d['UPAH_ID'] > 0)
//                                                echo $d['UPAH_NAMA'];
//                                            else if ((int) $d['PAKET_OVERHEAD_UPAH_ID'] > 0)
//                                                echo $d['PAKET_OVERHEAD_UPAH_NAMA'];
                        echo $d['NAMA_PEKERJAAN'];
                        ?></td>
                    <td><?= $d['VOLUME'] ?></td>
                    <td><?php
//                                            if ((int) $d['ANALISA_ID'] > 0)
//                                                echo $d['SATUAN_NAMA'];
//                                            else if ((int) $d['UPAH_ID'] > 0)
//                                                echo $d['SATUAN_UPAH_NAMA'];
//                                            else if ((int) $d['PAKET_OVERHEAD_UPAH_ID'] > 0)
//                                                echo $d['SATUAN_UPAH_NAMA'];
                        echo $d['SATUAN_PEKERJAAN'];
                        ?></td>
                    <td>Rp. <?= number_format($d['HARGA_OPNAME'], 2, ',', '.') ?></td>
                    <td>Rp. <?= number_format($diskon, 2, ',', '.') ?></td>
                    <td><?= $nama_pajak ?> <?= $d['PAJAK_VALUE'] ?>%</td>
                    <td>Rp. <?= number_format($pajak, 2, ',', '.') ?></td>
                    <td>Rp. <?= number_format($harga, 2, ',', '.') ?></td>
                </tr>
                <?php
            }
        }
        if ($jumlah_lpb > 1) {
            echo '<tr><td colspan="9" style="text-align:right;font-weight:bold">Sub Total</td><td >Rp. ' . number_format($subtotal, 2, ',', '.') . '</td></tr>';
        }
        ?>
        <tr>
            <td style="text-align:right;font-weight:bold;background-color: #167CAC;" colspan="9"><b style="color: #FFF">Total</b></td>
            <td>Rp. <?= number_format($harga_total, 2) ?></td>
        </tr>
    </tbody>
</table>
<div align="center" style="width: 100%">
    <table class="table equalDevide centerTable" style="width: 100%">
        <tr>			
            <?php
            echo '<td><div align="center" style="padding-bottom: 60px">Drafter</div><div align="center" style="padding: 0, margin: 0">' . $pym['DRAFTER_NAMA'] . '<div></td>';
            echo '<td><div align="center" style="padding-bottom: 60px">Validator</div><div align="center" style="padding: 0, margin: 0">' . $pym['VALIDATOR_NAMA'] . '<div></td>';
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