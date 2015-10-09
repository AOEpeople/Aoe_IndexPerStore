<?php

/**
 * Helper
 *
 * @author Manish Jain
 */
class Aoe_StoreIndex_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_ENABLE_PRODUCT_ATTRIBUTES = 'aoe_storeindex/options/product_attributes';
    const XML_PATH_ENABLE_CATALOG_URL_REWRITES = 'aoe_storeindex/options/catalog_url_rewrites';
    const XML_PATH_ENABLE_CATEGORY_FLAT = 'aoe_storeindex/options/category_flat';
    const XML_PATH_ENABLE_PRODUCT_FLAT = 'aoe_storeindex/options/product_flat';
    const XML_PATH_ENABLE_CATEGORY_PRODUCT = 'aoe_storeindex/options/category_product';
    const XML_PATH_ENABLE_FULLTEXT = 'aoe_storeindex/options/fulltext';
    const XML_PATH_ENABLE_PRODUCT_PRICE_STOCK = 'aoe_storeindex/options/product_price_and_stock';
    const XML_PATH_ENABLE_TAG_SUMMARY = 'aoe_storeindex/options/tag_summary';

    public function isProductAttributesIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_PRODUCT_ATTRIBUTES, $storeId );
    }

    public function isCatalogUrlRewritesIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_CATALOG_URL_REWRITES, $storeId );
    }

    public function isCategoryFlatIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_CATEGORY_FLAT, $storeId );
    }

    public function isProductFlatIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_PRODUCT_FLAT, $storeId );
    }

    public function isCategoryProductIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_CATEGORY_PRODUCT, $storeId );
    }

    public function isFulltextIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_FULLTEXT, $storeId );
    }

    public function isPriceStockIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_PRODUCT_PRICE_STOCK, $storeId );
    }

    public function isTagSummaryIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_TAG_SUMMARY, $storeId );
    }
}
