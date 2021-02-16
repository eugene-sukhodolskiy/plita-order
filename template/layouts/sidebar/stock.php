<?
	$cpost = get_page_by_path('seson-akcia', OBJECT);
	$dates = [
		get_post_meta($cpost -> ID, 'started_date'), 
		get_post_meta($cpost -> ID, 'finished_date')
	];
?>

<div class="block">
	<div class="block-title"><?= $cpost -> post_title ?></div>
	<div class="block-title">
		<? if(has_post_thumbnail($cpost)): ?>
			<img src="<?= get_the_post_thumbnail_url($cpost, 'medium') ?>" width="100%" alt="">
		<? endif ?>
		<font style="font-size: 12pt;">
			С <b><?= date('d.m.Y', strtotime($dates[0][0])) ?></b> по 
			<b><?= date('d.m.Y', strtotime($dates[1][0])) ?></b>
			<font size="2">.</font>
		</font>
	</div>
	<div class="block-content">
		<div class="discount-text">
			<?= $cpost -> post_content ?>
		</div>
	</div>
</div>

<style>
	.discount-text{
		font-size: 12pt; 
		line-height: 115%; 
		text-align: left;
		padding-left: 0;
	}

	.discount-text > p:first-of-type{
		margin-top: 0;
    padding-left: 0;
	}
</style>