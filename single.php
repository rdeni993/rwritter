<?php  get_header(); /* Include header */ ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 main-menu bg-white main-font text-center sticky-top">
        <!-- Template From Templates -->
            <?php get_template_part("templates/home_page"); ?>
        <!-- EOF Template -->
        </div>
        <!-- Blog Post Section Last 10 -->
        <div class="col-sm-6">
            <?php if( have_posts() ): ?>    
                <?php while( have_posts() ): ?> 
                    <?php the_post(); ?>
                    <!-- FORMAT POST -->
                    <article class="main-post main-font">
                        <!-- Tags -->
                            <ul class="tags">
                                <?php $cats = get_the_category(); ?>
                                <?php if( $cats ): ?>
                                    <?php foreach($cats as $cat): ?>
                                        <span><?php echo $cat->name; ?></span>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        <!-- POST TITLE -->
                        <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
                        <!-- POST DATE -->
                        <div class="post-desc">
                            <span class="text-muted"><?php the_date("Y/M/d h:i"); ?></span>
                            <span class="text-muted">Posted by: <?php the_author(); ?></span>
                        </div>
                        <!-- POST THUMB -->
                        <?php if( has_post_thumbnail() ): ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif; ?>
                        <!-- POST EXCERPT -->
                        <div><?php the_content(); ?></div>
                    </article>
                    <!-- EOF POST -->
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="col-sm-3 bg-white my-bio text-center main-font">
            <div class="sticky-top open-post">
                <article>
                    <div class="next-post">
                        <p>Next post</p>
                    </div>
                    <?php $post = get_next_post(); ?>
                    <!-- NEXT POST -->
                    <?php if($post): ?>
                        <?php echo get_the_post_thumbnail(); ?>
                        <a href="<?php echo $post->guid; ?>"><h3><?php echo $post->post_title; ?></h3></a>
                        <div class="post-excerpt text-muted text-justify"><?php echo substr($post->post_content, 0, 128); ?></div>
                    <?php else: ?>
                        <p class="text-muted">You are watching newest post!</p>
                    <?php endif; ?>
                </article>
                <div class="most-viewed main-font">
                    <div class="next-post">
                        <p>Related posts</p>
                    </div>

                    <!-- LIST RELATED POSTS -->
                    <?php 
                    
                        // Set Query
                        $cat_sel = get_the_category();

                        $related_posts = new Wp_Query(['cat' => $cat_sel[0]->name, 'posts_per_page' => 5]);

                        // List Five Posts
                        if( $related_posts->have_posts())
                        {
                            while( $related_posts->have_posts() )
                            {
                                $related_posts->the_post();

                            ?>
                            
                            <article>
                            <!-- Tags -->
                            <ul class="tags">
                                <?php $cats = get_the_category(); ?>
                                <?php if( $cats ): ?>
                                    <?php foreach($cats as $cat): ?>
                                        <span><?php echo $cat->name; ?></span>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <?php if( has_post_thumbnail() ): ?>
                                <?php the_post_thumbnail(); ?>
                            <?php endif; ?>
                            <?php $the_title_cont = get_the_title(); ?>
                            <?php if(strlen($the_title_cont) < 26 ): ?>
                                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                            <?php else: ?>
                                <a href="<?php the_permalink(); ?>"><h3><?php echo substr($the_title_cont, 0, 26); ?>...</h3></a>
                            <?php endif; ?>
                            <div class="post-excerpt text-muted text-justify">
                                <?php the_excerpt(); ?>
                            </div>
                            <hr>
                            </article>

                            <?php 

                            }
                        }

                    ?>

                </div>

            </div>
        </div>
    </div>
</div>
<?php get_footer(); /* Include Footer */ ?>