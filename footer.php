<div class="container">
    <footer>
        <hr>
        <p><strong>The Wave</strong> The Team</p>
        <nav class="nav border-top">
            <?php 
                $menu_items = wp_get_nav_menu_items('Secondary Menu');

                foreach($menu_items as $menu_item) {
                    echo '<a id="footer-nav" class="nav-link text-black" href="'. $menu_item->url . '">'. $menu_item->title .'</a>';
                }
            ?>
        </nav>
    </footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
