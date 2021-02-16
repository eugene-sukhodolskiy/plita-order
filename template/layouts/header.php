<?
	$nav_items = get_navitems('header-nav');		

	$cpost = get_page_by_path('contacts', OBJECT);
	$phones = [
		get_post_meta($cpost -> ID, 'phone_number_1'), 
		get_post_meta($cpost -> ID, 'phone_number_2')
	];
	$location = get_post_meta($cpost -> ID, 'location');

?>

<div class="header">
	<div class="full">
		<a href="/" class="header-logo"></a>
		<div class="header-contact">
			<!-- #32c182 -->
			<?php foreach ($phones as $key => $phone): ?>
				<div>
					<span style="font-size: 12pt;">
						<?= str_replace(')', ')</span>', str_replace('(', '<span style="color: #32c182">(', $phone[0])) ?>
					</span>
				</div>
			<?php endforeach ?>
			<div><?= $location[0] ?> Плитакс©</div>
		</div>
		<button class="menu">
			<span class="sandwitch">&#9776;</span>
			<span class="cross">&times;</span>
		</button>
		<? wp_nav_menu( [ 
			'container_class' => 'header-nav',
			'theme_location'  => 'header-nav'
		] );
		?>
	</div>
</div>