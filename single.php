<?php get_header(); ?>

<main>
  <div class="main-wrapper">
    <?php while(have_posts()):the_post(); ?>
    <ul class="breadcrumb-list">
      <li class="breadcrumb-item">トップ</li>
      <li class="breadcrumb-item">
        <?php $cat = get_the_category(); $cat = $cat[0]; { echo '<a href="'.get_category_link($cat->term_id).'">'.$cat->cat_name.'</a>'; } ?>
      </li>
    </ul>
    <div id="post-<?php the_ID(); ?>" class="post-article">
      <?php 
          if ( has_post_thumbnail() ) {
            the_post_thumbnail('large', array( 'class' => 'image-responsive' ));
          }
        ?>
      <h1>
        <?php the_title(); ?>
        <br>
        <!--カスタムフィールド-->
        <?php if(get_field('sub-title')): ?>
        <div class="sub-title"><?php the_field('sub-title'); ?></div>
        <?php endif; ?>
        <!--カスタムフィールドここまで-->
      </h1>
      <p class="post-meta">
        <span class="post-date">公開日：<?php the_time('Y年n月j日'); ?></span>
      </p>
      <?php the_content(); ?>
      <!--カスタムフィールド-->
      <?php if(get_field('relation-link')): ?>
      <p class="relation-link">
        関連リンク：
        <a href="<?php the_field('relation-link'); ?>" target="_blank">
          <?php the_field('relation-link'); ?>
        </a>
      </p>
      <?php endif; ?>
      <!--カスタムフィールドここまで-->
      <?php
          $args = array(
            'before' => '<div class="pager">',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
          );
          wp_link_pages($args); ?>
      <div class="author">
        <?php the_author(); ?><br>
        <?php echo get_the_author_meta('description'); ?>
      </div>
    </div>
    <div class="navigation">
      <?php if(get_previous_post()): ?>
      <div class="prev-page">前の記事<br><?php previous_post_link('%link'); ?></div>
      <?php endif; ?>
      <? if(get_next_post()): ?>
      <div class="next-page">次の記事<br><?php next_post_link('%link'); ?></div>
      <?php endif; ?>
    </div>
    <?php comments_template(); ?>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>