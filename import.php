<?php

function connectToDb() {
	$servername = "zeeni.c21krc60aef3.us-west-2.rds.amazonaws.com";
	$username = "zeeni";
	$password = "Ze3n!.c0m";
	$dbname = "zeenipet";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	return $conn;
}

function importToDb($file, $table, $attributes) {
	$conn = connectToDb();

	if (($handle = fopen($file, "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data);
			for ($c=0; $c < $num; $c++) {
				$sql = "INSERT INTO " . $table . " (" . $attributes . ") VALUES (" . str_replace(";", ",", $data[$c]) . ");";
				echo $sql . "<br/>";

				if ($conn->query($sql) === TRUE) {
					echo "<br/>++++++++<br/>New record created successfully<br/>++++++++<br/>";
				} 
				else {
				    echo "<br/>----------<br/>Error: " . $sql . "<br>" . $conn->error . "<br/>----------<br/>";
				}
			}
		}
	}
}

// importToDb("csv_for_ec2_zeeni/catalog_category_product_index.csv", "catalog_category_product_index", "`category_id`, `product_id`, `position`, `is_parent`, `store_id`, `visibility`");

// importToDb("csv_for_ec2_zeeni/catalog_category_product.csv", "catalog_category_product", "`category_id`, `product_id`, `position`");

// importToDb("csv_for_ec2_zeeni/catalog_compare_item.csv", "catalog_compare_item", "`catalog_compare_item_id`, `visitor_id`, `customer_id`, `product_id`, `store_id`");

// importToDb("csv_for_ec2_zeeni/catalog_eav_attribute.csv", "catalog_eav_attribute", "`attribute_id`, `frontend_input_renderer`, `is_global`, `is_visible`, `is_searchable`, `is_filterable`, `is_comparable`, `is_visible_on_front`, `is_html_allowed_on_front`, `is_used_for_price_rules`, `is_filterable_in_search`, `used_in_product_listing`, `used_for_sort_by`, `is_configurable`, `apply_to`, `is_visible_in_advanced_search`, `position`, `is_wysiwyg_enabled`, `is_used_for_promo_rules`");

// importToDb("csv_for_ec2_zeeni/cataloginventory_stock_status.csv", "cataloginventory_stock_status", "`product_id`, `website_id`, `stock_id`, `qty`, `stock_status`");

// importToDb("csv_for_ec2_zeeni/cataloginventory_stock_status_idx.csv", "cataloginventory_stock_status_idx", "`product_id`, `website_id`, `stock_id`, `qty`, `stock_status`");

// importToDb("csv_for_ec2_zeeni/cataloginventory_stock_status.csv", "cataloginventory_stock_status", "`product_id`, `website_id`, `stock_id`, `qty`, `stock_status`");

//-- importToDb("csv_for_ec2_zeeni/catalogsearch_fulltext.csv", "catalogsearch_fulltext", "`fulltext_id`, `product_id`, `store_id`, `data_index`");

// importToDb("csv_for_ec2_zeeni/catalogsearch_query.csv", "catalogsearch_query", "`query_id`, `query_text`, `num_results`, `popularity`, `redirect`, `synonym_for`, `store_id`, `display_in_terms`, `is_active`, `is_processed`, `updated_at`");

// importToDb("csv_for_ec2_zeeni/catalogsearch_result.csv", "catalogsearch_result", "`query_id`, `product_id`, `relevance`");

// importToDb("csv_for_ec2_zeeni/catalog_product_entity.csv", "catalog_product_entity", "`entity_id`, `entity_type_id`, `attribute_set_id`, `type_id`, `sku`, `has_options`, `required_options`, `created_at`, `updated_at`");

// importToDb("csv_for_ec2_zeeni/catalog_product_entity_datetime.csv", "catalog_product_entity_datetime", "`value_id`, `entity_type_id`, `attribute_id`, `store_id`, `entity_id`, `value`");

// importToDb("csv_for_ec2_zeeni/catalog_product_entity_decimal.csv", "catalog_product_entity_decimal", "`value_id`, `entity_type_id`, `attribute_id`, `store_id`, `entity_id`, `value`");

// importToDb("csv_for_ec2_zeeni/catalog_product_entity_int.csv", "catalog_product_entity_int", "`value_id`, `entity_type_id`, `attribute_id`, `store_id`, `entity_id`, `value`");

// importToDb("csv_for_ec2_zeeni/catalog_product_entity_media_gallery.csv", "catalog_product_entity_media_gallery", "`value_id`, `attribute_id`, `entity_id`, `value`");

// importToDb("csv_for_ec2_zeeni/catalog_product_entity_media_gallery_value.csv", "catalog_product_entity_media_gallery_value", "`value_id`, `store_id`, `label`, `position`, `disabled`, `cgimage`");

// importToDb("csv_for_ec2_zeeni/catalog_product_entity_text.csv", "catalog_product_entity_text", "`value_id`, `entity_type_id`, `attribute_id`, `store_id`, `entity_id`, `value`");

// importToDb("csv_for_ec2_zeeni/catalog_product_entity_varchar.csv", "catalog_product_entity_varchar", "`value_id`, `entity_type_id`, `attribute_id`, `store_id`, `entity_id`, `value`");


// importToDb("csv_for_ec2_zeeni/catalog_product_index_eav.csv", "catalog_product_index_eav", "`entity_id`, `attribute_id`, `store_id`, `value`");

// importToDb("csv_for_ec2_zeeni/catalog_product_index_eav_idx.csv", "catalog_product_index_eav_idx", "`entity_id`, `attribute_id`, `store_id`, `value`");


// importToDb("csv_for_ec2_zeeni/catalog_product_index_price.csv", "catalog_product_index_price", "`entity_id`, `customer_group_id`, `website_id`, `tax_class_id`, `price`, `final_price`, `min_price`, `max_price`, `tier_price`, `group_price`");

// importToDb("csv_for_ec2_zeeni/catalog_product_link.csv", "catalog_product_link", "`link_id`, `product_id`, `linked_product_id`, `link_type_id`");

// importToDb("csv_for_ec2_zeeni/catalog_product_link.csv", "catalog_product_link", "`link_id`, `product_id`, `linked_product_id`, `link_type_id`");

// importToDb("csv_for_ec2_zeeni/catalog_product_option.csv", "catalog_product_option", "`option_id`, `product_id`, `type`, `is_require`, `sku`, `max_characters`, `file_extension`, `image_size_x`, `image_size_y`, `sort_order`");

// importToDb("csv_for_ec2_zeeni/catalog_product_option_title.csv", "catalog_product_option_title", "`option_title_id`, `option_id`, `store_id`, `title`");

// importToDb("csv_for_ec2_zeeni/catalog_product_option_type_price.csv", "catalog_product_option_type_price", "`option_type_price_id`, `option_type_id`, `store_id`, `price`, `price_type`");


// importToDb("csv_for_ec2_zeeni/catalog_product_option_type_title.csv", "`catalog_product_option_type_title`", "`option_type_title_id`, `option_type_id`, `store_id`, `title`");

// importToDb("csv_for_ec2_zeeni/catalog_product_option_type_value.csv", "`catalog_product_option_type_value`", "`option_type_id`, `option_id`, `sku`, `sort_order`");














