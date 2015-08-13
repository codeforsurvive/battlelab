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

<div style="width: 100%" align="center"><h2><b>BON PEMAKAIAN BARANG</b></h2></div>

<table class="table table-bordered centerTable">
    <thead>
        <tr class="label-info">
            <th colspan="6" style="text-align: center">Keterangan Pemakaian Barang</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td width="100" class="ket_po"><b>Kode LPB</b></td>
            <td><?= $bpm['BPM_KODE'] ?></td>
            <td width="100" class="ket_po"><b>Main Project</b></td>
            <td><?= $bpm['MAIN_PROJECT_KODE'] . ' ' . $bpm['MAIN_PROJECT_NAMA'] ?></td>
            <td class="ket_po"><b>Status Validasi</b></td>
            <td><?= $bpm['STATUS_LPB_NAMA'] ?></td>
        </tr>
        <tr>
            <td class="ket_po"><b>Tanggal Transaksi</b></td>
            <td><?= $bpm['BPM_TANGGAL'] ?></td>
            <td class="ket_po"><b>Project</b></td>
            <td><?= $bpm['PROJECT_KODE'] . ' ' . $bpm['PROJECT_NAMA'] ?></td>
            <td class="ket_po"><b>Gudang</b></td>
            <td><?= $bpm['GUDANG_KODE'] . ' ' . $bpm['GUDANG_NAMA'] . ' ' . $bpm['GUDANG_LOKASI'] ?></td>
        </tr>
        <tr>
            <td class="ket_po"><b>Peminta Barang</b></td>
            <td><?= $bpm['PEMINTA_BARANG'] ?></td>
            <td class="ket_po"><b>Keterangan</b></td>
            <td colspan="3"><?= $bpm['BPM_KETERANGAN'] ?></td>

        </tr>
    </tbody>
</table>    

<table class="table table-striped table-bordered table-hover centerTable" id="tabel_list_detail_bpm">
    <thead>
        <tr class="label-info">
            <th colspan="<?= ($bpm['STATUS_BPM_ID'] == '3' ? '5' : '6') ?>" style="text-align: center">Detail Transaksi Pemakaian Barang</th>
        </tr>
        <tr class="label-info">
            <th>No.</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>                                
            <th>Jumlah BPM</th>
            <?php if ($bpm['STATUS_BPM_ID'] != '3') { ?>
                <th>Jumlah Stok Tersedia</th>
            <?php } ?>
            <th>Satuan</th>
        </tr>
    </thead>
    <tbody class="listBahan">
        <?php
        $counter = 0;
        foreach ($detailBPM as $dbpm) {
            $counter++;
            $kode = 'LSMOV';
            $nama = '';
            $satuan = '';
            $sisa = 0; //$dbpm ['VOLUME'];
            if ($dbpm['BARANG_ID'] > 0) {
                $kode = $dbpm['BARANG_KODE'];
                $nama = $dbpm['BARANG_NAMA'];
                $satuan = $dbpm['BARANG_SATUAN_NAMA'];
                $sisa+=$dbpm['STOK_BARANG'] - $dbpm['V_BARANG_IN_BPM'];
            } else if ($dbpm['SUBCON_ID'] > 0) {
                $kode = $dbpm['SUBCON_TIPE_KODE'];
                $nama = $dbpm['SUBCON_NAMA'];
                $satuan = $dbpm['SUBCON_SATUAN_NAMA'];
                $sisa+=$dbpm['STOK_SUBCON'] - $dbpm['V_SUBCON_IN_BPM'];
            } else if ($dbpm['PAKET_OVERHEAD_MATERIAL_ID'] > 0) {
                $nama = $dbpm['PAKET_OVERHEAD_MATERIAL_NAMA'];
                $satuan = $dbpm['OVERHEAD_SATUAN_NAMA'];
                $sisa+=$dbpm['STOK_OVERHEAD'] - $dbpm['V_OVERHEAD_IN_BPM'];
            }
            ?>
            <tr>
                <td><?= $counter ?></td>
                <td><?= $kode ?></td>
                <td><?= $nama ?></td>
                <td><?= $dbpm ['VOLUME'] ?></td>
                <?php if ($bpm['STATUS_BPM_ID'] != '3') { ?>
                    <td><?= $sisa ?></td>
                <?php } ?>
                <td><?= $satuan ?></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan="<?= ($bpm['STATUS_BPM_ID'] == '3' ? '5' : '6') ?>" style="background-color: #167CAC;"><b style="color: #FFF"></b></td>
        </tr>
    </tbody>

</table>


<div align="center" style="width: 100%">
    <table class="table equalDevide centerTable" style="width: 100%">
        <tr>			
            <?php
            echo '<td><div align="center" style="padding-bottom: 60px">Drafter</div><div align="center" style="padding: 0, margin: 0">' . $bpm['DRAFTER_NAMA'] . '<div></td>';
            echo '<td><div align="center" style="padding-bottom: 60px">Validator</div><div align="center" style="padding: 0, margin: 0">' . $bpm['VALIDATOR_NAMA'] . '<div></td>';
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