<?php 
/** From URI use Category Title */
$category = get_category( get_query_var( 'cat' ) );

/** Exclude ID */
$cat_id = $category->cat_ID;

/** From GET take 1 argument => page */
$offset = get_query_var('page') ? get_query_var('page') : 0;

if( $offset < 1 )
    $offset = 1;

/** Use cat id to get posts */
$cat_posts = [
    'cat' => $cat_id,
    'posts_per_page' => 10,
    'offset' => ($offset-1) * 10
];

/** Create custom Query */
$category_posts = new WP_Query($cat_posts);

/** Category Size  */
$cat_size = sizeof( $category_posts->posts );

?>
<?php  get_header(); /* Include header */ ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 main-menu bg-white main-font text-center sticky-top">
            <!-- Template From Templates -->
            <?php get_template_part("templates/home_page"); ?>
            <!-- EOF Template -->
        </div>
        <!-- Blog Post Section Last 10 -->
        <div class="col-sm-6 main-font">
            <div class="search-post-box">
                <!-- LIST POSTS -->
                <div class="search-posts">
                    <div class="row">

                    <?php if( $category_posts->have_posts() ): ?>
                        <?php while( $category_posts->have_posts() ): ?>
                            <?php $category_posts->the_post(); ?>
                            <!-- Posts come here -->
                            <div class="col-sm-6 post-box">
                                <div class="categories"><?php the_category(); ?></div>
                                <!-- Thumbnail --> 
                                <?php if( has_post_thumbnail() ): ?>
                                    <?php the_post_thumbnail(); ?>
                                <?php endif; ?>
                                <!-- EOF Thumbnail --> 
                                <br><br>
                                <div class="post-desc text-uppercase">
                                    <span class="text-muted"><?php the_date("Y/M/d"); ?></span>
                                    <span class="text-muted">Posted by: <?php the_author(); ?></span>
                                </div>
                                <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
                                <div class="text-muted"><?php the_excerpt(); ?></div>
                            </div>
                            <!-- EOF List posts -->
                        <?php endwhile; ?>
                    <?php endif; ?>

                    </div>
                </div> 
                <!-- EOF POSTS -->
                <!-- INTERFACE -->
                <div class="interface">
                    <ul>
                        <!-- Check did we need previous button -->
                        <?php if( get_query_var('page') > 1 ): ?>
                            <li><a href="?page=<?php echo $offset - 1; ?>">Previous</a></li>
                        <?php endif; ?>
                        
                        <!-- Check Did we need next button -->
                        <?php if( $cat_size == 10 ): ?>
                            <li><a href="?page=<?php echo $offset + 1; ?>">Next</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- EOF INTERFACE -->
            </div> 
        </div>
        <div class="col-sm-3 bg-white my-bio text-center main-font">
            <!-- Template: templates/about_me -->
            <?php get_template_part("templates/about_me"); ?>
            <!-- EOF Template -->
        </div>
    </div>
</div>
<?php get_footer(); /* Include Footer */ ?> 