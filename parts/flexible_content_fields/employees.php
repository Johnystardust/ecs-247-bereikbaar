<div id="staff">

	<?php if( have_rows('repeater-employees') ): ?>

		<?php $count = 0; ?>

		<?php while ( have_rows('repeater-employees') ) : the_row(); $count++; ?>

			<article class="staff-member<?php if($count % 2 == 0) echo ' last'; ?>">
				<figure class="member-photo">
					<?php echo wp_get_attachment_image( get_sub_field('image'), $size = 'employee-image' ); ?>
				</figure>
				<div class="member-text">
					<header class="member-title">
						<h3><?php the_sub_field('name'); ?></h3>
						<span class="member-role"><?php the_sub_field('function'); ?></span>
					</header>
					<?php the_sub_field('omschrijving'); ?>
					<footer class="member-contact">
						<ul class="contact-details">

							<?php if( get_sub_field('phonenumber') ): ?>

								<li class="phone-nubmer">
									<i class="fa fa-phone"></i>
									<?php the_sub_field('phonenumber'); ?>
								</li>

							<?php endif; ?>

							<?php if( get_sub_field('email') ): ?>

								<li class="email-address">
									<a href="mailto:<?php the_sub_field('email'); ?>">
										<i class="fa fa-envelope"></i>
										<?php the_sub_field('email'); ?>
									</a>
								</li>

							<?php endif; ?>
						</ul>
					</footer>
				</div>
			</article>

		<?php endwhile; ?>

	<?php endif; ?>
	
</div>