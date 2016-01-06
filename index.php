<?php get_header(); ?>
<div class="container">
<section class="columns twelve">
	<h2>Blog</h2>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article class="post" id="post-<?php the_ID(); ?>">
<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
<?php the_excerpt(); ?></article>
<?php endwhile; endif; ?>
</section>
<aside class="columns four">
	<div id="sidebar">
	<?php dynamic_sidebar('Blog');?>
<div>
</aside>
</div>
<?php get_footer();?>