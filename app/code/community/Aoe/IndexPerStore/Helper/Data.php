<?php

/**
 * Helper
 *
 * @author Manish Jain
 */
class Aoe_IndexPerStore_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Enable/Disable Index constants
     */
    const XML_PATH_ENABLE_PRODUCT_ATTRIBUTES = 'aoe_indexperstore/options/product_attributes';
    const XML_PATH_ENABLE_CATALOG_URL_REWRITES = 'aoe_indexperstore/options/catalog_url_rewrites';
    const XML_PATH_ENABLE_CATEGORY_FLAT = 'aoe_indexperstore/options/category_flat';
    const XML_PATH_ENABLE_PRODUCT_FLAT = 'aoe_indexperstore/options/product_flat';
    const XML_PATH_ENABLE_CATEGORY_PRODUCT = 'aoe_indexperstore/options/category_product';
    const XML_PATH_ENABLE_FULLTEXT = 'aoe_indexperstore/options/fulltext';
    const XML_PATH_ENABLE_PRODUCT_PRICE_STOCK = 'aoe_indexperstore/options/product_price_and_stock';
    const XML_PATH_ENABLE_TAG_SUMMARY = 'aoe_indexperstore/options/tag_summary';

    /**
     * Check if Catalog URL Rewrites Index is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isCatalogUrlRewritesIndexEnabled($storeId = null)
    {
        return (bool) Mage::getStoreConfig( self::XML_PATH_ENABLE_CATALOG_URL_REWRITES, $storeId );
    }

    /**
     * Check if Category Flat Index is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isCategoryFlatIndexEnabled($storeId = null)
    {
        return (bool) Mage::getStoreConfig( self::XML_PATH_ENABLE_CATEGORY_FLAT, $storeId );
    }

    /**
     * Check if Product Flat Index is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isProductFlatIndexEnabled($storeId = null)
    {
        return (bool) Mage::getStoreConfig( self::XML_PATH_ENABLE_PRODUCT_FLAT, $storeId );
    }

    /**
     * Check if Category Product Index is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isCategoryProductIndexEnabled($storeId = null)
    {
        return (bool) Mage::getStoreConfig( self::XML_PATH_ENABLE_CATEGORY_PRODUCT, $storeId );
    }

    /**
     * Check if Catalog Search Index is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isFulltextIndexEnabled($storeId = null)
    {
        return (bool) Mage::getStoreConfig( self::XML_PATH_ENABLE_FULLTEXT, $storeId );
    }
}
