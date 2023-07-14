		</main>
	</div>
	<footer>
		<div class="container">
			<div class="footer-widget">
				<div class="widget">
					<div class="widget-heading">
						<h3>Important Link</h3>
					</div>
					<div class="widget-content">
						<ul>
							<li><a href="<?php echo base_url('about') ?>">About</a></li>
							<li><a href="<?php echo base_url('contact') ?>">Contact</a></li>
							<li><a href="<?php echo base_url('refund') ?>">Refund Policy</a></li>
							<li><a href="<?php echo base_url('terms') ?>">Terms & Conditions</a></li>
						</ul>
					</div>
				</div>
				<div class="widget">
					<div class="widget-heading">
						<h3>Information</h3>
					</div>
					<div class="widget-content">
						<ul>
							<?php if (isLogged()): ?>
								<li><a href="<?php echo base_url('account') ?>">My Account</a></li>
								<li><a href="<?php echo base_url('orders') ?>">My Orders</a></li>
								<li><a href="<?php echo base_url('cart') ?>">Cart</a></li>
								<li><a href="<?php echo base_url('checkout') ?>">Checkout</a></li>
							<?php else: ?>
								<li><a href="<?php echo base_url('login') ?>">Login</a></li>
								<li><a href="<?php echo base_url('register') ?>">Register</a></li>
							<?php endif ?>
						</ul>
					</div>
				</div>
				<div class="widget">
					<div class="widget-heading">
						<h3>Follow us</h3>
					</div>
					<div class="widget-content">
						<div class="follow">
							<ul>
								<li>
									<a href="https://id-id.facebook.com/HMIF.AMIKOM/">
										<img src="<?php echo base_url('assets/img/icons/facebook.png') ?>">
									</a>
								</li>
								<li>
									<a href="https://twitter.com/hmif_amikom?lang=en">
										<img src="<?php echo base_url('assets/img/icons/twitter.png') ?>">
									</a>
								</li>
								<li>
									<a href="https://www.instagram.com/hmifamikom/">
										<img src="<?php echo base_url('assets/img/icons/instagram.png') ?>">
									</a>
								</li>
							</ul>
						</div>						
					</div>
					<div class="widget-heading">
						<h3>Subscribe for Newsletter</h3>
					</div>
					<div class="widget-content">
						<div class="subscribe">
							<form>
								<div class="form-group">
									<input type="text" class="form-control" name="subscribe" placeholder="Email">
									<img src="<?php echo base_url('assets/img/icons/paper_plane.png') ?>">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div> <!-- Footer Widget -->
			<div class="footer-bar">
				<div class="copyright-text">
					<p>Copyright 2021 - All Rights Reserved</p>
				</div>
				<div class="payment-mode">
					<img src="<?php echo base_url('assets/img/icons/paper_money.png') ?>">
					<img src="<?php echo base_url('assets/img/icons/visa.png') ?>">
					<img src="<?php echo base_url('assets/img/icons/mastercard.png') ?>">
				</div>
			</div> <!-- Footer Bar -->
		</div>
	</footer>

	<script>
	    $(document).ready(function() {
	    	$('.slider').bxSlider({ auto: true, autoControls: true, stopAutoOnClick: true, pager: true });

	    	$( function() {
			    $( "#slider-range" ).slider({
			    	range: true,
			    	min: 0,
			    	max: 500000,
			    	values: [ 10000, 150000 ],
			    	slide: function( event, ui ) {
			     		$("#amount").val("Rp." + ui.values[0] + " - Rp." + ui.values[ 1 ] );
			     	}
			    });
			    $( "#amount" ).val( "Rp." + $( "#slider-range" ).slider( "values", 0 ) + " - Rp." + $( "#slider-range" ).slider( "values", 1 ) );
			});
	    });
	</script>
</body>
</html>