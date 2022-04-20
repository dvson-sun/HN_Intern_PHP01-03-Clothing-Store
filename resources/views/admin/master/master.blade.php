<!DOCTYPE html>
<html>
@include("admin/master/layouts/head")

<body>
	<!-- header -->
	@include("admin/master/layouts/header")
	<!-- sidebar left-->
	@include("admin/master/layouts/sidebar")
	<!--/. end sidebar left-->
	@yield("main");
</body>

</html>
