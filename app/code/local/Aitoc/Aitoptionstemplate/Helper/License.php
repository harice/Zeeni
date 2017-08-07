<?php
/**
 * Custom Options Templates
 *
 * @category:    Aitoc
 * @package:     Aitoc_Aitoptionstemplate
 * @version      3.2.2
 * @license:     FoqAPsDYiV5k0g2ao7Zx8pPoJiVNkUYZBpxixzEerG
 * @copyright:   Copyright (c) 2013 AITOC, Inc. (http://www.aitoc.com)
 */
/**
 * @copyright  Copyright (c) 2010 AITOC, Inc. 
 */
class Aitoc_Aitoptionstemplate_Helper_License extends Aitoc_Aitsys_Helper_License
{
    public function getRuleTotalCount($ruleCode)
    {
        switch ($ruleCode)
        {
            case 'product':
                $count = $this->getProductCount();
                break;
            default:
                $count = 0;
                break;
        }
        return $count;
    }
    
    public function getProductCount()
    {
        $product = new Mage_Catalog_Model_Product();

        $priceTypeAttr = Mage::getModel('eav/entity_attribute')->loadByCode('catalog_product','price_type');
        $bundleResource = Mage::getResourceSingleton('bundle/bundle');
        $sAttrTableName = $priceTypeAttr->getBackend()->getTable();

        $collection = $product->getCollection()
            ->addFieldToFilter('type_id', array('neq'=>Mage_Catalog_Model_Product_Type::TYPE_GROUPED))
            ->addFieldToFilter($product->getResource()->getIdFieldName(), array('neq'=>(int)Mage::getStoreConfig('general/aitoptionstemplate/default_product_id')));
        $collection->getSelect()
            ->joinLeft($sAttrTableName." AS att"," att.entity_id = e.entity_id AND att.attribute_id = " . $priceTypeAttr->getId(), array())
            ->where('e.type_id != "'.Mage_Catalog_Model_Product_Type::TYPE_BUNDLE.'" OR att.value = 1');
        $collection->load();
        return $collection->count();
    }
    
}