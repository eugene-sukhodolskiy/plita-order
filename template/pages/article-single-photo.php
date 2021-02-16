<!-- Single article photo -->
<?

	function get_nearby_photos($p){
		$all_photos = get_posts([
			'category_name' => 'photo',
			'numberposts' => 1000,
			'orderby' => 'date',
			'order' => 'DESC'
		]);

		$inx = -1;
		foreach($all_photos as $i => $photo){
			if($p -> ID == $photo -> ID){
				$inx = $i;
			}
		}

		if($inx < 0){
			return false;
		}

		$results = [];
		for($i=$inx-5; $i<$inx+5; $i++){
			if($i < 0) continue;
			$results[] = $all_photos[$i];
		}
		
		return $results;
	}

	$timestamp = translateMonthName(date('d F Y', strtotime($post -> post_date)));
	if(has_post_thumbnail($post)){
		$thumb_url_mini = get_the_post_thumbnail_url($post, 'large');
		$thumb_url_full = get_the_post_thumbnail_url($post, 'full');
	}else{
		$thumb_url_mini = 'https://www.unfe.org/wp-content/uploads/2019/04/SM-placeholder-1024x512.png';
		$thumb_url_full = 'https://www.unfe.org/wp-content/uploads/2019/04/SM-placeholder-1024x512.png';
	}

	$count_views = get_field('count_views', $post);
	if(!is_string($count_views)){
		$count_views = 0;
	}else{
		$count_views = intval($count_views) + 1;
	}
	update_field('count_views', $count_views, $post);
?>

<? $this -> extends_from('base-template') ?>
<div class="side-in">

	<div class="uphoto-entry">
		<h2 class="photo-etitle"><?= $post -> post_title ?></h2>
		<div class="photo-edescr">
			<?= $post -> post_content ?>
		</div>
		<div class="u-center">
			<div class="photo-block">
				<div class="ph-wrap">
					<span class="photo-expand">
						<span id="phtmDiv35">
							<span id="phtmSpan35" style="position:relative">
								<img alt="<?= $post -> post_title ?>" id="p106929274" border="0" src="<?= $thumb_url_mini ?>">
							</span>
						</span>
						<a class="dd-tip ulightbox" href="<?= $thumb_url_full ?>" target="_blank">
							<i class="expand-ico"></i><!--<s10014>-->В реальном размере<!--</s>-->
						</a>
					</span>
				</div>
				<div class="photo-edetails ph-js-details">
					<span class="phd-views"><?= $count_views ?></span>
				</div>

				<hr class="photo-hr">
				<div class="photo-edetails2">
					<!--<s10015>-->Добавлено<!--</s>--> <?= $timestamp ?> 
				</div>
			</div>

		</div>
	</div>

	<? $nearby = get_nearby_photos($post) ?>

	<div class="photo-slider u-center">

		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$('#oldPhotos').slick({
					arrows: false,
					dots: false,
					slidesToShow: 3,
  				slidesToScroll: 1,
				});

				$('#oldPhotos').slick('slickGoTo', 4);

				$('#leftSwch').on('click', function(){
					$('#oldPhotos').slick('slickPrev');
				});

				$('#rightSwch').on('click', function(){
					$('#oldPhotos').slick('slickNext');
				});
			});
		</script>

		<div id="phtOtherThumbs" class="phtThumbs" style="margin: 50px 0">
			<table border="0" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td style="padding-right: 20px">
							<a id="leftSwch" class="leftSwitcher" href="javascript://" rel="nofollow"></a>
						</td>
						<td align="center" style="white-space: nowrap;">
							<div id="oldPhotos" style="max-width: 618px; width: 100%">
								<?php foreach ($nearby as $i => $nearby_photo): ?>
									<a class="otherPhotoA <? if($nearby_photo -> ID == $post -> ID) echo 'otherPhotoACur' ?>" href="<?= get_permalink($nearby_photo) ?>">
										<span class="ph-wrap">
											<span class="ph-tc">
												<img title="<?= $nearby_photo -> post_title ?>" alt="<?= $nearby_photo -> post_title ?>" border="0" class="otherPhoto" src="<?= get_the_post_thumbnail_url($nearby_photo -> ID, 'medium') ?>">
											</span>
										</span>
									</a>
								<?php endforeach ?>
							</div>
						</td>
						<td style="padding-left: 20px">
							<a href="javascript://" rel="nofollow" id="rightSwch" class="rightSwitcher"></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<?= $this -> join('layouts/comments') ?>

</div>