//add to functions.php

<?php // removes rich editor Visual / Text in submission form globally
add_filter( 'user_can_richedit' , '__return_false', 50 ); ?>
