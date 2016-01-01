</div>
	</div>
<footer>
<div class="container">
<div class="columns eight" id="copyright">&copy;<? echo date('Y');?> <?php bloginfo('name'); ?> ALL RIGHTS RESERVED.</div>

<?php wp_nav_menu(array('theme_location' => 'footer-menu', 'menu-class' => 'footer_menu nav', 'link_before' => '<span>', 'link_after' => '</span>', 'container_class' => 'columns eight')); ?>

</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>