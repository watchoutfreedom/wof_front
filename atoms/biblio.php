<div class="bibliografia">
  <?php if( have_rows('bibliography') ): ?>
      <ul class="slides">
      <?php while( have_rows('book') ): the_row(); 
          $image = get_sub_field('image');
          ?>
          <li>
              <?php echo wp_get_attachment_image( $image, 'full' ); ?>
              <p><?php echo acf_esc_html( get_sub_field('caption') ); ?></p>
          </li>
      <?php endwhile; ?>
      </ul>
  <?php endif; ?>
</div>

