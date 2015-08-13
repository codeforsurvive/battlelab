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

<div style="width: 100%" align="center"><h2><b>LAPORAN PENGELUARAN UPAH</b></h2></div>



<table class="table table-bordered centerTable">
    <thead>
        <tr class="label-info">
            <th colspan="6" style="text-align: center">Keterangan LPU</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td  class="ket_po"><b>Kode LPU</b></td>
            <td><?= $lpu['LPU_KODE'] ?></td>
            <td class="ket_po"><b>RAB</b></td>
            <td><?= $lpu['RAB_KODE'] ?></td>
            <td class="ket_po"><b>Nama RAB</b></td>
            <td><?= $lpu['RAB_NAMA'] ?></td>
        </tr>
        <tr>
            <td class="ket_po"><b>Drafter</b></td>
            <td><?= $lpu['DRAFTER_NAMA'] ?></td>
            <td class="ket_po"><b>Tanggal Transaksi</b></td>
            <td><?= $lpu['TANGGAL_TRANSAKSI'] ?></td>
            <td class="ket_po"><b></b></td>
            <td></td>
        </tr>
        <tr>
            <td class="ket_po"><b>Validator</b></td>
            <td><?= $lpu['VALIDATOR_NAMA'] ?></td>
            <td class="ket_po"><b>Tanggal Validasi</b></td>
            <td><?= $lpu['TANGGAL_VALIDASI'] ?></td>
            <td class="ket_po"><b>Status Validasi</b></td>
            <td><?= $lpu['STATUS_NAMA'] ?></td>
        </tr>
    </tbody>
</table>

<table class="table table-bordered centerTable">
    <thead>
        <tr class="label-info">
            <th colspan="<?= (($lpu['STATUS_ID'] == '3') ? '8' : '9') ?>" style="text-align: center">Detail LPU</th>
        </tr>
        <tr class="label-info">
            <!--<th>Kode Opname</th>-->
            <th>Kode Analisa</th>
            <th >Nama Pekerjaan</th>
            <th>Volume LPU</th>
            <th>Volume Opname</th>
            <?php if ($lpu['STATUS_ID'] != '3' && false) { ?>
                <th>Sisa Volume Opname</th>
            <?php } ?>
<!--                                <th>Prosentase Kerja</th>-->
            <th>Satuan</th>
            <!--<th style="width: 120px">Harga Satuan</th>
            <th style="width: 150px">Subtotal</th>-->
        </tr>
    </thead>
    <tbody class="listBahan">
        <?php
        $last_opname = '';
        foreach ($detail_lpu as $dlpu) {
            $kode = $dlpu['KODE_PEKERJAAN'];
            $nama = $dlpu['NAMA_PEKERJAAN'];
            $satuan = $dlpu['SATUAN_PEKERJAAN'];
//                                if ((int) $dlpu['ANALISA_ID'] > 0) {
//                                    $kode = $dlpu['ANALISA_KODE'];
//                                    $nama = $dlpu['ANALISA_NAMA'];
//                                    $satuan = $dlpu['SATUAN_NAMA'];
//                                } else if ((int) $dlpu['UPAH_ID']) {
//                                    $kode = $dlpu['UPAH_KODE'];
//                                    $nama = $dlpu['UPAH_NAMA'];
//                                    $satuan = $dlpu['SATUAN_UPAH_NAMA'];
//                                } else if ((int) $dlpu['PAKET_ID']) {
//                                    $kode = 'LSUOV';
//                                    $nama = $dlpu['PAKET_OVERHEAD_UPAH_NAMA'];
//                                    $satuan = $dlpu['SATUAN_UPAH_NAMA'];
//                                }
//
            if ($last_opname != $dlpu['OPNAME_KODE']) {
                $last_opname = $dlpu['OPNAME_KODE'];
                echo '<tr>'
                . '<td colspan="7" style="padding-left:50px"><b>' . $dlpu['OPNAME_KODE'] . '</b></td>'
                . '</tr>';
            }
            ?>
            <tr>

                <td><?= $kode ?></td>
                <td><?= $nama ?></td>
                <td><?= $dlpu['VOLUME'] ?></td>
                <td><?= $dlpu['VOLUME_OPNAME'] ?></td>
                <?php if ($lpu['STATUS_ID'] != '3' && false) { ?>
                    <td><?= $dlpu['VOLUME_OPNAME'] - $dlpu['VOLUME_OPNAME_TERPAKAI'] ?></td>
                <?php } ?>
                <td><?= $satuan ?></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td style="background-color: #167CAC;" colspan="<?= (($lpu['STATUS_ID'] == '3') ? '8' : '9') ?>"><span class="pull-right"><b style="color: white"></b></span></td>
        </tr>
    </tbody>
</table>
<div align="center" style="width: 100%">
    <table class="table equalDevide centerTable" style="width: 100%">
        <tr>			
            <?php
            echo '<td><div align="center" style="padding-bottom: 60px">Drafter</div><div align="center" style="padding: 0, margin: 0">' . $lpu['DRAFTER_NAMA'] . '<div></td>';
            echo '<td><div align="center" style="padding-bottom: 60px">Validator</div><div align="center" style="padding: 0, margin: 0">' . $lpu['VALIDATOR_NAMA'] . '<div></td>';
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