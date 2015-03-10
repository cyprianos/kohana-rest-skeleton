<html>
<head>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" href="vendor/datatables/media/css/jquery.dataTables.css"> -->
	<link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="vendor/dynatable/jquery.dynatable.css"> -->
	<link rel="stylesheet" href="vendor/footable/css/footable.core.min.css">
	<!-- <link rel="stylesheet" href="vendor/footable/css/footable.standalone.min.css"> -->
</head>
<body>
	
<div class="container-fluid">
	<h1>Movie database</h1>
	<h2>A basic movie database as a practical test</h2>
	<table data-page-size="50" data-page-navigation=".pagination" class="footable table table-striped table-hover table-condensed" id="movieTable">
		<thead>
			<tr>
				<td colspan="5">
					<ul class="pagination paginatiom-sm"></ul>
				</td>
			</tr>
			<tr>
				<th>Title</th>
				<th data-hide="phone">Year</th>
				<th data-hide="phone,tablet">Rating</th>
				<th data-hide="phone,tablet">Last Ip</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
		<tfoot class="hide-if-no-paging">
			<tr>
				<td colspan="5">
					<ul class="pagination paginatiom-sm"></ul>
				</td>
			</tr>
		</tfoot>
	</table>
</div>
	<script type="text/javascript" src="vendor/handlebars/handlebars.min.js"></script>
	<script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="vendor/footable/dist/footable.all.min.js"></script>

	<script type="text/javascript" src="ass/js/app.js"></script>
	<script id="movieRow" type="text/x-handlebars-template">
	{{#each this}}
		<tr><td>{{id}}. {{title}}</td><td>{{year}}</td><td>rating</td><td>ip</td></tr>
	{{/each}}
	</script>
	</body>
</html>