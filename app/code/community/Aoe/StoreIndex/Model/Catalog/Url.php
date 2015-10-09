<?php
/**
 * Catalog url model
 *
 * @category   Aoe
 * @package    Aoe_StoreIndex
 * @author     Manish Jain <manish.jain@aoe.com>
 */
class Aoe_StoreIndex_Model_Catalog_Url extends Mage_Catalog_Model_Url
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

        $helper = Mage::helper('aoe_storeindex'); /* @var $helper Aoe_StoreIndex_Helper_Data */
        if (!$helper->isCatalogUrlRewritesIndexEnabled($storeId)) {
            return $this;
        }

        $this->clearStoreInvalidRewrites($storeId);
        $this->refreshCategoryRewrite($this->getStores($storeId)->getRootCategoryId(), $storeId, false);
        $this->refreshProductRewrites($storeId);
        $this->getResource()->clearCategoryProduct($storeId);

        return $this;
    }
}
