 <?php require('../wp-blog-header.php'); ?>

<?php get_header(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-

transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo

('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> » Blog Archive <?php } ?> <?php

wp_title(); ?></title>

<?php wp_head(); ?>
</head>

<body>
<?php
echo "ehhhe";

?>
<p>It</p>

</body>
</html>

<?php get_footer(); ?>