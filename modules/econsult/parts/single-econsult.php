<div class="widetable">
	<table class="econsult-table">
	
		<tbody>
			<tr>
				<td class="title"><?php _e( 'Geslacht', 'ecs-corporate' ); ?></td>
				<td><?php the_field( 'econsult_gender', get_the_ID() ); ?></td>
			</tr>
			<tr>
				<td class="title"><?php _e( 'Voornaam', 'ecs-corporate' ); ?></td>
				<td><?php the_field( 'econsult_first_name', get_the_ID() ); ?></td>
			</tr>
			<tr>
				<td class="title"><?php _e( 'Achternaam', 'ecs-corporate' ); ?></td>
				<td><?php the_field( 'econsult_last_name', get_the_ID() ); ?></td>
			</tr>
			<tr>
				<td class="title"><?php _e( 'Geboortedatum', 'ecs-corporate' ); ?></td>
				<td><?php the_field( 'econsult_date_of_birth', get_the_ID() ); ?></td>
			</tr>
			<tr>
				<td class="title"><?php _e( 'Telefoonnummer', 'ecs-corporate' ); ?></td>
				<td><?php the_field( 'econsult_phone', get_the_ID() ); ?></td>
			</tr>
			<tr>
				<td class="title"><?php _e( 'E-mailadres', 'ecs-corporate' ); ?></td>
				<td><?php the_field( 'econsult_emailaddress', get_the_ID() ); ?></td>
			</tr>
			<tr>
				<td class="title"><?php _e( 'Vraag', 'ecs-corporate' ); ?></td>
				<td><?php the_field( 'econsult_question', get_the_ID() ); ?></td>
			</tr>
			
			<?php if( get_field( 'econsult_image', get_the_ID() ) ): ?>
			<tr>
				<td class="title"><?php _e( 'Afbeelding', 'ecs-corporate' ); ?></td>
				<td>
					<?php echo wp_get_attachment_image( get_field( 'econsult_image', get_the_ID() ), 'medium'); ?>
				</td>
			</tr>
			<?php endif; ?>

			<?php if( get_field( 'econsult_image_2', get_the_ID() ) ): ?>
			<tr>
				<td class="title"><?php _e( 'Afbeelding 2', 'ecs-corporate' ); ?></td>
				<td>
					<?php echo wp_get_attachment_image( get_field( 'econsult_image_2', get_the_ID() ), 'medium'); ?>
				</td>
			</tr>
			<?php endif; ?>

			<?php if( get_field( 'econsult_image_3', get_the_ID() ) ): ?>
			<tr>
				<td class="title"><?php _e( 'Afbeelding 3', 'ecs-corporate' ); ?></td>
				<td>
					<?php echo wp_get_attachment_image( get_field( 'econsult_image_3', get_the_ID() ), 'medium'); ?>
				</td>
			</tr>
			<?php endif; ?>
			
		</tbody>

	</table>
</div>

<?php comments_template(); ?>

<?php get_template_part( 'modules/econsult/parts/comments-form' ); ?>