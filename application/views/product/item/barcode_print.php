<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Product <?= $item->barcode ?></title>
</head>

<body>
    <?php
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($item->barcode, $generator::TYPE_CODE_128)) . '">';
    ?>
    <br>
    <?= '<b>' . $item->barcode . '</b>' ?>
</body>

</html>