<?php 
add_filter( 'query_vars', 'pmg_rewrite_add_var');
add_filter( 'rewrite_rules_array', 'add_rewrite_rules');

function pmg_rewrite_add_var( $vars )
{
	//param Realisation
    $vars[] = 'tagname';

    //reference recrutement
    $vars[] = 'offre';

    //paged actualites
    $vars[] = 'paged';

    //s resultats-de-recherche
    $vars[] = 's';

    return $vars;
}

function add_rewrite_rules($aRules) {

	$aNewRules = array(

		//page recrutement
		'recrutement/?$' => 'index.php?pagename=recrutement',
		'recrutement/([^/]+)/?$' => 'index.php?pagename=recrutement&offre=$matches[1]',

		//page Actu
		'actualites/page/([^/]+)/?$' => 'index.php?pagename=actualites&paged=$matches[1]',
		
		//page publications
		'publications/page/([^/]+)/?$' => 'index.php?pagename=publications&paged=$matches[1]',

		//page Realisations
		'nos_references/([^/]+)/?$' => 'index.php?pagename=nos_references&tagname=$matches[1]',

		//page resultats-de-recherche
		'resultats-de-recherche/([^/]+)/?$' => 'index.php?pagename=resultats-de-recherche&s=$matches[1]',
	);
	
	$aRules = $aNewRules + $aRules;

	return $aRules;
}


function remove_menus () {
global $menu;
	$restricted = array(__('Posts'),  __('Comments'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus');


?>