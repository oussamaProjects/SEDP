<?php
add_action("admin_init", "admin_init");
function admin_init(){
  add_meta_box("metier_Principal", "Métier principal", "metier_Principal", "projets", "side", "core");
}

function metier_Principal(){
  
  global $post;
  $metierPrincipals = wp_get_post_tags($post->ID); ?>

  <label  for="metierPrincipal">Métier principal</label><br>
  <select name="metierPrincipal" id="metierPrincipal">
    <option selected="selected" value="0"> -- </option>
    <?php foreach ($metierPrincipals as $metierPrincipal) : ?>
    <option <?php echo ( isset($post->metierPrincipal) &&  $post->metierPrincipal == $metierPrincipal->term_id ) ? 'selected="selected"' : '' ; ?> value="<?php echo $metierPrincipal->term_id; ?>"> 
      <?php echo $metierPrincipal->name; ?> 
    </option>
    <?php endforeach; ?>
  <select>

  <?php
}


add_action('save_post', 'save_metier_Principal');

function save_metier_Principal(){
  global $post;
  update_post_meta($post->ID, "metierPrincipal", $_POST["metierPrincipal"]); 
}

