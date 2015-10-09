<?php
/**
 * Catalog Product Flat Indexer Resource Model
 *
 * @category   Aoe
 * @package    Aoe_StoreIndex
 * @author     Manish Jain <manish.jain@aoe.com>
 */
class Aoe_StoreIndex_Model_Catalog_Resource_Product_Flat_Indexer extends Mage_Catalog_Model_Resource_Product_Flat_Indexer
{
    /**
     * Transactional rebuild Catalog Product Flat Data
     *
     * @return Mage_Catalog_Model_Resource_Product_Flat_Indexer
     */
    public function reindexAll()
    {
        foreach (Mage::app()->getStores() as $storeId => $store) {

            $helper = Mage::helper('aoe_storeindex'); /* @var $helper Aoe_StoreIndex_Helper_Data */
            if (!$helper->isProductFlatIndexEnabled($storeId)) {
                return $this;
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
