<nav id="navigation" role="navigation">
	<div class="wrap">

		<span id="navigation-toggle"></span>

		<div class="nav-primary">

		    <?php wp_nav_menu(array(
				'theme_location' => 'main-menu',
				'depth'          => 2,
				'container'      => '',
				'walker'          => new Twentyfourseven_Nav_Walker
			)); ?>
			
        </div>

	</div>
</nav><!-- #navigation -->

