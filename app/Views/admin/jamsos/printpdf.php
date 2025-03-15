<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- My CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="<?= base_url() ?>/img/favicon.ico" type="image/gif">
</head>

<body>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <h1 class="mt-2 mb-4">Daftar Data Jaminan Sosial</h1>
            </div>
            <div class="col-md">
                <button onclick="window.print()" class="btn btn-outline-secondary shadow float-left print">Print <i class="fa fa-print"></i></button>
            </div>
            <div class="row">
                <div class="col">
                    <style>
                        @media print {
                            .print {
                                display: none;
                            }
                        }

                        table,
                        td,
                        th {
                            border: 1px solid #333;
                        }

                        table {
                            width: 100%;
                            border-collapse: collapse;
                        }

                        td,
                        th {
                            padding: 2px;
                        }

                        td.center {
                            text-align: center;
                        }

                        th {
                            background-color: #ccc;
                        }

                        @page {
                            margin: 10px;
                        }
                    </style>
                    <br>
                    <table>
                        <thead class="printpdf">
                            <tr>
                                <th class="center">No</th>
                                <th class="center">NPP</th>
                                <th>Nama Perusahaan</th>
                                <th class="center">Pembina</th>
                                <th class="center">Alamat</th>
                                <th class="center">Asal Kabupaten/Kota</th>
                                <th class="center">Skala</th>
                                <th class="center">Program</th>
                                <th class="center">Jumlah Tenaga Kerja</th>
                                <th class="center">Data Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($jamsos as $j => $value) : ?>
                                <tr>
                                    <td class="center"><?= $i++; ?></th>
                                    <td class="center"><?= $value->npp; ?></td>
                                    <td><?= $value->nama_perusahaan; ?></td>
                                    <td class="center"><?= $value->pembina; ?></td>
                                    <td><?= $value->alamat; ?></td>
                                    <td class="center"><?= $value->asal_kabupaten; ?></td>
                                    <td class="center"><?= $value->skala; ?></td>
                                    <td class="center"><?= $value->program; ?></td>
                                    <td class="center"><?= $value->jumlah_tk; ?></td>
                                    <td class="center"><?= $value->tahun; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</body>

</html>