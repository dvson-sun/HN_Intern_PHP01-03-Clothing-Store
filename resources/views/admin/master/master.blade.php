<!DOCTYPE html>
<html>

<head>
	@include('admin.master.layouts.head')
</head>

<body>
	@include('admin.master.layouts.header')
	<div class="row">
		<div class="col-2">
			@include('admin.master.layouts.sidebar')
		</div>
		<div class="col-10">
			@yield('content')
		</div>
	</div>
</body>

</html>
