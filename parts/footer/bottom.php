<!-- 
#bottom:
.white-background
.light-background
.dark-background
-->

<section id="bottom" class="<?php the_field('option_footer_background', 'option'); ?>">
	
	<div class="wrap">
		
		<div class="footer-widget footer-navigation">
			
			<h3><?php echo ecs_get_theme_menu_name('footer-menu-1'); ?></h3>
			
	        <?php wp_nav_menu(array(
	          'theme_location' => 'footer-menu-1',
	          'depth'          => 1,
	          'container'      => ''
	        )); ?>

		</div>

		<?php if( !get_field('third_adress_cond', 'options') ): ?>

			<div class="footer-widget footer-navigation">
				
				<h3><?php echo ecs_get_theme_menu_name('footer-menu-2'); ?></h3>
				
		        <?php wp_nav_menu(array(
		          'theme_location' => 'footer-menu-2',
		          'depth'          => 1,
		          'container'      => ''
		        )); ?>

			</div>

		<?php else: ?>

			<div class="footer-widget">
			
				<h3><?php the_field('option_address_3_title', 'option'); ?></h3>
				
				<ul class="contact-information">
					<li>
						<?php the_field('option_address_3', 'option'); ?>
					</li>
					<li>
						<?php the_field('option_postalcode_3', 'option'); ?> <?php the_field('option_city_3', 'option'); ?>
					</li>
					<?php if( get_field( 'option_phone_3', 'options' ) ): ?>
						<li>
							T: <a href="tel:<?php echo str_replace(" ", "", get_field('option_phone_3', 'options')); ?>"><?php the_field('option_phone_3', 'option'); ?></a>
						</li>
					<?php endif; ?>
					<?php if( get_field( 'option_email_3', 'options' ) ): ?>
						<li>
							E: <a href="mailto:<?php echo antispambot( get_field( 'option_email_3', 'options' ), 1 ); ?>"><?php echo antispambot( get_field( 'option_email_3', 'options' ) ); ?></a>
						</li>
					<?php endif; ?>
				</ul>

			</div>

		<?php endif; ?>

		<?php if( !get_field('second_adress_cond', 'options') ): ?>

			<div class="footer-widget footer-navigation">
				
				<h3><?php echo ecs_get_theme_menu_name('footer-menu-3'); ?></h3>
				
		        <?php wp_nav_menu(array(
		          'theme_location' => 'footer-menu-2',
		          'depth'          => 1,
		          'container'      => ''
		        )); ?>
				
			</div>

		<?php else: ?>

			<div class="footer-widget">
			
				<h3><?php the_field('option_address_2_title', 'option'); ?></h3>
				
				<ul class="contact-information">
					<li>
						<?php the_field('option_address_2', 'option'); ?>
					</li>
					<li>
						<?php the_field('option_postalcode_2', 'option'); ?> <?php the_field('option_city_2', 'option'); ?>
					</li>
					<?php if( get_field( 'option_phone_2', 'options' ) ): ?>
						<li>
							T: <a href="tel:<?php echo str_replace(" ", "", get_field('option_phone_2', 'options')); ?>"><?php the_field('option_phone_2', 'option'); ?></a>
						</li>
					<?php endif; ?>
					<?php if( get_field( 'option_email_2', 'options' ) ): ?>
						<li>
							E: <a href="mailto:<?php echo antispambot( get_field( 'option_email_2', 'options' ), 1 ); ?>"><?php echo antispambot( get_field( 'option_email_2', 'options' ) ); ?></a>
						</li>
					<?php endif; ?>
				</ul>

			</div>

		<?php endif; ?>

		<div class="footer-widget last">
			
			<h3><?php the_field('option_address_title', 'option'); ?></h3>
			
			<ul class="contact-information">
				<li>
					<?php the_field('option_address', 'option'); ?>
				</li>
				<li>
					<?php the_field('option_postalcode', 'option'); ?> <?php the_field('option_city', 'option'); ?>
				</li>
				<?php if( get_field( 'option_phone', 'options' ) ): ?>
					<li>
						T: <a href="tel:<?php echo str_replace(" ", "", get_field('option_phone', 'options')); ?>"><?php the_field('option_phone', 'option'); ?></a>
					</li>
				<?php endif; ?>
				<?php if( get_field( 'option_email', 'options' ) ): ?>
					<li>
						E: <a href="mailto:<?php echo antispambot( get_field( 'option_email', 'options' ), 1 ); ?>"><?php echo antispambot( get_field( 'option_email', 'options' ) ); ?></a>
					</li>
				<?php endif; ?>
			</ul>

		</div>

	</div>

</section><!-- #bottom -->