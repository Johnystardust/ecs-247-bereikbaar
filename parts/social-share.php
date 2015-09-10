<div class="share-post">

	<span class="share-label"><?php the_field('option_sharing_text_prefix', 'option'); ?></span>

	<div class="share-buttons">

		<div class="share-button share-button share-twitter" style="width: 90px;">
			<a href="https://twitter.com/share" class="twitter-share-button" data-via="elephantcs" data-count="true">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		</div>

		<div class="share-button share-google-plus">
			<script src="https://apis.google.com/js/platform.js" async defer>
			  {lang: 'nl'}
			</script>

			<div class="g-plusone" data-size="medium" data-annotation="none" data-width="300"></div>
		</div>

		<div class="share-button share-linkedin">
			<script src="//platform.linkedin.com/in.js" type="text/javascript">
			 lang: nl_NL
			</script>
			
			<script type="IN/Share" data-counter="right"></script>
		</div>

		<div class="share-button share-facebook">
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/nl_NL/all.js#xfbml=1";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			
			<div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
		</div>

	</div>

</div>