<?php if( have_rows('field_637531d2abd69') ): ?>
    <ul class="slides">
    <?php while( have_rows('field_637531efabd6a') ): the_row(); 
        $image = get_sub_field('image');
        ?>
        <li>
            <?php echo wp_get_attachment_image( $image, 'full' ); ?>
            <p><?php echo acf_esc_html( get_sub_field('caption') ); ?></p>
        </li>
    <?php endwhile; ?>
    </ul>
<?php endif; ?>

