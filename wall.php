<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Page Title</title>
		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="css/wall-style.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</head>
	<body>
		<div id="outer-wrap">
			<div id="header">
				<div id="header-container">
					<div id="mobile-step">
						<div class="row">
							
						</div>
					</div>
				</div>
				<div id="bg-wrap">
					<img src="./img/wall-header.jpg">
				</div>
			</div>
			<div id="content">
				<div id="content-container">
					<div id="the-wall-wrap" class="row">
						<?php

							include "dbcrud.php";

							$db = new connect();

							$db->connect_it("yoletsgo");

							//$db->connect_it("db107123_yoletsgo");

							//$db->getdata("SELECT * FROM `user_table` ORDER BY `id` DESC");

							$rec_limit = 9;

							if(!isset($_GET['page'])){

								$page = 1;

							} else {

								$page = $_GET['page'];

							}

							$from = ($page * $rec_limit) - $rec_limit;


							$db->getdata("SELECT * FROM `user_table` ORDER BY `id` DESC LIMIT $from, $rec_limit");

							$total = mysql_num_rows($db->query_store);

							if($total > 0){

								while($db->showdata()){

									$reasonType = rand(1,3);

								?>

									<div class="col-4 col-m-6">
										<div class="wall-photo-container">
											<img src="./img/user/<?php echo $db->data[11].'.png'; ?>">
										</div>
										<div class="reason-bg-wrap">
											<div class="reason-bg reason-<?php echo $reasonType; ?>">
												<div class="block-reason">
													<div class="centered-reason">
														<?php echo $db->data[10]; ?>
													</div>
												</div>
											</div>
										</div>
									</div>

								<?php

								}

							} else {

							?>

							<div class="row" style="padding-bottom:20px;">
								<div class="form-bg-header">
									<img src="./img/form-bg-head.png">
								</div>
								<div class="row form-bg-body">
									<div style="height:100px; text-align:center; line-height:100px;">
										<span>Data is not available</span>
									</div>
								</div>
								<div class="form-bg-footer" style="margin-bottom:0;">
									<img src="./img/form-bg-footer.png">
								</div>
							</div>

							<?php

							}

						?>
					</div>
				</div>
				<div>
					<?php

						$db->getdata("SELECT COUNT(*) AS `num` FROM `user_table`");

						$db->showdata();

						$total_pages = ceil($db->data[0]/$rec_limit);

						for ($i = 1; $i <= $total_pages; $i++) { 
							
							echo '<a href="'.htmlentities("http://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]?page=$i").'">'.$i.'</a>';
							
						}

					?>
				</div>
			</div>
			<div id="footer">
				<div id="footer-bg-wrap">
					<img src="./img/wall-footer.jpg">
				</div>
			</div>
		</div>
	</body>
</html>