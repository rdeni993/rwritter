<div class="sticky-top">
    <!-- Blog and menu -->
    <a href="<?php echo home_url(); ?>"><h1 class="title-font"><?php echo bloginfo('title'); ?></h1></a>
    <h4 class="title-font"><?php echo bloginfo('description'); ?></h4>    <!-- Search -->
    <div class="search-box">
        <?php get_search_form(); ?>
    </div>
    <!-- Load Menu -->
    <?php 
        wp_nav_menu([
        'menu' => 'Primary Menu',
        'location' => 'primary_menu '
        ]); 
    ?>
    <p>Copyright &copy; <?php echo date('Y'); ?></p>
</div>