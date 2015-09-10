<section id="contact">

	<ul>
		<li><?php the_field( 'option_telefoon', 'options' ); ?></li>
		<li><a href="<?php echo antispambot( get_field( 'option_e-mailadres', 'options' ), 1 ); ?>"><?php echo antispambot( get_field( 'option_e-mailadres', 'options' ) ); ?></a></li>
	</ul>
	
</section><!-- #contact -->