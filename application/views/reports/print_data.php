<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
    <title>Laporan Invoice : <?= $report['invoice'] ?></title>
</head>

<body>
	<?php if($report['customer_name'] == null){ $cust = 'Umum'; }else{ $cust = $report['customer_name']; } ?>
	<?= '<b><h2 style="text-align: center;"> Laporan Invoice : ' . $report['invoice'] . '</h2></b>' ?>
	<?= '<br>' ?>
	<?= '<table>
	        <tr>
	            <th>Invoice</th>
	            <th>Name Costumer</th>
	            <th>Item Name</th>
	            <th>Price</th>
	            <th>Qty</th>
	            <th>Discount Item</th>
	            <th>Note</th>
	            <th>Date</th>
	        </tr>
	        <tr>
	            <td>'.$report['invoice'].'</td>
	            <td>'.$cust.'</td>
	            <td>'.$report['item_name'].'</td>
	            <td>'.indo_currency($report['price']).'</td>
	            <td>'.$report['qty'].'</td>
	            <td>'.indo_currency($report['discount']).'</td>
	            <td>'.$report['note'].'</td>
	            <td>'.indo_date($report['date']).'</td>
	        </tr>
	    </table>'; ?>

</body>

</html>