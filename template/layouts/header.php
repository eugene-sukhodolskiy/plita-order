<?
	$nav_items = get_navitems('header-nav');			
	// $current_guid = url_to_postid(get_the_permalink());
?>

<div class="header">
	<div class="full">
		<a href="/home.html" class="header-logo"></a>
		<div class="header-contact">
			<div>
				<span style="font-size: 12pt;">+38</span><span style="font-size: 12pt;"><font color="#32c182">(066)</font></span><font style="font-size: 12pt;">-451-69-74</font>
			</div>
			<div>
				<font style="font-size: 12pt;">+38</font><span style="font-size: 12pt;"><font color="#32c182">(063)</font></span><font style="font-size: 12pt;">-426-42-69</font>
			</div>
			<div>Украина, г.Харьков, Плитакс©&nbsp;</div>
		</div>
		<? wp_nav_menu( [ 
			'container_class' => 'header-nav',
			'theme_location'  => 'header-nav'
		] );
		?>
	</div>
</div>