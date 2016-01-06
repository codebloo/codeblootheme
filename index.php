<?php get_header(); ?>
<div class="container">
<section class="columns twelve">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>
</section>
<aside class="columns four">
	<div id="sidebar">
	<?php dynamic_sidebar('Blog');?>
<div>
</aside>
</div>
<?php get_footer();?>