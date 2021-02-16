<? 
	$timestamp = translateMonthName(date('d F Y', strtotime($post -> post_date)));
	$link = get_permalink($post);
	if(has_post_thumbnail($post)){
		$thumb_url_mini = get_the_post_thumbnail_url($post, 'medium');
		$thumb_url_full = get_the_post_thumbnail_url($post, 'full');
	}else{
		$thumb_url_mini = 'https://www.unfe.org/wp-content/uploads/2019/04/SM-placeholder-1024x512.png';
		$thumb_url_full = 'https://www.unfe.org/wp-content/uploads/2019/04/SM-placeholder-1024x512.png';
	}

	$count_views = get_field('count_views', $post);
?>

<li class="phtTdMain uEntryWrap" prev="1">
	<div id="entryID214" class="entryBlock">
		<span class="uphoto">
			<span class="photo-title">
				<a href="<?= $link ?>"><?= $post -> post_title ?></a>
			</span>
			<span class="photo-block">
				<span class="ph-wrap">
					<span class="ph-tc">
						<img title="<?= $post -> post_title ?>" alt="<?= $post -> post_title ?>" style="padding:0;border:0;" src="<?= $thumb_url_mini ?>" />
					</span>
					<a href="<?= $thumb_url_full ?>" data-title="<?= $post -> post_title ?>" data-alt="<?= $post -> post_title ?>" class="ulightbox ph-link" data-fancybox="ultbx" data-fancybox-group="ultbx" data-url="<?= $link ?>" class="ph-link" title="">
						<span class="ph-tc">
							<span class="ph-data">
								<span class="ph-date"><?= $timestamp ?></span>
								<span class="ph-descr"><?= strip_tags($post -> post_content) ?></span>
							</span>
						</span>
					</a>
				</span>
				<span class="ph-details ph-js-details">
					<span class="phd-views"><?= $count_views ?></span>
					<!-- <span class="phd-rating">
						<span id="entRating214">5.0</span>
					</span> -->
				</span>
			</span>
		</span>
	</div>
</li>