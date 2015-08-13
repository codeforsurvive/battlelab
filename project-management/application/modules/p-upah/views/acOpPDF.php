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

<div style="width: 100%" align="center"><h2><b>OPNAME</b></h2></div>

<table class="table table-bordered centerTable">
    <thead>
        <tr class="label-info">
            <th colspan="6" style="text-align: center">Keterangan Opname</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td  class="ket_po"><b>Kode Opname</b></td>
            <td><?= $opname['OPNAME_KODE'] ?></td>
            <td class="ket_po"><b>RAB</b></td>
            <td><?= $opname['RAB_KODE'] ?></td>
            <td class="ket_po"><b>Total Harga</b></td>
            <td><?= 'Rp. ' . number_format($opname['OPNAME_TOTAL_HARGA'], 2, ',', '.') ?></td>

        </tr>
        <tr>
            <td class="ket_po"><b>Nama Mandor</b></td>
            <td><?= $opname['NAMA_MANDOR'] ?></td>
            <td class="ket_po"><b>Alamat Mandor</b></td>
            <td><?= $opname['ALAMAT_MANDOR'] ?></td>
            <td class="ket_po"><b>Telpon Mandor</b></td>
            <td><?= $opname['TELPON_MANDOR'] ?></td>
        </tr>
        <tr>
            <td class="ket_po"><b>Kategori Pajak</b></td>
            <td><?= $opname['KATEGORI_PAJAK_NAMA'] ?></td>
            <td class="ket_po"><b>Nama Pajak</b></td>
            <td><?= $opname['PAJAK_NAMA'] ?></td>
            <td class="ket_po"><b>Nilai Pajak</b></td>
            <td><?= $opname['PAJAK_VALUE'] ?>%</td>

        </tr>
        <tr>
            <td class="ket_po"><b>Drafter</b></td>
            <td><?= $opname['DRAFTER_NAMA'] ?></td>
            <td class="ket_po"><b>Tanggal</b></td>
            <td><?= $opname['OPNAME_TANGGAL'] ?></td>
            <td class="ket_po"><b>Kategori Opname</b></td>
            <td><?= $opname['KATEGORI_PK_NAMA'] ?></td>    
        </tr>
        <tr>
            <td class="ket_po"><b>Validator</b></td>
            <td><?= $opname['VALIDATOR_NAMA'] ?></td>
            <td class="ket_po"><b>Tanggal Validasi</b></td>
            <td><?= $opname['TANGGAL_VALIDASI'] ?></td>
            <td class="ket_po"><b>Status Validasi</b></td>
            <td><?= $opname['STATUS_NAMA'] ?></td>
        </tr>
    </tbody>
</table>

<table class="table table-bordered centerTable">
    <thead>
        <tr class="label-info">
            <th colspan="<?= ($opname['STATUS_OP_ID'] == 3 ? 7 : 8) ?>" style="text-align: center">Detail Opname</th>
        </tr>
        <tr class="label-info">
            <th>Kode Analisa</th>
            <th>Nama Pekerjaan</th>
            <th>Volume Opname</th>
            <th>Volume PK</th>
            <?php if ($opname['STATUS_OP_ID'] != '3') { ?>
                <th>Volume PK Tersedia</th>
            <?php } ?>
            <th>Satuan</th>
            <th>Harga Satuan</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody class="listBahan">
        <?php
        $grandTotal = 0;
        $value_pajak = 0;
        if ($opname['KATEGORI_PAJAK_ID'] == 2) {
            $value_pajak = $opname['PAJAK_VALUE'];
        }
        foreach ($detailOpname as $dop) {
            //print_r($dop);
            $total = $dop['VOLUME_OPNAME'] * $dop['HARGA_OPNAME'];
            if ($value_pajak > 0)
                $total = $total + ($value_pajak * $total / 100);
            $grandTotal+=$total;
            $kode = $dop['KODE_PEKERJAAN'];
            $nama = $dop['NAMA_PEKERJAAN'];
            $satuan = $dop['SATUAN_PEKERJAAN'];
//                                if ($opname['KATEGORI_OP_ID'] == '1') {
//                                    $satuan = $dop['SATUAN_UPAH_NAMA'];
//                                    if ($dop['UPAH_ID'] != '') {
//                                        $kode = $dop['UPAH_KODE']; //.'upah';
//                                        $nama = $dop['UPAH_NAMA'];
//                                    } else if ($dop['PAKET_OVERHEAD_UPAH_ID'] != '') {
//                                        $kode = 'LSUOV'; //.'ov';
//                                        $nama = $dop['PAKET_OVERHEAD_UPAH_NAMA'];
//                                    }
//                                } else if ($opname['KATEGORI_OP_ID'] == '2') {
//                                    $kode = $dop['ANALISA_KODE'];
//                                    $nama = $dop['ANALISA_NAMA'];
//                                    $satuan = $dop['SATUAN_NAMA'];
//                                }
            ?>
            <tr>
                <td><?= $kode ?></td>
                <td><?= $nama ?></td>
                <td><?= $dop['VOLUME_OPNAME'] ?></td>
                <td><?= $dop['VOLUME_PK'] ?></td>
                <?php
                if ($opname['STATUS_OP_ID'] != '3') {

                    echo '<td>' . ($dop['VOLUME_PK'] - $dop['VOLUME_TERPAKAI']) . '</td>';
                }
                ?>
                <td><?= $satuan ?></td>
                <td><?= 'Rp. ' . number_format($dop['HARGA_OPNAME'], 2, ',', '.') ?></td>
                <td><?= 'Rp. ' . number_format($total, 2, ',', '.') ?></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan="<?= ($opname['STATUS_OP_ID'] == 3 ? 6 : 7) ?>"><span class="pull-right"><b>Grand Total</b></span></td>
            <td id="grandTotal"><?= "Rp. " . number_format($grandTotal, 2, ",", ".") ?></td>
        </tr>
    </tbody>
</table>
<div align="center" style="width: 100%">
    <table class="table equalDevide centerTable" style="width: 100%">
        <tr>			
            <?php
            echo '<td><div align="center" style="padding-bottom: 60px">Drafter</div><div align="center" style="padding: 0, margin: 0">' . $opname['DRAFTER_NAMA'] . '<div></td>';
            echo '<td><div align="center" style="padding-bottom: 60px">Validator</div><div align="center" style="padding: 0, margin: 0">' . $opname['VALIDATOR_NAMA'] . '<div></td>';
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