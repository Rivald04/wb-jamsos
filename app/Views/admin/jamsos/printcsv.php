<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename= Data Jamsos.xls");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="icon" href="<?= base_url() ?>/img/favicon.ico" type="image/gif">
</head>

<body>
    <table border="1">
        <thead class="printpdf">
            <tr>
                <th align="justify">No</th>
                <th align="justify">NPP</th>
                <th>Nama Perusahaan</th>
                <th align="justify">Pembina</th>
                <th align="justify">Alamat</th>
                <th align="justify">Asal Kabupaten/Kota</th>
                <th align="justify">Skala</th>
                <th align="justify">Program</th>
                <th align="justify">Jumlah Tenaga Kerja</th>
                <th align="justify">Data Tahun</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($jamsos as $j => $value) : ?>
                <tr>
                    <td align="justify"><?= $i++; ?></th>
                    <td align="justify"><?= $value->npp; ?></td>
                    <td><?= $value->nama_perusahaan; ?></td>
                    <td align="justify"><?= $value->pembina; ?></td>
                    <td><?= $value->alamat; ?></td>
                    <td align="justify"><?= $value->asal_kabupaten; ?></td>
                    <td align="justify"><?= $value->skala; ?></td>
                    <td align="justify"><?= $value->program; ?></td>
                    <td align="justify"><?= $value->jumlah_tk; ?></td>
                    <td align="justify"><?= $value->tahun; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>