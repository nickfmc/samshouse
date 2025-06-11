<?php get_header(); ?>

<div class="o-layout-row">
  <main id="main-content" class="o-wrapper-wide" role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/WebPageElement">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="c-single-wrapper clearfix editor-content">
        <header class="c-article-header">
          <?php get_template_part( 'template-part/post/entry-meta' ); ?>
        </header>
        <!-- /article-header -->
        <article <?php post_class(); ?> role="article">
          <?php the_content(); ?>
        </article>
        <div class="c-back-to-posts">
          <a href="/blog" class="c-back-link">&larr; Back to All Posts</a>
        </div>
        <section class="c-related-articles">
          <h2>Related Articles</h2>
          <ul>
            <?php
              $related_posts = get_posts(array(
                'category__in' => wp_get_post_categories($post->ID),
                'numberposts' => 2,
                'post__not_in' => array($post->ID)
              ));
              foreach ($related_posts as $related_post) {
                echo '<li><a href="' . get_permalink($related_post->ID) . '">' . $related_post->post_title . '</a></li>';
              }
            ?>
          </ul>
        </section>
      </div>
    <?php endwhile; ?>
      <?php get_template_part( 'template-part/post/post-nav' ); ?>
    <?php else : ?>
      <?php get_template_part( 'template-part/post/not-found' ); ?>
    <?php endif; ?>

  </main>
</div>
<!-- /layout-row -->

<?php get_footer(); ?>
