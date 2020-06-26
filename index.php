<?php
/**
* @Author: Dhiraj
* @Date:   2020-06-25 14:27:58
* @Last Modified by:   Dhiraj
* @Last Modified time: 2020-06-25 18:47:07
*/
require 'controller/fetchData.php';
session_start();
print_r(isset($_SESSION['message']) ? $_SESSION['message'] : '');
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<title>Call Break Counter</title>
	</head>
	<body style="background-color: #1c313a">
		<div class="container-fluid">
			<h6 class="text-center text-white">Call Break Counter</h6>
			<div class="row justify-content-md-center">
				<div class="table-responsive">
					<table class="table table-bordered table-striped text-white" id="table">
						<thead class="thead-dark">
							<tr>
								<th>#</th>
								<th <?php if ($getCount['count'] == 1 || $getCount['count'] == 9) {
										echo "class='bg-success'";
									} ?>>
									Player 1
								</th>
								<th <?php if ($getCount['count'] == 3) {
										echo "class='bg-success'";
									} ?>>
									Player 2
								</th>
								<th <?php if ($getCount['count'] == 5) {
										echo "class='bg-success'";
									} ?>>
									Player 3
								</th>
								<th <?php if ($getCount['count'] == 7) {
										echo "class='bg-success'";
									} ?>>
									Player 4
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (count($data)) {
								$i = 1;
								foreach ($data as $key) {
							?>
							<tr>
								<th><?php echo $i++; ?></th>
								<td <?php if ($key['p1ot'] == 0 && $key['p1ot'] != null) {
													echo "class='bg-danger'";
									} ?>>
									<?php echo $key['player1']; ?>.<?php echo $key['p1ot']; ?>
								</td>
								<td <?php if ($key['p2ot'] == 0 && $key['p2ot'] != null) {
													echo "class='bg-danger'";
									} ?>>
									<?php echo $key['player2']; ?>.<?php echo $key['p2ot']; ?>
								</td>
								<td <?php if ($key['p3ot'] == 0 && $key['p3ot'] != null) {
													echo "class='bg-danger'";
									} ?>>
									<?php echo $key['player3']; ?>.<?php echo $key['p3ot']; ?>
								</td>
								<td <?php if ($key['p4ot'] == 0 && $key['p4ot'] != null) {
													echo "class='bg-danger'";
									} ?>>
									<?php echo $key['player4']; ?>.<?php echo $key['p4ot']; ?>
								</td>
							</tr>
							<?php
							}
							}
							if ($getCount['count'] >= 9) {
								?>
							<tr class='bg-success'>
								<th>Tot</th>
								<th>
									<?php print_r(array_sum(array_column($data, 'player1'))); ?>.<?php print_r(array_sum(array_column($data, 'p1ot'))); ?>
										
									</th>
								<th>
									<?php print_r(array_sum(array_column($data, 'player2'))); ?>.<?php print_r(array_sum(array_column($data, 'p2ot'))); ?>
								</th>
								<th>
									<?php print_r(array_sum(array_column($data, 'player3'))); ?>.<?php print_r(array_sum(array_column($data, 'p3ot'))); ?>
								</th>
								<th>
									<?php print_r(array_sum(array_column($data, 'player4'))); ?>.<?php print_r(array_sum(array_column($data, 'p4ot'))); ?>
								</th>
							</tr>
							<?php
							}
							?>
							<form action="calculate.php" method="POST">
								<tr>
									<th>Bid</th>
									<?php
									for ($i=1; $i < 5; $i++) {
									?>
									<th>
										<div class="input-group-lg">
											<select class="form-control" name="player<?php echo($i)?>">
												
												<?php
													if ($getCount['count'] % 2 == 0	) {
													echo '<option selected value="null">OK</option>';
													echo '<option value="0">NO POINT</option>';
												}
												for ($j=1; $j < 9; $j++) {
												?>
												<option value="<?php echo($j);?>"><?php echo($j);?></option>
												<?php
												}
												?>
											</select>
										</div>
									</th>
									<?php
									}
									?>
								</tr>
								<tr>
									<th colspan="5">
										<div class="btn-group btn-block">
											<input type="hidden" name="count" value="<?php echo $getCount['count']; ?>">
											<?php if ($getCount['count'] != 11) {
												echo '<button name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>';
										} ?>
											<a href="controller/truncate.php" class="btn btn-info">Reset</a>
										</div>
									</th>
								</tr>
							</form>
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
	</body>
</html>
<?php
// remove all session variables
session_unset();
// destroy the session
session_destroy();
?>