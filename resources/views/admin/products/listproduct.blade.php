@extends('admin.master.master')
@section('title', 'Danh sách sản phẩm')
@section('content')
<!--main-->
<div class="main">
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<div class="alert bg-success" role="alert">
								<svg class="glyph stroked checkmark">
									<use xlink:href="#stroked-checkmark"></use>
								</svg>{{ __('Add Success') }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
							</div>
							<a href="addproduct.html" class="btn btn-primary">{{ __('Add Product') }}</a>
							<table class="table table-bordered" style="margin-top:20px;">
								<thead>
									<tr class="bg-primary">
										<th>{{ __('STT') }}</th>
										<th>{{ __('Product') }}</th>
										<th>{{ __('Price') }}</th>
										<th>{{ __('Status') }}</th>
										<th>{{ __('Category')}}</th>
										<th width='18%'>{{ __('Action') }}</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>
											<div class="row">
												<div class="col-md-3"><img src="img/ao-khoac.jpg" alt="Áo đẹp" width="100px" class="thumbnail"></div>
												<div class="col-md-9">
													<p><strong>{{ __('Code') }}: SP01</strong></p>
													<p>{{ __('Name') }}: Áo Khoác Bomber Nỉ Xanh Lá Cây AK179</p>
												</div>
											</div>
										</td>
										<td> 500.000 VND</td>
										<td>
											<a class="btn btn-success" href="#" role="button">{{ __('Stocking') }}</a>
										</td>
										<td>{{ __('Man Jacket') }}</td>
										<td>
											<a href="#" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Edit') }}</a>
											<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> {{ __('Delete') }}</a>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>
											<div class="row">
												<div class="col-md-3"><img src="img/ao-khoac.jpg" alt="Áo đẹp" width="100px" class="thumbnail"></div>
												<div class="col-md-9">
													<p><strong>{{ __('Code') }}: SP01</strong></p>
													<p>{{ __('Name') }}: Áo Khoác Bomber Nỉ Xanh Lá Cây AK179</p>
												</div>
											</div>
										</td>
										<td> 500.000 VND</td>
										<td>
											<a class="btn btn-success" href="#" role="button">{{ __('Stocking') }}</a>
										</td>
										<td>{{ __('Man Jacket') }}</td>
										<td>
											<a href="#" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Edit') }}</a>
											<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> {{ __('Delete') }}</a>
										</td>
									</tr>
									<tr>
										<td>3</td>
										<td>
											<div class="row">
												<div class="col-md-3"><img src="img/ao-khoac.jpg" alt="Áo đẹp" width="100px" class="thumbnail"></div>
												<div class="col-md-9">
													<p><strong>{{ __('Code') }}: SP01</strong></p>
													<p>{{ __('Name') }}: Áo Khoác Bomber Nỉ Xanh Lá Cây AK179</p>
												</div>
											</div>
										</td>
										<td> 500.000 VND</td>
										<td>
											<a class="btn btn-success" href="#" role="button">{{ __('Stocking') }}</a>
										</td>
										<td>{{ __('Man Jacket') }}</td>
										<td>
											<a href="#" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Edit') }}</a>
											<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> {{ __('Delete') }}</a>
										</td>
									</tr>
									<tr>
										<td>4</td>
										<td>
											<div class="row">
												<div class="col-md-3"><img src="img/ao-khoac.jpg" alt="Áo đẹp" width="100px" class="thumbnail"></div>
												<div class="col-md-9">
													<p><strong>{{ __('Code') }}: SP01</strong></p>
													<p>{{ __('Name') }}: Áo Khoác Bomber Nỉ Xanh Lá Cây AK179</p>
												</div>
											</div>
										</td>
										<td> 500.000 VND</td>
										<td>
											<a class="btn btn-success" href="#" role="button">{{ __('Stocking') }}</a>
										</td>
										<td>{{ __('Man Jacket') }}</td>
										<td>
											<a href="#" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Edit') }}</a>
											<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> {{ __('Delete') }}</a>
										</td>
									</tr>
								</tbody>
							</table>
							<div align='right'>
								<ul class="pagination">
									<li class="page-item"><a class="page-link" href="#">{{ __('Previous')}}</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">{{ __('Next')}}</a></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>

				</div>
			</div>
			<!--/.row-->
		</div>
	</div>
</div>
@endsection
