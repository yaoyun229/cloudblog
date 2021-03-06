<?php get_header(); ?>
	<div id="main">
    	<?php while ( have_posts() ) : the_post(); ?>
		<div class="post_list">
			<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <div class="info"> <?php the_category(', ') ?> | <?php the_time('Y-m-d'); ?></div>
			<div class="excerpt">
				<?php if (has_post_thumbnail()) { ?><div class="thumbnail"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a></div><?php } ?>
            	<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 330,"..."); ?>
            	<span class="more">[<a href="<?php the_permalink() ?>" title="详细阅读 <?php the_title(); ?>" rel="bookmark">阅读全文</a>]</span>
            </div>
            <div class="meta">
            	<span class="meat_span"><i class="iconfont">&#279;</i><?php if(function_exists(the_views)) { the_views(true,'','次浏览', true);}?></span>
                <span class="meat_span"><i class="iconfont">&#54;</i>
                <!-- UYAN COUNT BEGIN -->
                            <a href="<?php echo get_settings('home')."/?p=".get_the_ID();?>" id="uyan_count_unit">0条评论</a>
                <!-- UYAN COUNT END -->
                </span>
                <span class="meat_span meat_max"><i class="iconfont">&#48;</i><?php the_tags('', ', ', ''); ?></span>
            </div>
		</div>
        <?php endwhile; ?>
		<?php wp_pagenavi(); ?>
	</div>
	<?php get_sidebar('category'); ?>
<?php get_footer(); ?>