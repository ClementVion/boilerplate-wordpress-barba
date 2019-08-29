<?php
/*
Template Name: Home page
*/

get_header(); 
?>

<main data-barba="container" data-barba-namespace="homepage">
  <?php
    get_template_part('components/c-home-container');
    get_template_part('components/c-copyright');
    get_template_part('components/c-home-container-mobile');
  ?>
</main>

<?php get_footer(); ?>