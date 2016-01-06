<?php get_header(); ?>

<section class="twelve columns">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<h3><?php the_title();?></h3>
		<?php the_content(); ?>

	<?php endwhile; endif; ?>
</section>
<aside class="four columns">
<?php get_sidebar (); ?>
</aside>


<?php get_footer(); ?>