<?php
/**
 * Category flat model
 *
 * @category   Aoe
 * @package    Aoe_IndexPerStore
 * @author     Manish Jain <manish.jain@aoe.com>
 */
class Aoe_IndexPerStore_Model_Resource_Catalog_Category_Flat extends Mage_Catalog_Model_Resource_Category_Flat
{
    /**
     * Rebuild flat data from eav
     *
     * @param array|null $stores
     * @return Mage_Catalog_Model_Resource_Category_Flat
     */
    public function rebuild($stores = null)
    {
        if ($stores === null) {
            $stores = Mage::app()->getStores();
        }

        if (!is_array($stores)) {
            $stores = array($stores);
        }

        $rootId = Mage_Catalog_Model_Category::TREE_ROOT_ID;
        $categories = array();
        $categoriesIds = array();
        /* @var $store Mage_Core_Model_Store */
        foreach ($stores as $store) {
            /**
             * Skip category flat indexing if disabled for store
             */
            $helper = Mage::helper('aoe_indexperstore'); /* @var $helper Aoe_IndexPerStore_Helper_Data */
            if ($helper->isCategoryFlatIndexEnabled($store->getId()) === false)
            {
                Mage::log('CATEGORY FLAT INDEXING IS DISABLED FOR STORE ID '. $store->getId(), null, 'aoe_indexperstore.log');
                continue;
            }

            if ($this->_allowTableChanges) {
                $this->_createTable($store->getId());
            }

            if (!isset($categories[$store->getRootCategoryId()])) {
                $select = $this->_getWriteAdapter()->select()
                    ->from($this->getTable('catalog/category'))
                    ->where('path = ?', (string)$rootId)
                    ->orWhere('path = ?', "{$rootId}/{$store->getRootCategoryId()}")
                    ->orWhere('path LIKE ?', "{$rootId}/{$store->getRootCategoryId()}/%");
                $categories[$store->getRootCategoryId()] = $this->_getWriteAdapter()->fetchAll($select);
                $categoriesIds[$store->getRootCategoryId()] = array();
                foreach ($categories[$store->getRootCategoryId()] as $category) {
                    $categoriesIds[$store->getRootCategoryId()][] = $category['entity_id'];
                }
            }
            $categoriesIdsChunks = array_chunk($categoriesIds[$store->getRootCategoryId()], self::CATEGORY_BATCH);
            foreach ($categoriesIdsChunks as $categoriesIdsChunk) {
                $attributesData = $this->_getAttributeValues($categoriesIdsChunk, $store->getId());
                $data = array();
                foreach ($categories[$store->getRootCategoryId()] as $category) {
                    if (!isset($attributesData[$category['entity_id']])) {
                        continue;
                    }
                    $category['store_id'] = $store->getId();
                    $data[] = $this->_prepareValuesToInsert(
                        array_merge($category, $attributesData[$category['entity_id']])
                    );
                }
                $this->_getWriteAdapter()->insertMultiple($this->getMainStoreTable($store->getId()), $data);
            }
        }
        return $this;
    }
}
