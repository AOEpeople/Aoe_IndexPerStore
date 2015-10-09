<?php
/**
 * Catalog Product Flat Indexer Resource Model
 *
 * @category   Aoe
 * @package    Aoe_IndexPerStore
 * @author     Manish Jain <manish.jain@aoe.com>
 */
class Aoe_IndexPerStore_Model_Resource_Catalog_Product_Flat_Indexer extends Mage_Catalog_Model_Resource_Product_Flat_Indexer
{
    /**
     * Transactional rebuild Catalog Product Flat Data
     *
     * @return Mage_Catalog_Model_Resource_Product_Flat_Indexer
     */
    public function reindexAll()
    {

        foreach (Mage::app()->getStores() as $storeId => $store) {
            /**
             * Skip product flat indexing if disabled for store
             */
            $helper = Mage::helper('aoe_indexperstore'); /* @var $helper Aoe_IndexPerStore_Helper_Data */
            if ($helper->isProductFlatIndexEnabled($storeId) === false)
            {
                Mage::log('PRODUCT FLAT INDEXING IS DISABLED FOR STORE ID '. $storeId, null, 'aoe_indexperstore.log');
                continue;
            }

            $this->prepareFlatTable($storeId);
            $this->beginTransaction();
            try {
                $this->rebuild($store);
                $this->commit();
           } catch (Exception $e) {
                $this->rollBack();
                throw $e;
           }
        }

        return $this;
    }
}
