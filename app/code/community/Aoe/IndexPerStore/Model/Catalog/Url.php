<?php
/**
 * Catalog url model
 *
 * @category   Aoe
 * @package    Aoe_IndexPerStore
 * @author     Manish Jain <manish.jain@aoe.com>
 */
class Aoe_IndexPerStore_Model_Catalog_Url extends Mage_Catalog_Model_Url
{
    /**
     * Refresh all rewrite urls for some store or for all stores
     * Used to make full reindexing of url rewrites
     *
     * @param int $storeId
     * @return Mage_Catalog_Model_Url
     */
    public function refreshRewrites($storeId = null)
    {
        if (is_null($storeId)) {
            foreach ($this->getStores() as $store) {
                $this->refreshRewrites($store->getId());
            }
            return $this;
        }
        /**
         * Skip catalog url rewrite indexing if disabled for store
         */
        $helper = Mage::helper('aoe_indexperstore'); /* @var $helper Aoe_IndexPerStore_Helper_Data */
        if ($helper->isCatalogUrlRewritesIndexEnabled($storeId) === false)
        {
            Mage::log('CATALOG URL REWRITES INDEXING IS DISABLED FOR STORE ID '. $storeId, null, 'aoe_indexperstore.log');
            return $this;
        }

        $this->clearStoreInvalidRewrites($storeId);
        $this->refreshCategoryRewrite($this->getStores($storeId)->getRootCategoryId(), $storeId, false);
        $this->refreshProductRewrites($storeId);
        $this->getResource()->clearCategoryProduct($storeId);

        return $this;
    }
}
