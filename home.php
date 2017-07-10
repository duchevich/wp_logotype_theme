<?php 
/*Template Name: Главная*/
get_header(); ?>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo get_template_directory_uri()?>/img/close.png" alt=""></span></button>
			<h4 class="modal-title" id="myModalLabel">Оставьте заявку<br>и мы перезвоним Вам<br>в ближайшее время</h4>
		  </div>
		  <div class="modal-body">
		  <?php echo do_shortcode('[contact-form-7 id="83" title="modal-form"]') ?>
		  </div>
		</div>
	  </div>
	</div>
	<div class="modal fade" id="thanks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header thanks-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo get_template_directory_uri()?>/img/close.png" alt=""></span></button>
			<h4 class="modal-title" id="myModalLabel">Спасибо,<br>Ваша заявка принята!</h4>
		  </div>
		  <div class="thanks-line"></div>
		  <div class="modal-body">
			<p>Наш менеджер свяжется с Вами <br>в ближайшее время</p>
		  </div>
		</div>
	  </div>
	</div>
<? if(is_front_page()){?>
	<section class="section-main shadow-border" id="one" <?php if(get_post_meta($post->ID,'background-image',1)){?>style="background-image: url(<?php echo get_post_meta($post->ID,'background-image',1);?>);"<?php }?>>
		<div class="container">
			<h1><?php if(get_post_meta($post->ID,'h1',1)){ echo get_post_meta($post->ID,'h1',1);} ?></h1>
			<h2><?php if(get_post_meta($post->ID,'h2',1)){ echo get_post_meta($post->ID,'h2',1);} ?></h2>
			<div class="main-line"></div>
			<div class="messages"></div>
			<?php echo do_shortcode('[contact-form-7 id="4" title="Контактная форма 1"]') ?>
			
		</div>
	</section>
<?}?>
	<section class="section-after grey-bg shadow-border-bottom">
	  <div class="container">
		  <div class="row">
		<?php
			query_posts('post_type=second-screen&posts_per_page=6' );
			if (have_posts()) : while (have_posts()) : the_post();
				$image_id = get_post_thumbnail_id();
        		$image_url = wp_get_attachment_image_src($image_id,'full');
		?>
			  <div class="col-xs-12 col-md-1 no-padding">
				 <div class="icon icon1" style="background-image: url(<?php echo $image_url[0]; ?>);"></div>
			  </div>
			  <div class="col-xs-12 col-md-3 no-padding"><p><?php echo get_post_meta($post->ID,'description',1);?></p></div>
		<?php 
			endwhile;  
			endif; 
			wp_reset_query();
		?>
    
		  </div>
	  </div>
	</section>
	<section class="section-about" id="two">
	   <div class="container">
		   <h3><?php echo get_option('about-company'); ?></h3>
		   <div class="wrapp">
			   <div class="sign"></div>
		   </div>
			<div class="row">
				<div class="col-md-12 hidden-xs">
					<div id="carousel">
					<?php
						query_posts('post_type=about-company&posts_per_page=6' );
						if (have_posts()) : while (have_posts()) : the_post();
							$image_id = get_post_thumbnail_id();
			        		$image_url = wp_get_attachment_image_src($image_id,'full');
					?>
						  <a href="#"><img class="img-thumb" src="<?php echo $image_url[0]; ?>" id="item-<?=$image_id?>" /></a>
					<?php 
						endwhile;  
						endif; 
						wp_reset_query();
					?>  
					</div>
					<div class="navi">
						<a href="#" id="prev"><img src="<?php echo get_template_directory_uri()?>/img/left.png" alt="to left"></a>
						<a href="#" id="next"><img src="<?php echo get_template_directory_uri()?>/img/right.png" alt="to right"></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 hidden-sm hidden-md hidden-lg">
					<div class="slick-box">
					<?php
						query_posts('post_type=about-company&posts_per_page=6' );
						if (have_posts()) : while (have_posts()) : the_post();
							$image_id = get_post_thumbnail_id();
			        		$image_url = wp_get_attachment_image_src($image_id,'full');
					?>
						<div class="slick-item"><img src="<?php echo $image_url[0]; ?>" /></div>
					<?php 
						endwhile;  
						endif; 
						wp_reset_query();
					?>  
					</div>
				</div>
		   </div>
	   </div>
	</section>
	<section class="section-garanties grey-bg shadow-border" id="three">
	   <div class="container">
		   <h3><?php echo get_option('our-garanties'); ?></h3>
		   <div class="wrapp">
			   <div class="sign"></div>
		   </div>
		   <div class="row">
		   		<?php
					query_posts('post_type=garanties&posts_per_page=3' );
					if (have_posts()) : while (have_posts()) : the_post();
						$image_id = get_post_thumbnail_id();
		        		$image_url = wp_get_attachment_image_src($image_id,'full');
				?>
			   <div class="col-md-4">
				   <img class="gar-img" src="<?php echo $image_url[0]; ?>" alt="">
				   <h4><?php echo get_post_meta($post->ID,'title',1); ?></h4>
				   <p><?php echo get_post_meta($post->ID,'subtitle',1); ?></p>
				   <p><?php echo get_post_meta($post->ID,'text',1); ?></p>
			   </div>
			   <?php 
					endwhile;  
					endif; 
					wp_reset_query();
				?>  
		   </div>
	   </div>
	</section>
	<section class="section-whywe" id="four">
	   <div class="container">
		   <h3><?php echo get_option('why-we'); ?></h3>
		   <div class="wrapp">
			   <div class="sign"></div>
		   </div>
		   <?php
				query_posts('post_type=whywe&posts_per_page=5' );
				if (have_posts()) : while (have_posts()) : the_post();
			?>
		   <div class="whywe-block">
			   <div class="whywe-num <?php echo get_post_meta($post->ID,'img',1);?>"></div>
			   <div class="whywe-text">
				   <p><strong><?php echo get_post_meta($post->ID,'strong',1);?></strong><br>
				   <?php echo get_post_meta($post->ID,'text',1);?><br>
				   <em><?php echo get_post_meta($post->ID,'em',1);?></em></p>
				   <a href="">Подробнее</a>
			   </div>
		   </div>
		   <?php 
				endwhile;  
				endif; 
				wp_reset_query();
			?>  
	   </div>
	</section>
	<section class="section-calculator grey-bg shadow-border" id="five">
	   <div class="container">
		   <h3><?php echo get_option('calculator'); ?></h3>
		   <div class="wrapp">
			   <div class="sign"></div>
		   </div>
		   <form class="form-calc" action="">
			   <div class="form-box box1">
					<input type="text" name="enter" placeholder="Введите данные..." class="enter">
					<br>
					<input type="checkbox" id="c1" name="cc" class="chk" />
					<label for="c1" class="chk-label">Со всем согласен... <span></span></label>
			   </div>
			   <div class="form-box box2">
					<div class="slider-box">
						<div id="slider">
							<div id="custom-handle" class="ui-slider-handle"></div>
						</div>
					</div>
					<div class="persent">
						<p>1%</p>
						<p>100%</p>
					</div>
					<div class="slider-box">
						<div id="slider-range"></div>
					</div>
					<div class="persent">
						<p>1%</p>
						<p>100%</p>
					</div>
			   </div>
			   <div class="form-box box3">
			   		<p>Параметр 1</p>
				   <div class="checkbox-box">
						<input type="checkbox" class="checkbox" id="checkbox1" />
						<label for="checkbox1"></label>
				   </div>
				   <div class="on-off">
						<img src="<?php echo get_template_directory_uri()?>/img/off.png" alt="" class="off">
						<img src="<?php echo get_template_directory_uri()?>/img/on.png" alt="" class="on">
				   </div>
					<p>Параметр 2</p>
					<div class="checkbox-box">
						<input type="checkbox" class="checkbox" id="checkbox2" />
						<label for="checkbox2"></label>
				   </div>
				   <div class="on-off">
						<img src="<?php echo get_template_directory_uri()?>/img/off.png" alt="" class="off">
						<img src="<?php echo get_template_directory_uri()?>/img/on.png" alt="" class="on">
				   </div>
			   </div>
		   </form>
	   </div>
	</section>
	<section class="section-reviews" id="six">
	   <div class="container">
		   <h3><?php echo get_option('client-rewievs'); ?></h3>
		   <div class="wrapp">
			   <div class="sign"></div>
		   </div>
		   <div class="row">
				<?php
					query_posts('post_type=rewievs&posts_per_page=6' );
					if (have_posts()) : while (have_posts()) : the_post();
						$image_id = get_post_thumbnail_id();
		        		$image_url = wp_get_attachment_image_src($image_id,'full');
				?>
			   <div class="col-md-6">
				   <div class="rewievs-block">
					   <h4><?php echo get_post_meta($post->ID,'title',1);?></h4>
					   <hr>
					   <p><?php echo get_post_meta($post->ID,'rewiev',1);?></p>
						<div class="rewievs-photo">
							<p><strong><?php echo get_post_meta($post->ID,'whois',1);?></strong></p>
							<img src="<?php echo $image_url[0]; ?>" alt="">
						</div>
				   </div>
			   </div>
			   <?php 
					endwhile;  
					endif; 
					wp_reset_query();
				?>  
		   </div>
	   </div>
	</section>
	<section class="section-map hidden-xs">
       <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d945.6604511822644!2d37.68428596796373!3d55.68599258343388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x414ab4943221f6ed%3A0xf4322589681c125d!2z0K_QutC-0YDQvdCw0Y8g0YPQuy4sIDXQujEsINCc0L7RgdC60LLQsCwg0KDQvtGB0YHQuNGPLCAxMTU0MDc!3m2!1d55.686350999999995!2d37.684542!5e0!3m2!1sru!2sua!4v1498863773886" frameborder="0" style="border:0" allowfullscreen></iframe>
       <div class="map-box">
       		<h2 class="logo-h2"><?php echo get_option('logo'); ?></h2>
       		<div class="map-box-line"></div>
       		<p>Адрес: г. <?php echo get_option('city'); ?>,<br>ул. <?php echo get_option('street'); ?><br><br>тел.: <?php echo get_option('tel-office'); ?> <br>e-mail: <?php echo get_option('email'); ?></p>
       </div>
   </section>
<?php get_footer(); ?>
