<footer class="footer">
  <p>2024 © Watch Out, Freedom! 
    <?php if (!is_user_logged_in()): ?>
      — <a href="<?php echo esc_url(home_url('/login')); ?>">Login</a>
    <?php endif; ?>
  </p>
  <p class="mail">mail@watchoutfreedom.com</p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
