<?php 

get_header();

$current_category = get_queried_object();

?>
    <h2><?= $current_category->name ?></h2>
<?php 

    $posts = get_posts(array(
        'numberposts' => 4,
        'post_status' => 'publish',
        'category_name' => $current_category->name,
        'order' => 'DESC'
    ));

    $id = $post->ID;
    $author_id = $post->post_author;
        
    foreach ($posts as $post):

        $id = $post->ID;
        $author_id = $post->post_author;
?>
    <div class="row border-top" id="category-row">
        <div class="col">
            <a href="<?= get_permalink($id); ?>">
                <img class="category-feature-img" src="<?= get_the_post_thumbnail_url($id, 'medium'); ?>" >
            </a>
        </div>
        <div class="col">
            <a href="<?= get_permalink($id); ?>" class="custom-link">
                <h5 class="post-title"><?= get_the_title($id); ?></h5>
            </a>
            <img src="<?= get_avatar_url($author_id) ?>" class="post-profile-img">
                <?= get_the_author_meta('display_name', $author_id)?> | <?=get_the_date(); ?>
            <a href="<?= get_permalink($id); ?>" class="custom-link">
                <p><?= get_the_excerpt() ?></p>
            </a>
        </div>
    </div>

<?php 

    endforeach; 

get_footer();
?>