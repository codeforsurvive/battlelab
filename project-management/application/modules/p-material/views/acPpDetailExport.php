<?php
// defined style
$header_pp = "style='background-color: #EEEEEE; width: 80px; word-wrap:break-word;'";
$content_pp = "style='width: 100px; word-wrap:break-word;'";
$header_keterangan = "style='text-align: center; background-color: #0993D3; color: #FFFFFF; height: 30px; font-size: 12px;'";
?>

<table class='table table-bordered centerTable'>
    <tbody>
        <tr>
            <td rowspan='4'>&nbsp</td>
            <td align='center' <?= $header_pp ?> colspan='4'><strong>PERMINTAAN PEMBELIAN</strong></td>
            <td>Tanggal Dibuat: </td>
        </tr>
        <tr>
            <td align='center' <?= $header_pp ?> colspan='4'><strong>Nomor <?= $listPp[0]['PERMINTAAN_PEMBELIAN_KODE'] ?></strong></td>
            <td><strong><?= date_format(date_create($listPp[0]['PERMINTAAN_PEMBELIAN_TANGGAL']), "D, d M Y") ?></strong></td>
        </tr>
        <tr>
            <td align='center' <?= $header_pp ?> colspan='4'><strong>RAB <?= $listPp[0]['RAB_KODE'] ?></strong></td>
            <td>Tanggal Divalidasi: </td>
        </tr>
        <tr>
            <td align='center' <?= $header_pp ?> colspan='4'><strong>Proyek <?= $listPp[0]['PROJECT_NAMA'] ?></strong></td>
            <td><strong><?= ((intval($listPp[0]['STATUS_PP_ID']) == 3) ? date_format(date_create($listPp[0]['PERMINTAAN_PEMBELIAN_VALIDATED']), "D, d M Y") : $listPp[0]['STATUS_PP_NAMA']) ?></strong></td>
        </tr>
        <?php
        $subconHead = 0;
        $materialHead = 0;
        for ($i = 0; $i < sizeof($listMaterial); $i++):
            if (trim($listMaterial[$i]['SUBCON_ID']) !== '') {
                if ($subconHead == 0) {
                    ?>
                    <tr>
                        <td class='headerDetail'><strong>No</strong></td>
                        <td class='headerDetail'><strong>Kode Subcon</strong></td>
                        <td class='headerDetail' colspan='2'><strong>Nama Subcon</strong></td>
                        <td class='headerDetail'><strong>Volume PP</strong></td>
                        <td class='headerDetail'><strong>Satuan</strong></td>
                    </tr>
                    <?php
                    $subconHead = 1;
                }
                ?>
                <tr>
                    <td><?= ($i + 1) ?></td>
                    <td><?= $listMaterial[$i]['BARANG_KODE'] ?></td>
                    <td colspan='2'><?= $listMaterial[$i]['BARANG_NAMA'] ?></td>
                    <td><?= $listMaterial[$i]['VOLUME_PP'] ?></td>
                    <td><?= $listMaterial[$i]['SATUAN_NAMA'] ?></td>
                </tr> 
                <?php
            } else if (trim($listMaterial[$i]['BARANG_ID']) !== '') {
                if ($materialHead == 0) {
                    ?>
                    <tr>
                        <td class='headerDetail'><strong>No</strong></td>
                        <td class='headerDetail'><strong>Kode Barang</strong></td>
                        <td class='headerDetail'><strong>Nama Barang</strong></td>
                        <td class='headerDetail'><strong>Volume PP</strong></td>
                        <td class='headerDetail'><strong>Satuan</strong></td>
                        <td class='headerDetail'><strong>Gudang</strong></td>
                    </tr> 
                    <?php
                    $materialHead = 1;
                }
                ?>
                <tr>
                    <td><?= ($i + 1) ?></td>
                    <td><?= $listMaterial[$i]['BARANG_KODE'] ?></td>
                    <td><?= $listMaterial[$i]['BARANG_NAMA'] ?></td>
                    <td><?= $listMaterial[$i]['VOLUME_PP'] ?></td>
                    <td><?= $listMaterial[$i]['SATUAN_NAMA'] ?></td>
                    <td><?= $listMaterial[$i]['GUDANG_NAMA'] ?></td>
                </tr>
                <?php
            }
        endfor;
        ?>
        <tr><td colspan='6' style='height: 200px'>&nbsp;</td></tr>
        <tr>
            <td rowspan='3'>&nbsp;</td>
            <td>Dibuat oleh:</td>
            <td rowspan='3'colspan='2'>&nbsp;</td>
            <td>Divalidasi oleh:</td>
            <td rowspan='3'>&nbsp;</td>
        </tr>
        <tr>
            <td style='height: 100px'>&nbsp;</td>
            <td style='height: 100px'>&nbsp;</td>
        </tr>
        <tr>
            <td><strong><?= $listPp[0]['PETUGAS_NAMA'] ?></strong></td>
            <td><strong><?= ((intval($listPp[0]['STATUS_PP_ID']) == 3) ? $listPp[0]['VALIDATOR_NAMA'] : 'N/A') ?></strong></td>
        </tr>
    </tbody>
</table>



