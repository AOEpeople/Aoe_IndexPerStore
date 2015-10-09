<?php

/**
 * Helper
 *
 * @author Manish Jain
 */
class Aoe_StoreIndex_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Enable/Disable Index constants
     */
    const XML_PATH_ENABLE_PRODUCT_ATTRIBUTES = 'aoe_storeindex/options/product_attributes';
    const XML_PATH_ENABLE_CATALOG_URL_REWRITES = 'aoe_storeindex/options/catalog_url_rewrites';
    const XML_PATH_ENABLE_CATEGORY_FLAT = 'aoe_storeindex/options/category_flat';
    const XML_PATH_ENABLE_PRODUCT_FLAT = 'aoe_storeindex/options/product_flat';
    const XML_PATH_ENABLE_CATEGORY_PRODUCT = 'aoe_storeindex/options/category_product';
    const XML_PATH_ENABLE_FULLTEXT = 'aoe_storeindex/options/fulltext';
    const XML_PATH_ENABLE_PRODUCT_PRICE_STOCK = 'aoe_storeindex/options/product_price_and_stock';
    const XML_PATH_ENABLE_TAG_SUMMARY = 'aoe_storeindex/options/tag_summary';

    /**
     * Check if Product Attributes Index is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isProductAttributesIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_PRODUCT_ATTRIBUTES, $storeId );
    }

    /**
     * Check if Catalog URL Rewrites Index is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isCatalogUrlRewritesIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_CATALOG_URL_REWRITES, $storeId );
    }

    /**
     * Check if Category Flat Index is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isCategoryFlatIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_CATEGORY_FLAT, $storeId );
    }

    /**
     * Check if Product Flat Index is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isProductFlatIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_PRODUCT_FLAT, $storeId );
    }

    /**
     * Check if Category Product Index is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isCategoryProductIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_CATEGORY_PRODUCT, $storeId );
    }

    /**
     * Check if Catalog Search Index is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isFulltextIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_FULLTEXT, $storeId );
    }

    /**
     * Check if Product Price and Stock Index is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isPriceStockIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_PRODUCT_PRICE_STOCK, $storeId );
    }

    /**
     * Check if Tag Aggregation Data Index is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isTagSummaryIndexEnabled($storeId = null)
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLE_TAG_SUMMARY, $storeId );
    }
}
