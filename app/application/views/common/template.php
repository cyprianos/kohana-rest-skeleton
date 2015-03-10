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
		<h2>Add new movie to database</h2>
		
		<form id="formMovie" class="form-horizontal">
			<div class="form-group">
				<label for="inputTitle" class="col-sm-2 control-label">Title</label>
				<div class="col-sm-10">
					<input minlength="3" required type="text" class="form-control" name="title" id="inputTitle" placeholder="Title">
				</div>
			</div>
			<div class="form-group">
				<label required for="inputYear" class="col-sm-2 control-label">Year</label>
				<div class="col-sm-10">
					<input minlength="4" required type="text" class="form-control" name="year" id="inputYear" placeholder="Year">
				</div>
			</div>
			<div class="form-group">
				<label required for="inputDescription" class="col-sm-2 control-label">Description</label>
				<div class="col-sm-10">
					<textarea id="inputDescription" name="description" required minlength="20" placeholder="Description" class="form-control" rows="3"></textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" id="addMovie" class="btn btn-default">Add</button>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="vendor/handlebars/handlebars.min.js"></script>
	<script type="text/javascript" src="vendor/jquery-validation//dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="vendor/footable/dist/footable.all.min.js"></script>

	<script type="text/javascript" src="ass/js/app.js"></script>
	
	<script id="movieRow" type="text/x-handlebars-template">
		<tr><td>{{id}}</td><td>{{title}}</td><td>{{year}}</td><td>rating</td><td class="text-right">{{ip}}</td><td>{{description}}</td></tr>
	</script>
	<script id="movieTable" type="text/x-handlebars-template">
		<h2>Recent Movies</h2>
		<table data-page-size="50" data-page-navigation=".pagination" class="footable table table-striped table-hover table-condensed" id="movieTable">
			<thead>
				<tr>
					<td colspan="5">
						<ul class="pagination paginatiom-sm"></ul>
					</td>
				</tr>
				<tr>
					
					<th data-hide="all">Id</th>
					<th>Title</th>
					<th data-hide="phone">Year</th>
					<th data-hide="phone,tablet">Rating</th>
					<th data-hide="phone,tablet">Ip</th>
					<th data-hide="all">Description</th>
				</tr>
			</thead>
			<tbody>
				{{#each this}}
					{{> movieRow }}
				{{/each}}
			</tbody>
			<tfoot class="hide-if-no-paging">
				<tr>
					<td colspan="5">
						<ul class="pagination paginatiom-sm"></ul>
					</td>
				</tr>
			</tfoot>
		</table>
	</script>
	</body>
</html>