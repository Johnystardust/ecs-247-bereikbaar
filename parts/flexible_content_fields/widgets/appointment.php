<div class="widget widget-calendar">
	<header class="widget-header">
		<h3><?php the_sub_field('widget_title'); ?></h3>
	</header>
	<div class="widget-text">
		
		<a href="<?php the_field('option_appointment_embedurl', 'option'); ?>" class="button large-button icon" target="_blank">
			Afspraak maken
			<i class="fa fa-calendar"></i>
		</a>
		
		<script type="text/javascript">document.domain='onlineafspraken.nl';</script>
		<iframe width="400" height="1500" src="<?php the_field('option_appointment_embedurl', 'option'); ?>" frameborder="0"></iframe>
	
	</div>
</div>