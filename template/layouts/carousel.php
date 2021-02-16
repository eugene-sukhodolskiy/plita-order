<?

	$slides = get_posts([
		'category_name' => 'slides',
		'number_posts' => 10
	]);

?>

<div class="slides">
	<div class="slides_container" style="text-align: left; overflow: hidden; position: relative; display: block; background: grey;">
		<? foreach($slides as $slide): ?>
			<a href="<?= get_permalink($slide) ?>">
				<span class="slides-info">
					<span class="slides-name"><?= $slide -> post_title ?></span>
					<?= $slide -> post_excerpt ?>
				</span>
				<? if(!has_post_thumbnail($slide)): ?>
					<img src="https://www.unfe.org/wp-content/uploads/2019/04/SM-placeholder-1024x512.png" alt="тротуарная плитка">
				<? else: ?>
					<img src="<?= get_the_post_thumbnail_url($slide, 'full') ?>" alt="тротуарная плитка">
				<? endif ?>
			</a>
		<? endforeach ?>
	</div>
</div>