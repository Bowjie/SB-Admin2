<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script type="text/javascript" src="<?=base_url();?>sbadmin2/js/angular.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>sbadmin2/js/angular-route.min.js"></script>
</head>
<body ng-app="myApp">

	<a href="#/!">Book</a>
	<a href="#!contact">Contact Us</a>
	<a href="#!about">About Us</a>

<div ng-view></div>
<script type="text/javascript">
	var main = angular.module("myApp", ["ngRoute"]);

	main.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "<?=site_url('angularjs/book_controller');?>"

    })
    .when("/contact", {
        templateUrl : "<?=site_url('angularjs/contact_controller');?>"
    })
    .when("/about", {
        templateUrl : "<?=site_url('angularjs/about_controller');?>"
    });
});
</script>
</body>
</html>