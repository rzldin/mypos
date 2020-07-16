<?php $no = 1;
if ($cart->num_rows() > 0) {
    foreach ($cart->result() as $c) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $c->barcode; ?></td>
            <td><?= $c->item_name; ?></td>
            <td><?= $c->cart_price; ?></td>
            <td><?= $c->qty; ?></td>
            <td><?= $c->discount_item; ?></td>
            <td><?= $c->total; ?></td>
            <td class="text-center" width="160px">
                <button id="update_cart" data-toggle="modal" data-target="modal-item-edit" data-cartid="<?= $c->cart_id; ?>" data-barcode="<?= $c->barcode; ?>" data-product="<?= $c->item_name; ?>" data-price="<?= $c->cart_price; ?>" data-qty="<?= $c->qty; ?>" data-dicount="<?= $c->discount_item; ?>" data-total="<?= $c->total; ?>" class="btn btn-xs btn-primary">
                    <i class="fa fa-edit"></i>
                </button>
                <button id="del_cart" data-cartid="<?= $c->cart_id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
            </td>
        </tr>

<?php }
} else {
    echo '  <tr>
                <td colspan="9" class="text-center">Tidak ada item</td>
            </tr>';
} ?>