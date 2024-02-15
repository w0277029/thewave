<?php 

get_header();

// //Get categories
$categories = get_categories();

// Loop through the categories
foreach($categories as $category):
?>
    <div class="row" id="category-section">
        <h2><?= $category->name ?></h2>
<?php 

    // Get the latest post for the category
    $latest_post = get_posts(array(
        'numberposts' => 1,
        'post_status' => 'publish',
        'category_name' => $category->name,
        'order' => 'DESC'
    ));

    // Get the rest of the posts for the category
    $other_posts = get_posts(array(
        'numberposts' => 3,
        'post_status' => 'publish',
        'category_name' => $category->name,
        'order' => 'DESC'
    ));

    $latest_author_id = $latest_post[0]->post_author;

?>
        <div class="col-md-6">
            <div class="latest-post">
                <a href="<?= get_permalink($latest_post_id); ?>">
                    <img src="<?= get_the_post_thumbnail_url($latest_post_id, 'large'); ?>" class="featured-img">
                </a>
                <a href="<?= get_permalink($latest_post_id); ?>" class="custom-link">
                    <h5 class="post-title"><?= get_the_title($latest_post_id); ?></h5>
                </a>
                <div class="post-info">
                    <img src="<?= get_avatar_url($latest_author_id) ?>" class="post-profile-img">
                    <?= get_the_author_meta('display_name', $latest_author_id); ?>
                    <p class="post-content" ><?= get_the_excerpt() ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
<?php
    foreach ($other_posts as $post):

        $id = $post->ID;
        $author_id = $post->post_author;
?>
            <div class="row mb-3 border-top">
                <a href="<?= get_permalink($id); ?>" class="other-posts-img">
                    <img src="<?= get_the_post_thumbnail_url($id, 'large'); ?>" class="featured-img">
                </a>
                <a href="<?= get_permalink($id); ?>" class="custom-link">
                    <h5 class="post-title"><?= get_the_title($id); ?></h5>
                </a>
                <p class="post-author">by <?= get_the_author_meta('display_name', $author_id); ?></p>
                <p class="post-content"><?= get_the_excerpt() ?></p>
            </div>
<?php endforeach; ?>
        </div> 
    </div>
<?php
endforeach;

get_footer();
?>
