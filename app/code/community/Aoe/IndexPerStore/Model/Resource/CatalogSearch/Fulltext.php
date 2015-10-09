<?php
/**
 * CatalogSearch Fulltext Index resource model
 *
 * @category   Aoe
 * @package    Aoe_IndexPerStore
 * @author     Manish Jain <manish.jain@aoe.com>
 */
class Aoe_IndexPerStore_Model_Resource_CatalogSearch_Fulltext extends Mage_CatalogSearch_Model_Resource_Fulltext
{
    /**
     * Regenerate search index for store(s)
     *
     * @param  int|null $storeId
     * @param  int|array|null $productIds
     * @return Mage_CatalogSearch_Model_Resource_Fulltext
     */
    public function rebuildIndex($storeId = null, $productIds = null)
    {
        /**
         * Skip product flat indexing if disabled for store
         */
        $helper = Mage::helper('aoe_indexperstore'); /* @var $helper Aoe_IndexPerStore_Helper_Data */
        $isFulltextIndexEnabled = $helper->isFulltextIndexEnabled($storeId);

        if (is_null($storeId)) {
            $storeIds = array_keys(Mage::app()->getStores());
            foreach ($storeIds as $storeId) {
                if ($isFulltextIndexEnabled === false) {
                    Mage::log('CATALOG SEARCH INDEXING IS DISABLED FOR STORE ID '. $storeId, null, 'aoe_indexperstore.log');
                    continue;
                }
                $this->_rebuildStoreIndex($storeId, $productIds);
            }
        } else {
            if ($isFulltextIndexEnabled === false) {
                Mage::log('CATALOG SEARCH INDEXING IS DISABLED FOR STORE ID '. $storeId, null, 'aoe_indexperstore.log');
                return $this;
            }
            $this->_rebuildStoreIndex($storeId, $productIds);
        }

        return $this;
    }
}
