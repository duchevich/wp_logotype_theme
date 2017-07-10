 	<footer>
        <div class="container">
        	<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="footer-logo">
						<a href="#" class="logo-a">
							<h2 class="logo-h2"><?php echo get_option('logo'); ?></h2>
						</a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<a href="#" class="logo-a">
						<img class="footer-img" src="<?php echo get_template_directory_uri()?>/img/footer-logo.png" alt="">
					</a>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="header-phone">
						<p>Тел. <?php echo get_option('tel'); ?></p>
						<a href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal">Закажите звонок</a>
					</div>
				</div>
			</div>
        </div>
    </footer>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <?php wp_footer(); ?>
</body>
</html>