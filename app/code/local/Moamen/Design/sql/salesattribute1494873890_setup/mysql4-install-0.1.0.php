<?php
$installer = $this;
$installer->startSetup();

$installer->addAttribute("quote_item", "custom_image", array("type"=>"text"));
$installer->addAttribute("order_item", "custom_image", array("type"=>"text"));
$installer->addAttribute("invoice_item", "custom_image", array("type"=>"text"));
$installer->addAttribute("creditmemo_item", "custom_image", array("type"=>"text"));
$installer->addAttribute("shipment_item", "custom_image", array("type"=>"text"));
$installer->addAttribute("quote_address_item", "custom_image", array("type"=>"text"));
$installer->endSetup();
	 