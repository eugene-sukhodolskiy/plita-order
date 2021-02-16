<!-- Single article 2 -->
<?
	$timestamp = translateMonthName(date('d F Y', strtotime($post -> post_date)));
?>

<? $this -> extends_from('base-template') ?>

<div class="side-in">
	<div id="allEntries">

		<div class="entry">
			<div class="viewn">
				<div class="viewn-title">
					<div class="viewn-name">
						<?= $post -> post_title ?>
					</div>
					<div class="viewn-date"><?= $timestamp ?></div>
				</div>
				<div class="viewn-mess">
					<?= $post -> post_content ?>
				</div>
			</div>
			<?= $this -> join('layouts/comments') ?>
		</div>

	</div>
</div>

