<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qrcode Product <?= $item->barcode ?></title>
</head>

<body>
    <img src="uploads/qrcode/product-item-<?= $item->barcode ?>.png" style="width: 250px;margin-top:20px;">
    <?= '<b><h1>' . $item->barcode . '</h1></b>' ?>
</body>

</html>