<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Stock In</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Stock In</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    Add Stock In
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="<?= site_url('item/proccess'); ?>" method="post">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Date <font color="#f00">*</font></label>
                                <input type="date" name="date" class="form-control" value="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="form-group">
                                <label for="barcode" class="col-form-label">Barcode <font color="#f00">*</font></label>
                                <div class="input-group">
                                    <input type="hidden" name="item_id" id="item_id">
                                    <input type="text" name="barcode" id="barcode" class="form-control" aria-describedby="basic" autofocus>
                                    <div class="input-group-append">
                                        <span>
                                            <button type="button" class="input-group-text btn btn-info btn-flat form-control" data-toggle="modal" data-target="#modal-item"><i class="fa fa-search" id="basic"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="item_name" class="col-form-label">Item Name <font color="#f00">*</font></label>
                                <input type="text" name="item_name" id="item_name" class="form-control" autofocus readonly>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="unit_item">Item Unit</label>
                                        <input type="text" name="unit_name" id="unit_name" class="form-control" value="-" readonly autofocus>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="stock">Initial Stock</label>
                                        <input type="text" name="stock" id="stock" class="form-control" value="-" readonly autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="detail" class="col-form-label">Detail <font color="#f00">*</font></label>
                                <input type="text" name="detail" id="detail" class="form-control" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="supplier" class="col-form-label">Supplier</label>
                                <select name="supplier" id="supplier" class="form-control" autofocus>
                                    <option value="" selected>--Pilih--</option>
                                    <?php foreach ($supplier as $s) { ?>
                                        <option value="<?= $s->supplier_id; ?>"><?= $s->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="qty" class="col-form-label">Qty <font color="#f00">*</font></label>
                                <input type="number" name="qty" id="qty" class="form-control" autofocus>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-flat" type="submit" name="in_add"><i class="fa fa-paper-plane"></i> Save</button>
                                <button type="reset" class="btn btn-default btn-flat">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>