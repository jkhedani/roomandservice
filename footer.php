			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<div class="footer-wrapper">
					<section class="footer-nav">
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>

						<p class="publisher">
							Published by Nella Media Group<br>
							36 N. Hotel St. Suite A<br>
							Honolulu HI, 96817
						</p>

					</section>
					<section class="footer-social">
						<ul>
							<li class="instagram"><a href="//instagram.com/roomandservice">@roomandservice</a></li>
							<li class="facebook"><a href="//facebook.com/roomandservice">/roomandservice</a></li>
							<li class="twitter"><a href="//twitter.com/roomandservice">@roomandservice</a></li>
						</ul>
					</section>
				</div>
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-58517512-1', 'roomandservice.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
