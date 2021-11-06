<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
<body class="margin-left:40px;" onload="window.print()">
    <table width="100%">
        <tr>
            <td width="34%" align="center">
            <h4>Laporan Transaksi Penjualan <br>
            Dari tanggal <?= $s; ?> sampai tanggal <?= $e; ?></h4></td>
        </tr>
    </table>
    <table width="100%" class="table" cellspacing="0" cellpading="0" style="font-size: 16px;" border="1">
        <thead style="background-color: yellowgreen;">
            <tr>
                <th>No</th>
                <th>Invoice</th>
                <th>Customer</th>
                <th>Harga</th>
                <th>Discount</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach($detailLaporan as $row) {?>
            <tr>
                <td style="text-align: center;"><?= $no++; ?></td>
                <td style="text-align: center;"><?= $row->invoice; ?></td>
                <?php if($row->customer_id == null){
                    $cust = 'Umum';
                }else{
                    $cust = $row->customer;
                }?>
                <td style="text-align: center;"><?= $cust; ?></td>
                <td style="text-align: right;"><?= indo_currency($row->total_price); ?></td>
                <td style="text-align: right;"><?= indo_currency($row->discount);?></td>
                <td style="text-align: right;"><?= indo_currency($row->final_price);?></td>
                <td style="text-align: center;"><?= $row->date?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    </body>
</html>