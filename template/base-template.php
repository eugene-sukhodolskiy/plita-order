<? extract($this -> get_inside_data()) ?>
<?= $this -> join('layouts/head'); ?>

<div id="wrapper">

	<script type="text/javascript" src="<?= get_template_directory_uri() ?>/js/script.js"></script>
	<script type="text/javascript" src="<?= get_template_directory_uri() ?>/js/slides.js"></script>

	<?= $this -> join('layouts/header') ?>
	<?= $this -> join('layouts/carousel') ?>

	<div class="side-main full">
		<?= $this -> join('layouts/sidebar') ?>

		<?= $this -> content() ?>
		
	</div>

	<?= $this -> join('layouts/footer'); ?>