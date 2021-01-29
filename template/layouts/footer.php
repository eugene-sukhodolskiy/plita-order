		<div class="footer">
			<div class="full">
				<div class="footer-text">
					Все права защищены © <?= date('Y') ?>
					<br>
					Дизайн сайта от <a href="http://lsart.ru/" onclick="window.open(this.href); return false" rel="nofollow" class="lsart">LSART.RU</a>
					<br>
				</div>
				<? wp_nav_menu( [ 
					'container_class' => 'footer-nav',
					'theme_location'  => 'footer-nav'
				] );
				?>
			</div>
		</div>
	</div>


	<div id="utbr8214" rel="s20"></div>

<? wp_footer() ?>
</body>
</html>