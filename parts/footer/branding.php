<?php if ( get_field( 'option_footer_branding_text', 'option' ) ): ?>

	<?php $branding = str_replace( '{year}', date('Y'),  get_field( 'option_footer_branding_text', 'option' )); ?>

	<p id="credits">
		<?php echo $branding; ?>
	</p>
<?php endif; ?>

<?php if ( have_rows('option_footer_branding_links', 'option') ): ?>
	
	<div id="footer-navigation">
		<ul>

			<?php while ( have_rows('option_footer_branding_links', 'option') ) : the_row(); ?>
			
				<li>
					<a <?php if(get_sub_field('target_blank')) echo 'target="_blank" '; ?>href="<?php the_sub_field('link'); ?>">
						<?php the_sub_field('link_text'); ?>
					</a>
				</li>

			<?php endwhile; ?>
		</ul>
	</div>

<?php endif; ?>