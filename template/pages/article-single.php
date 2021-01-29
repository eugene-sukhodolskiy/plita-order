<!-- Single article -->
<?
	$thumbnail = has_post_thumbnail($post) ? get_the_post_thumbnail_url($post, 'large') : null; 
	$thumbnail_alt = get_post_meta(get_post_thumbnail_id($post), '_wp_attachment_image_alt', true);
	$cats = get_the_category($post);
	$timestamp = translateMonthName(date('d F Y', strtotime($post -> post_date)));
?>

<? $this -> extends_from('base-template') ?>

<div class="side-in">
	<div id="allEntries">
		<div class="viewn">
			<div class="viewn-left">
				<div class="viewn-screen">
					<? if(isset($thumbnail) and $thumbnail): ?>
						<img src="<?= $thumbnail ?>" width="100%" alt="<?= $thumbnail_alt ?>">
					<? else: ?>
						<img src="https://www.unfe.org/wp-content/uploads/2019/04/SM-placeholder-1024x512.png" width="100%" alt="">
					<? endif ?>
				</div>
			</div>
			<div class="viewn-in">
				<div class="viewn-title">
					<div class="viewn-name"><?= $post -> post_title ?></div>
					<div class="viewn-date"><?= $timestamp ?></div>
				</div>
				<?= $post -> post_content ?>
			</div>
		</div>
	</div>
</div>

