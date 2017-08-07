<?php
class Moamen_Design_Block_Checkout_Cart_Item_Renderer extends Mage_Checkout_Block_Cart_Item_Renderer
{
	public function getProductThumbnail()
    {
		$baseDir = Mage::getSingleton('catalog/product_media_config')->getBaseMediaPath().'/';
		$imageFile = 'item/'.$this->getItem()->getCustomImage();
		
        if ($this->getItem()->getCustomImage() 
			&& is_file($baseDir.$imageFile)) {
				
			$f = new Mage_Catalog_Helper_Image;
			$f->init($this->getItem()->getProduct(),'thumbnail', $imageFile);
			$f->placeholder('item/'.$this->getItem()->getCustomImage());
			
			return $f;
        } else {
            return parent::getProductThumbnail();
        }
    }
}
			