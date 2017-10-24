<!doctype html>
<html lang="en">
<head>
	<title>Regitra</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container-fluid">
		<div id="header" class="row">
			<h1>Regitra</h1>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2>Cars</h2>
                <div class="form-row">
                    <div class="col">
                        Filters: 
                    </div>
                    <div class="col">
                        <input class="form-control form-control-sm" type="text" id="search" placeholder="Search">
                    </div>
                    <div class="col">
                        <input class="btn btn-sm btn-dark" type="button" id="last5" value="Last 5">
                    </div>
                    <div class="col">
                        <select class="form-control form-control-sm" id="filter">
                            <option value="bmw">BMW</option>
                        </select>
                    </div>                    
                </div>
				<table class="table table-sm">
					<thead>
						<th>Id</th><th>Owner</th><th>Make</th><th>Model</th><th>License</th><th>Date</th>
					</thead>
					<tbody id="cars">
					</tbody>
				</table>
			</div>
			<div class="col-md-4">
				<h2>Register</h2>
				<div id="alert"></div>
				<div class="input-group">
					<input id="owner" class="form-control form-control-sm" type="text" placeholder="Owner">
				</div>
				<div class="input-group">
					<input id="make" class="form-control form-control-sm" type="text" placeholder="Make">
				</div>
				<div class="input-group">
					<input id="model" class="form-control form-control-sm" type="email" placeholder="Model">
				</div>
				<div class="input-group">
					<input  id="license" class="form-control form-control-sm" type="text" placeholder="License">
				</div>
				<div class="input-group">
					<input id="add" class="btn btn-warning btn-sm" type="button" value="Add">
				</div>
			</div>
		</div>
	</div>
<script src="app.js"></script>
</body>
</html>