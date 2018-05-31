<?php
 
class Product extends ProductCore
{
    public $pointsforts;
 
    public function __construct($id_product = null, $full = false, $id_lang = null, $id_shop = null, Context $context = null)
    {
      Product::$definition['fields']['pointsforts'] = array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString');
      parent::__construct($id_product, $full, $id_lang, $id_shop, $context);
    }
 
}