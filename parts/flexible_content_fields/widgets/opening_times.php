<div class="widget opening-hours">
	<header class="widget-header">
		<h3><?php the_field('option_openingtimes_title', 'option'); ?></h3>
	</header>
	<div class="widget-text">

		<?php if( get_field('option_vacation_notice', 'option') ): ?>
					
			<div class="info">
				
				<?php the_field('option_vacation_notice_text', 'option'); ?>

			</div>

		<?php endif; ?>

		<table class="opening-hours-table">
			<tbody>

				<?php if( have_rows('option_opening_times', 'option') ): ?>

					<?php while ( have_rows('option_opening_times', 'option') ) : the_row(); ?>

						<tr>
							<td class="day <?php the_sub_field('option_openingtimes_open_closed'); ?>">
								<?php if( get_sub_field('option_openingtimes_open_closed') == 'closed' ): ?>
									<i class="fa fa-times-circle"></i>
								<?php else: ?>
									<i class="fa fa-check-circle"></i>
								<?php endif; ?>
								
								<?php the_sub_field('option_openingtimes_day', 'option'); ?>
							</td>
							<td class="hours"><?php the_sub_field('option_openingtimes_time', 'option'); ?></td>
						</tr>

					<?php endwhile; ?>

				<?php endif; ?>

			</tbody>
		</table>

	</div>
</div>