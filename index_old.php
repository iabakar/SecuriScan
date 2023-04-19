<!DOCTYPE html>
<html>
<head>
	<title>Search </title>
	<!-- Add Bootstrap stylesheet -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
	<div class="row" id="search">
		<form id="search-form"action="search.php" method="get" enctype="multipart/form-data">
			<div class="form-group col-xs-4">
				<input class="form-control" name="search" id="search"  type="text" placeholder="Search" />
			</div>

	<div class="row" id="filter">
		
			<div class="form-group col-sm-2 col-xs-2">
				<select id="date" name="date" class="form-control">
					<option value="">Select Date Range</option>
					<option value="today">Today</option>
					<option value="this_week">This Week</option>
					<option value="this_month">This Month</option>
					<option value="this_year">This Year</option>
				</select>
			</div>
			<div class="form-group col-sm-2 col-xs-2">
			<select id="port_os" name="port_os" class="form-control">
				<option value="">Select Port/OS</option>
					<option value="port_80">Port 80</option>
					<option value="port_443">Port 443</option>
					<option value="windows_os">Windows OS</option>
					<option value="linux_os">Linux OS</option>
				</select>
			</div>
	

			<div class="form-group col-xs-2">
				<button type="submit" class="btn btn-block btn-primary">Search</button>
			</div>
		</form>
	</div>
</div>
	<!-- Add Bootstrap script -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
