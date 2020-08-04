<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Dashboard</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- Info boxes -->
		<div class="berhasil-login" data-flashdata="<?= $this->session->flashdata('pesan') ?>">
		</div>
		<div class="row">
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box">
					<span class="info-box-icon bg-info elevation-1"><i class="fas fa-th"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Items</span>
						<span class="info-box-number"><?= COUNT($item) ?></span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-truck"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Suppliers</span>
						<span class="info-box-number"><?= COUNT($supplier) ?></span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->

			<!-- fix for small devices only -->
			<div class="clearfix hidden-md-up"></div>

			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Customers</span>
						<span class="info-box-number"><?= COUNT($customer); ?></span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<?php if ($this->fungsi->user_login()->level == 1) { ?>
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-plus"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Users</span>
							<span class="info-box-number"><?= COUNT($user); ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
			<?php } ?>
			<!-- /.col -->
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header border-0">
						<h3 class="card-title">Products In Demand</h3>
						<div class="card-tools">
							<a href="#" class="btn btn-tool btn-sm">
								<i class="fas fa-download"></i>
							</a>
							<a href="#" class="btn btn-tool btn-sm">
								<i class="fas fa-bars"></i>
							</a>
						</div>
					</div>
					<div class="card-body table-responsive p-0">
						<table class="table table-striped table-valign-middle">
							<thead>
								<tr>
									<th>Product</th>
									<th>Price</th>
									<th>Sales</th>
									<th style="text-align: center;">Detail</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($product as $p) { ?>
									<tr>
										<td>
											<img src="<?= base_url('/uploads/product/' . $p->gambar); ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
											<?= $p->name ?>
										</td>
										<td><?= indo_currency($p->price); ?></td>
										<td>
											<small class="text-success mr-1">
												<i class="fas fa-arrow-up"></i>
												12%
											</small>
											<?= $p->qty.' Item' ?> Sold
										</td>
										<td align="center">
											<a href="#" class="text-muted">
												<i class="fas fa-search"></i>
											</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>