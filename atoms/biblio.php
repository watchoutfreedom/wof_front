<div class="bibliografia">

<?php if( have_rows('field_637531d2abd69') ): ?>
  <h2>Bibliografía</h2>
  <ul class="slides">
    <?php while( have_rows('field_637531d2abd69') ): the_row(); 
        $child_title = get_sub_field('field_637531efabd6a');
        ?>
        <li>
            <?php echo ( $child_title ); ?>
        </li>
    <?php endwhile; ?>
    </ul>
<?php endif; ?>

    
</div>

