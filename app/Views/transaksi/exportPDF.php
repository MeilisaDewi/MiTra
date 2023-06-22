<html>

    <head>
        <!-- Berisis CSS -->
        <style>
            .title{
                text-align: center;
                font-family: Arial, Helvetica, sans-serif;
            }

            .left{
                text-align: left;
            }

            .right{
                text-align: right;
            }

            .border-table{
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                text-align: center;
                font-size: 12px;
            }

            .border-table th{
                border: 1px solid #000;
                background-color: #e1e3e9;
                font-weight: bold;
            }

            .border-table td{
             border: 1px solid #000;        
            }
        </style>
    </head>

    <body>
        <main>
            <div class="title">
                <h1>LAPORAN TRANSAKSI</h1>
            </div>
            <div>
                <!-- Isi Laporan -->
                <table class="border-table">
                    <thead>
                        <tr>
                            <th width="10%">ID Transaksi</th>
                            <th width="20%">Nama Customer</th>
                            <th width="10%">Nama Mobil</th>
                            <th width="10%">Jenis Sewa</th>
                            <th width="10%">Mulai</th>
                            <th width="10%">Kembali</th>
                            <th width="10%">Status</th>
                            <th width="10%">Total</th>
                            <th width="10%">Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach($result as $value):?>
                            <tr>
                                <td width="10%"><?= $value['id_transaksi'] ?></td>
                                <td width="20%"><?=$value['name']?></td>
                                <td width="10%"><?= $value['nama'] ?></td>
                                <td width="10%"><?=$value['jenis_sewa']?></td>
                                <td width="10%"><?=$value['tgl_mulai'] ?></td>
                                <td width="10%"><?=$value['tgl_pengembalian'] ?></td>
                                <td width="10%"><?=$value['status_sewa'] ?></td>
                                <td width="10%"><?=$value['total_biaya'] ?></td>
                                <td width="10%"><?=$value['denda'] ?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <!-- -->
            </div>
        </main>
    </body>

</html>