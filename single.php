<?php if (in_category('debate')) {
  include (TEMPLATEPATH . '/single_debate.php');
}
elseif (in_category('formacion')) {
  include (TEMPLATEPATH . '/single_formacion.php');
}
elseif (in_category('tienda')) {
  include (TEMPLATEPATH . '/single_shop.php');
}
elseif (in_category('noticias')) {
  include (TEMPLATEPATH . '/single_noticias.php');
}
else {include (TEMPLATEPATH . '/single_default.php'); 
}