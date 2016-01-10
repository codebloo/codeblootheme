<?php get_header(); ?>

<main class="twelve columns" role="main">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<h3><?php the_title();?></h3>
		<?php the_content(); ?>

	<?php endwhile; endif; ?>
</main>
<aside class="four columns" role="complementary">
<?php get_sidebar (); ?>
</aside>


<?php get_footer(); ?>