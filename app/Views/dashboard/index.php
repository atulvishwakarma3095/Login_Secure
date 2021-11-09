<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap-select/bootstrap.min.css');?>">
	<title><?= $title?></title>
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top:40px">
			<div class="col-md-4">
				<h4><?= $title?></h4>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Username</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?=ucfirst($userInfo['fullname']);?></td>
							<td><?=$userInfo['username'];?></td>
							<td><a href="<?= base_url('auth/logout'); ?>">Logout</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>