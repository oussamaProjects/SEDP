<?php 

//Ces shortcodes sont crée pour permettre l'accée au parametre reference du URL au CF7 


function cf7_get_offer_reference(){

    return get_query_var("offre","") ;
}
add_shortcode('CF7_GET_OFFER_REFERENCE', 'cf7_get_offer_reference');


add_action('wpcf7_before_send_mail', 'custom_wpcf7_before_send_mail');
function custom_wpcf7_before_send_mail($form) {
    // get current SUBMISSION instance
    $submission = WPCF7_Submission::get_instance();
   
    // get submission data
    $data = $submission->get_posted_data();

    if(isset($data['postuler_form'])){
        
        // nothing's here... do nothing...
        if(empty($data)) return;

        // extract posted data
        $nom      = isset($data['nom'])     ? $data['nom']     : "";
        $prenom   = isset($data['prenom'])     ? $data['prenom']     : "";
        $email    = isset($data['email'])         ? $data['email']         : "";
        $message  = isset($data['message'])       ? $data['message']       : "";
        $offer_name  = isset($data['offer_name'])       ? $data['offer_name']       : "";
        $sujet       = isset($data['subject'])         ? $data['subject']         : "";
        $offer_reference = isset($data['offer_reference'])         ? $data['offer_reference']         : "";
        $offre_spontannee = isset($data['offre_spontannee'])       ? $data['offre_spontannee']       : "";

        $mail = $form->prop('mail');
        $mail2 = $form->prop('mail_2');

        $in_mail = "";
        
        // Find/replace the subjet content in CF7 email subjet
        if(!empty($offer_reference) && $offer_reference != " "){
            $mail['subject'] = "#".$offer_reference." ".$offer_name ;
            $mail2['subject'] = "#".$offer_reference." ".$offer_name ;
        }else{
            $mail['subject'] = "CANDIDATURE SPONTANÉE ".$offre_spontannee ;
            $mail2['subject'] = "CANDIDATURE SPONTANÉE ".$offre_spontannee ;
        }
        
        // Find/replace the body content in CF7 email body
        $mail['body'] = $offre_spontannee.
                        $mail['body'];
        $mail2['body'] = $offre_spontannee.
                        $mail2['body'];


        // Save the email content
        $form->set_properties(array("mail" => $mail,"mail_2" => $mail2));
    }

    // return current cf7 instance
    return $form;
  
}


//alphabétique nom & prenom 
add_filter( 'wpcf7_validate_text', 'custom_text_validation_filter', 20, 2 );
add_filter( 'wpcf7_validate_text*', 'custom_text_validation_filter', 20, 2 );
 
function custom_text_validation_filter( $result, $tag ) {
    $tag = new WPCF7_Shortcode( $tag );
 
    if ( 'nom' == $tag->name || 'prenom' == $tag->name  ) {
        $tagvalue = isset( $_POST[$tag->name] ) ? trim( $_POST[$tag->name] ) : '';
        if (!preg_match("/^\p{L}+$/ui",$tagvalue)){
            $result->invalidate( $tag, "format invalide" );
        }
    }
 
    return $result;
}


?>