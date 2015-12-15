<body>
	<div id="fill-form"></div>
	<div id="outer-wrap">
		<div id="header">
			<div id="header-container">
				<div id="mobile-step">
					<div class="row">
						<div class="step-sec">
							<img src="./img/step-1-act.png">
						</div>
						<div class="step-sec not-active">
							<img src="./img/step-2-not.png">
						</div>
						<div class="step-sec not-active">
							<img src="./img/step-3-not.png">
						</div>
					</div>
				</div>
			</div>
			<div id="bg-wrap">
				<img src="./img/header.jpg">
			</div>
		</div>
		<div id="content">
			<div id="content-container">
				<form method="post" runat="server" action="<?php echo htmlentities("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); ?>">
					<div class="row">
						<div class="form-bg-header">
							<img src="./img/form-bg-head.png">
						</div>
						<?php echo isset($name_error) ? $error_msg : ''; ?>
						<div class="row form-bg-body">
							<div class="col-3">
								<div class="form-title">
									Your Name*
								</div>
							</div>
							<div class="col-9">
								<div class="form-widget">
									<input name="name" type="text" value="<?php echo isset($name) ? $name : ''; ?>"/>
								</div>
							</div>
						</div>
						<div class="form-bg-footer">
							<img src="./img/form-bg-footer.png">
						</div>
					</div>
					<div class="row">
						<div class="form-bg-header">
							<img src="./img/form-bg-head.png">
						</div>
						<?php echo isset($partnerName_error) ? $error_msg : ''; ?>
						<div class="row form-bg-body">
							<div class="col-3">
								<div class="form-title">
									Exercise Partner's Name*
								</div>
							</div>
							<div class="col-9">
								<div class="form-widget">
									<input name="partnerName" type="text" value="<?php echo isset($partnerName) ? $partnerName : ''; ?>"/>
								</div>
							</div>
						</div>
						<div class="form-bg-footer">
							<img src="./img/form-bg-footer.png">
						</div>
					</div>
					<div class="row">
						<div class="form-bg-header">
							<img src="./img/form-bg-head.png">
						</div>
						<?php echo isset($age_error) ? $error_msg : ''; ?>
						<div class="row form-bg-body">
							<div class="col-3">
								<div class="form-title">
									Age*
								</div>
							</div>
							<div class="col-9">
								<div class="form-widget">
									<input maxlength="2" class="numberbox" name="age" type="text" value="<?php echo isset($age) ? $age : ''; ?>"/>
								</div>
							</div>
						</div>
						<div class="form-bg-footer">
							<img src="./img/form-bg-footer.png">
						</div>
					</div>
					<div class="row">
						<div class="form-bg-header">
							<img src="./img/form-bg-head.png">
						</div>
						<?php echo isset($emailAddress_error) ? $error_msg : ''; ?>
						<div class="row form-bg-body">
							<div class="col-3">
								<div class="form-title">
									Active E-mail Address*
								</div>
							</div>
							<div class="col-9">
								<div class="form-widget">
									<input name="emailAddress" type="text" value="<?php echo isset($emailAddress) ? $emailAddress : ''; ?>"/>
								</div>
							</div>
						</div>
						<div class="form-bg-footer">
							<img src="./img/form-bg-footer.png">
						</div>
					</div>
					<div class="row">
						<div class="form-bg-header">
							<img src="./img/form-bg-head.png">
						</div>
						<?php echo isset($phoneNumber_error) ? $error_msg : ''; ?>
						<div class="row form-bg-body">
							<div class="col-3">
								<div class="form-title">
									Phone Number*
								</div>
							</div>
							<div class="col-9">
								<div class="form-widget">
									<input class="numberbox" name="phoneNumber" type="text" value="<?php echo isset($phoneNumber) ? $phoneNumber : ''; ?>"/>
								</div>
							</div>
						</div>
						<div class="form-bg-footer">
							<img src="./img/form-bg-footer.png">
						</div>
					</div>
					<div class="row">
						<div class="form-bg-header">
							<img src="./img/form-bg-head.png">
						</div>
						<?php echo isset($address_error) || isset($city_error) ? $error_msg : ''; ?>
						<div class="row form-bg-body">
							<div class="col-3 pad-this-desktop">
								<div class="form-title">
									Address*
								</div>
							</div>
							<div class="col-9 pad-this-desktop">
								<div class="form-widget">
									<input name="address" type="text" value="<?php echo isset($address) ? $address : ''; ?>"/>
								</div>
							</div>
							<div class="col-3 pad-this-desktop">
								<div class="form-title">
									City*
								</div>
							</div>
							<div class="col-9 pad-this-desktop">
								<div class="form-widget">
									<input name="city" type="text" value="<?php echo isset($city) ? $city : ''; ?>"/>
								</div>
							</div>
							<div class="col-3">
								<div class="form-title">
									Country*
								</div>
							</div>
							<div class="col-9">
								<div class="form-widget">
									<div class="country-sec"><?php echo $visitor_country; ?></div>
									<input type="hidden" name="country" value="<?php echo $visitor_country; ?>"/>
								</div>
							</div>
						</div>
						<div class="form-bg-footer">
							<img src="./img/form-bg-footer.png">
						</div>
					</div>
					<div class="row">
						<div class="form-bg-header">
							<img src="./img/form-bg-head.png">
						</div>
						<?php echo isset($favouriteSport_error) ? $error_msg : ''; ?>
						<div class="row form-bg-body">
							<div class="col-3">
								<div class="form-title">
									Favourite Sport*
								</div>
							</div>
							<div class="col-9">
								<div class="form-widget">
									<input name="favouriteSport" type="text" value="<?php echo isset($favouriteSport) ? $favouriteSport : ''; ?>"/>
								</div>
							</div>
						</div>
						<div class="form-bg-footer">
							<img src="./img/form-bg-footer.png">
						</div>
					</div>
					<div class="row">
						<div class="form-bg-header">
							<img src="./img/form-bg-head.png">
						</div>
						<?php echo isset($reason_error) ? $error_msg : ''; ?>
						<div class="row form-bg-body">
							<div class="col-3">
								<div class="form-title reason-height">
									<span>I like/want to try this sport because... *</br>(Max. 150 Characters)</span>
								</div>
							</div>
							<div class="col-9">
								<div class="form-widget">
									<textarea maxlength="150" name="reason"><?php echo isset($reason) ? $reason : ''; ?></textarea>
								</div>
							</div>
						</div>
						<div class="form-bg-footer">
							<img src="./img/form-bg-footer.png">
						</div>
					</div>
					<div class="row">
						<div class="col-6 require">
							<img src="./img/require.png">
						</div>
						<div class="col-6 submit">
							<input type="submit" class="next" value=""/>
						</div>
					</div>
					<input type="hidden" name="step" value="<?php echo $step; ?>"/>
				</form>
			</div>
		</div>
		<div id="footer">
			<div id="footer-bg-wrap">
				<img src="./img/footer.jpg">
			</div>
		</div>
	</div>
</body>