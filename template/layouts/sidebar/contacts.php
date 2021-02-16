<?
	$cpost = get_page_by_path('contacts', OBJECT);
	$phones = [
		get_post_meta($cpost -> ID, 'phone_number_1'), 
		get_post_meta($cpost -> ID, 'phone_number_2')
	];
	$location = get_post_meta($cpost -> ID, 'location');
?>
<div class="block">
	<div class="block-title">Наши контакты</div>
	<div class="clear"></div>
	<div class="block-content">
		<div class="contact">
			<div class="contact-soc">
				<a href="http://plita.kh.ua/" class="soc-ico-1"></a>
				<a href="http://plita.kh.ua/#" class="soc-ico-2"></a>
				<a href="http://plita.kh.ua/#" class="soc-ico-3"></a>
				<a href="http://plita.kh.ua/#" class="soc-ico-4"></a>
				<a href="http://plita.kh.ua/#" class="soc-ico-5"></a>
			</div>
			<div class="contact-info">
				<?php foreach ($phones as $key => $phone): ?>
					<div>
						<?= str_replace(')', ')</strong>', str_replace('(', '<strong>(', $phone[0])) ?>
					</div>
				<?php endforeach ?>

				<div><?= $location[0] ?></div>
			</div>
		</div>
	</div>
</div>