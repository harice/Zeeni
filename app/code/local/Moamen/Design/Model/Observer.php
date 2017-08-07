<?php
class Moamen_Design_Model_Observer
{

			public function salesConvertQuoteItemToOrderItem($observer)
			{
				$orderItem = $observer->getEvent()->getOrderItem();
				$quoteItem = $observer->getEvent()->getItem();
				$orderItem->setCustomImage($quoteItem->getCustomImage());
				$orderItem->setData('custom_image',$quoteItem->getData('custom_image'));
			}
		
			public function salesConvertOrderItemToQuoteItem($observer)
			{
				$orderItem = $observer->getEvent()->getOrderItem();
				$quoteItem = $observer->getEvent()->getQuoteItem();
				
				$quoteItem->setCustomImage($orderItem->getCustomImage());
				$quoteItem->setData('custom_image',$orderItem->getData('custom_image'));
			}
		
			public function checkoutCartAddProductComplete($observer)
			{
				$quoteItem = $observer->getEvent()->getQuoteItem();
				$this->_handleQuoteItem($quoteItem);
			}
		
			public function checkoutCartUpdateItemComplete($observer)
			{
				$quoteItem = $observer->getEvent()->getItem();
				$this->_handleQuoteItem($quoteItem);
			}
			
			private function _handleQuoteItem($quoteItem){
				
				$customImage = Mage::app()->getRequest()->getParam('custom_image');
				
				if($customImage && stripos($customImage, ':image/png;base64')){
					$mediaDir = Mage::getSingleton('catalog/product_media_config')->getBaseMediaPath().'/item/';
					if(!is_dir($mediaDir)){
						mkdir($mediaDir,0777,true);
					}
					
					$imageId = uniqid().'.png';
					$this->base64_to_image($customImage,$mediaDir.$imageId);
					
					$quoteItem->setCustomImage($imageId);
					$quoteItem->setData('custom_image',$imageId);
					if($quoteItem->getId()){
						$quoteItem->save();
					}
				}
			}
			
			private function base64_to_image($base64_string, $output_file) {
				$ifp = fopen( $output_file, 'wb' ); 

				$data = explode( ',', $base64_string );
				$data[ 1 ] = str_replace(' ', '+', $data[ 1 ]);

				fwrite( $ifp, base64_decode( $data[ 1 ] ) );

				fclose( $ifp ); 

				return $output_file; 
			}
		
}
