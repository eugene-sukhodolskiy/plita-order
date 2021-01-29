<?php echo get_the_posts_pagination([
	'show_all'           => false, // показаны все страницы участвующие в пагинации
	'end_size'           => 1,     // количество страниц на концах
	'mid_size'           => 1,     // количество страниц вокруг текущей
	'prev_next'          => true,
	'prev_text'          => '«',
	'next_text'          => '»',
	'screen_reader_text' => '',
	'class'              => 'catPages1',  // class="" для nav элемента. С WP 5.5
]); ?>

<style>
	.navigation {
		clear: both;
		text-align: center;
	}

	.screen-reader-text{
		display: none;
	}

	.page-numbers.current{
		font-weight: bold;
	}
</style>