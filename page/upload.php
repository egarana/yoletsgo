<body>
	<div id="outer-wrap">
		<div id="header">
			<div id="header-container">
				<div id="mobile-step">
					<div class="row">
						<div class="step-sec not-active">
							<img src="./img/step-1-not.png">
						</div>
						<div class="step-sec">
							<img src="./img/step-2-act.png">
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
				<form enctype="multipart/form-data" method="post" runat="server" action="<?php echo htmlentities("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); ?>">
					<input type="hidden" name="name" value="<?php echo isset($name) ? $name : ''; ?>">
					<input type="hidden" name="partnerName" value="<?php echo isset($partnerName) ? $partnerName : ''; ?>">
					<input type="hidden" name="age" value="<?php echo isset($age) ? $age : ''; ?>">
					<input type="hidden" name="emailAddress" value="<?php echo isset($emailAddress) ? $emailAddress : ''; ?>">
					<input type="hidden" name="phoneNumber" value="<?php echo isset($phoneNumber) ? $phoneNumber : ''; ?>">
					<input type="hidden" name="address" value="<?php echo isset($address) ? $address : ''; ?>">
					<input type="hidden" name="city" value="<?php echo isset($city) ? $city : ''; ?>">
					<input type="hidden" name="country" value="<?php echo isset($country) ? $country : ''; ?>">
					<input type="hidden" name="favouriteSport" value="<?php echo isset($favouriteSport) ? $favouriteSport : ''; ?>">
					<input type="hidden" name="reason" value="<?php echo isset($reason) ? $reason : ''; ?>">
					<div class="row">
						<div class="form-bg-header">
							<img src="./img/form-bg-head.png">
						</div>
						<div class="row form-bg-body" style="position:relative;">
							<div id="prev-frame" class="arrow">

							</div>
							<div id="next-frame" class="arrow">
								
							</div>	
							<div id="frame-carousel">
								<div data-frame="frame-1" class="frame-container">
									<img src="./img/frame-1-thumb.png">
								</div>
								<div data-frame="frame-2" class="frame-container">
									<img src="./img/frame-2-thumb.png">
								</div>
								<div data-frame="frame-3" class="frame-container">
									<img src="./img/frame-3-thumb.png">
								</div>
								<div data-frame="frame-4" class="frame-container">
									<img src="./img/frame-4-thumb.png">
								</div>
							</div>
							<input type="hidden" name="frameSelect" id="the-frame" value="frame-1" />
						</div>
						<div class="form-bg-footer">
							<img src="./img/form-bg-footer.png">
						</div>
					</div>
					<div class="row">
						<div class="form-bg-header">
							<img src="./img/form-bg-head.png">
						</div>
						<?php echo isset($photo_error) ? $error_msg : ''; ?>
						<div class="row form-bg-body">
							<div id="img-form">
								<div id="frame-1" class="frame-hero active">
									<img src="./img/frame-1-prev.png" />
								</div>
								<div id="frame-2" class="frame-hero">
									<img src="./img/frame-2-prev.png" />
								</div>
								<div id="frame-3" class="frame-hero">
									<img src="./img/frame-3-prev.png" />
								</div>
								<div id="frame-4" class="frame-hero">
									<img src="./img/frame-4-prev.png" />
								</div>
								<div id="img-preview">
									<img id="blah" src="./img/no-photo.jpg" alt="" />
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
						<div class="row form-bg-body">
							<input name="photo" type='file' id="imgInp" />
						</div>
						<div class="form-bg-footer">
							<img src="./img/form-bg-footer.png">
						</div>
					</div>
					<div class="row">
						<div class="form-bg-header">
							<img src="./img/form-bg-head.png">
						</div>
						<?php echo isset($agreement_error) ? $error_agree_msg : ''; ?>
						<div class="row form-bg-body">
							<div class="form-title form-widget agreement">
								<input type="checkbox" name="agreement" value="1" /> 
								<span>I agree to the term &amp; conditions</span>
							</div>
						</div>
						<div class="form-bg-footer" style="margin-bottom:0;">
							<img src="./img/form-bg-footer.png">
						</div>
					</div>
					<div class="row">
						<div class="col-6 require" style="height:10px;"></div>
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
	<link rel="stylesheet" type="text/css" href="js/plugin/owl.carousel.css" />
	<script type="text/javascript" src="js/plugin/owl.carousel.js"></script>
	<script type="text/javascript" src="js/plugin/custom_file.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.frame-container').off().on('click', function(){
				$('.frame-hero').removeClass('active');
				var frameID = $(this).attr('data-frame');
				$('#' + frameID).addClass('active');
				$('#the-frame').val(frameID);
			})
			$("#frame-carousel").owlCarousel({
				responsive:{
			        0:{
			            items:2
			        },
			        975:{
			            items:3,
			        }
			    }
			});
			$('#next-frame').click(function() {
			    $("#frame-carousel").trigger('next.owl.carousel');
			})
			$('#prev-frame').click(function() {
			    $("#frame-carousel").trigger('prev.owl.carousel');
			})
			/*	IMG PREVIEW 	*/
			function readURL(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		            
		            reader.onload = function (e) {
		                $('#blah').attr('src', e.target.result);
		            }
		            
		            reader.readAsDataURL(input.files[0]);
		        }
		    }
		    $("#imgInp").change(function(){
		        readURL(this);
		    });
		    /*	IMG PREVIEW 	*/
		});
	</script>
</body>