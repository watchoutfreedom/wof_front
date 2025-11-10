<?php get_template_part('components/head'); ?>

<?php 
// Debug information
echo "<script>console.log('=== HEADER DEBUG INFO ===');</script>";

// Check if it's a single post with 'helpbuttons' category
$is_helpbuttons_post = false;
$current_url = $_SERVER['REQUEST_URI'];
$url_has_helpbuttons = (strpos($current_url, 'helpbuttons') !== false);

echo "<script>console.log('Current URL:', '" . $current_url . "');</script>";
echo "<script>console.log('URL has helpbuttons:', " . ($url_has_helpbuttons ? 'true' : 'false') . ");</script>";

// Get the current post and check categories
global $post;
$post_type = 'none';
$post_id = 0;
$category_slugs = [];

if (isset($post)) {
    $post_type = $post->post_type;
    $post_id = $post->ID;
    
    echo "<script>console.log('Post detected - ID:', " . $post_id . ", 'Type:', '" . $post_type . "');</script>";
    
    if ($post->post_type == 'post') {
        $categories = get_the_category($post->ID);
        
        foreach ($categories as $category) {
            $category_slugs[] = $category->slug;
            if ($category->slug === 'helpbuttons') {
                $is_helpbuttons_post = true;
            }
        }
        
        echo "<script>console.log('Categories found:', " . json_encode($category_slugs) . ");</script>";
        echo "<script>console.log('Is helpbuttons post:', " . ($is_helpbuttons_post ? 'true' : 'false') . ");</script>";
    } else {
        echo "<script>console.log('Not a post type, skipping category check');</script>";
    }
} else {
    echo "<script>console.log('No post object found');</script>";
}

// Apply only if: post has helpbuttons category
if ($is_helpbuttons_post) {
    echo "<script>console.log('APPLYING HELP BUTTONS LOGO - Conditions met!');</script>";
    echo "
    <style>
    .header__logo-link {
        /* Set the new background image */
        background-image: url('https://wofreedom.org/wp-content/uploads/sites/8/2025/11/hb_logo_hor_00-1.png');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;

        /* These next lines hide the original 'WOF' text and give the link dimensions */
        text-indent: -9999px;
        overflow: hidden;
        font-size: 0;
        display: block;
        width: 80px;  /* <-- Adjust width as needed for your logo */
        height: 40px; /* <-- Adjust height as needed for your logo */
    }
    </style>
    ";
} else {
    echo "<script>console.log('NOT applying Help Buttons logo - conditions not met');</script>";
}
?>

<header class="header">
    <div class="header__wrap">
        <div class="header__logo">
            <a href="<?php bloginfo('url'); ?>" class="header__logo-link">
                WOF
            </a>
        </div>
        <nav class="header__nav">
            <ul>
                <?php 
                $args = array(
                    'exclude' => get_page_by_path("create-post")->ID.",".get_page_by_path("php-info")->ID.",".get_page_by_path("login")->ID.",".get_page_by_path("sign-up")->ID,
                    'title_li' => ''
                );
                wp_list_pages($args); 
                ?>
            </ul>
        </nav>
        <div class="header__btn">
            <a href="/colabora">Colabora con WOF</a>
        </div>
    </div>
</header>