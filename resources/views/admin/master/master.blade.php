<!DOCTYPE html>
<html>

<head>
	@include('admin.master.layouts.head')
</head>

<body>
	<div class="row">
		<div class="col-2">
			@include('admin.master.layouts.sidebar')
		</div>
		<div class="col-10">
			@include('admin.master.layouts.header')
			@yield('content')
		</div>
	</div>
</body>

</html>
