<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Stock In</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">History Stock In</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="float-sm-right">
                    <a href="<?= site_url('in/add') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"> Add Stock In</i></a>
                </div>
            </div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>">
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No.</th>
                            <th>Barcode</th>
                            <th>Item Name</th>
                            <th>Detail</th>
                            <th>Qty</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($stock as $s) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $s->barcode; ?></td>
                                <td><?= $s->item_name ?></td>
                                <td><?= $s->detail; ?></td>
                                <td style="text-align: right;"><?= $s->qty ?></td>
                                <td style="text-align: center;"><?= indo_date($s->date) ?></td>
                                <td align="center">
                                    <a class="btn btn-default btn-sm" id="select-detail" data-toggle="modal" data-target="#modal-detail" data-barcode="<?= $s->barcode; ?>" data-itemname=" <?= $s->item_name; ?>" data-suppliername="<?= $s->supplier_name; ?>" data-qty="<?= $s->qty; ?>" data-date="<?= indo_date($s->date); ?>"><i class=" fa fa-eye"></i>
                                    </a>
                                    <form action="<?= site_url('stock/stock_in_del') ?>" method="post" class="d-inline">
                                        <input type="hidden" name="stock_id" value="<?= $s->stock_id; ?>">
                                        <input type="hidden" name="item_id" value="<?= $s->item_id; ?>">
                                        <button class="btn btn-danger btn-sm tombol-hapus" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-detail">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Stock</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <div class="container-fluid">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Barcode</th>
                                <td>:</td>
                                <td>
                                    <span id="barcode">&nbsp;</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Item Name</th>
                                <td>:</td>
                                <td>
                                    <span id="item_name">&nbsp;</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Supplier</th>
                                <td>:</td>
                                <td>
                                    <span id="supplier">&nbsp;</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Qty</th>
                                <td>:</td>
                                <td>
                                    <span id="qty">&nbsp;</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Date </th>
                                <td>:</td>
                                <td>
                                    <span id="date">&nbsp;</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '#select-detail', function() {
            var item_id = $(this).data('id');
            var barcode = $(this).data('barcode');
            var itemname = $(this).data('itemname');
            var suppliername = $(this).data('suppliername');
            var qty = $(this).data('qty');
            var date = $(this).data('date');
            $('#item_id').val(item_id);
            $('#barcode').text(barcode);
            $('#item_name').text(itemname);
            $('#supplier').text(suppliername);
            $('#qty').text(qty);
            $('#date').text(date);
            $('#modal-item').modal('hide');
        })
    });
</script>