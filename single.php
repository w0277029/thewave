<?php

get_header();

while ( have_posts() ) : 
    the_post();

    // Get this post instance
    $post = get_post();
    
    // Get the author info

    $author_name = get_the_author_meta('display_name', $post->post_author);
    $avatar_src = get_avatar_url($post->post_author);
?>    

<div class="d-flex justify-content-center mb-3">
    <?= the_post_thumbnail('large') ?>
</div>

<div class="">
    <img src="<?= $avatar_src ?>" class="post-profile-img">
    <?= $author_name ?>
</div>

<h3><?= the_title() ?></h3>

<main><?= the_content() ?></main>

<div class="mb-3">
<?php
//
// Get the category
//

$categories = get_the_category($post->ID);

foreach($categories as $category) { ?>
    <a href="<?= get_category_link($category->term_id) ?>" class="link-secondary text-decoration-none"><?= $category->name ?></a>
<?php } ?>

</div> <!-- .post-categories -->

<div class="">
<?php
//
// Get the tags
//

$tags = get_the_tags($post->ID);

foreach($tags as $tag){ ?>
    <span class="badge rounded-pill text-bg-light">
        <a href="<?= get_tag_link($tag->term_id) ?>" class="link-secondary text-decoration-none"><?= $tag->name ?></a>
    </span>
<?php }

endwhile;
?>

</div> <!-- .post-tags -->

<?php get_footer(); ?>