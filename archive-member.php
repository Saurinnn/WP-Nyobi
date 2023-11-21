<?php get_header(); ?>

<main>
  <div class="main-wrapper">
    <h1 class="text-center">講師紹介</h1>
    <div class="member-list">
      <article>
        <?php
          if(have_posts()):
            while(have_posts()) : the_post();
            ?>
            <section>
              <img class="member-avatar" src="<?php the_field('avatar'); ?>">
              <h2 class="member-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

              <?php $terms = get_the_terms($post->ID,'subject'); ?>
                <?php if ($terms):?>
                    <ul class="member-subject">
                    <?php
                    foreach ( $terms as $term ){
                        echo '<li>' . $term->name . '</li>';
                    }
                    ?>
                    </ul>                   
                <?php endif; ?>
            </section>
          <?php
            endwhile;
          endif;
        ?>
      </article>
    </div>
  </div>
</main>

<?php get_footer(); ?>