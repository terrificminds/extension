<?php
/**
 * TM_PromotionalBlock extension
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 * 
 * @category  TM
 * @package   TM_PromotionalBlock
 * @author    kavitha@terrificminds.com
 * @copyright Copyright (c) 2019
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 */
namespace TM\PromotionalBlock\Model;

class PromotionalblockRepository implements \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface
{
    /**
     * Cached instances
     * 
     * @var array
     */
    protected $instances = [];

    /**
     * Promotional Block resource model
     * 
     * @var \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock
     */
    protected $resource;

    /**
     * Promotional Block collection factory
     * 
     * @var \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock\CollectionFactory
     */
    protected $promotionalblockCollectionFactory;

    /**
     * Promotional Block interface factory
     * 
     * @var \TM\PromotionalBlock\Api\Data\PromotionalblockInterfaceFactory
     */
    protected $promotionalblockInterfaceFactory;

    /**
     * Data Object Helper
     * 
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * Search result factory
     * 
     * @var \TM\PromotionalBlock\Api\Data\PromotionalblockSearchResultInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * constructor
     * 
     * @param \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock $resource
     * @param \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock\CollectionFactory $promotionalblockCollectionFactory
     * @param \TM\PromotionalBlock\Api\Data\PromotionalblockInterfaceFactory $promotionalblockInterfaceFactory
     * @param \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
     * @param \TM\PromotionalBlock\Api\Data\PromotionalblockSearchResultInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock $resource,
        \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock\CollectionFactory $promotionalblockCollectionFactory,
        \TM\PromotionalBlock\Api\Data\PromotionalblockInterfaceFactory $promotionalblockInterfaceFactory,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper,
        \TM\PromotionalBlock\Api\Data\PromotionalblockSearchResultInterfaceFactory $searchResultsFactory
    ) {
        $this->resource                          = $resource;
        $this->promotionalblockCollectionFactory = $promotionalblockCollectionFactory;
        $this->promotionalblockInterfaceFactory  = $promotionalblockInterfaceFactory;
        $this->dataObjectHelper                  = $dataObjectHelper;
        $this->searchResultsFactory              = $searchResultsFactory;
    }

    /**
     * Save Promotional Block.
     *
     * @param \TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock
     * @return \TM\PromotionalBlock\Api\Data\PromotionalblockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock)
    {
        /** @var \TM\PromotionalBlock\Api\Data\PromotionalblockInterface|\Magento\Framework\Model\AbstractModel $promotionalblock */
        try {
            $this->resource->save($promotionalblock);
        } catch (\Exception $exception) {
            throw new \Magento\Framework\Exception\CouldNotSaveException(__(
                'Could not save the Promotional&#x20;Block: %1',
                $exception->getMessage()
            ));
        }
        return $promotionalblock;
    }

    /**
     * Retrieve Promotional Block.
     *
     * @param int $promotionalblockId
     * @return \TM\PromotionalBlock\Api\Data\PromotionalblockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($promotionalblockId)
    {
        if (!isset($this->instances[$promotionalblockId])) {
            /** @var \TM\PromotionalBlock\Api\Data\PromotionalblockInterface|\Magento\Framework\Model\AbstractModel $promotionalblock */
            $promotionalblock = $this->promotionalblockInterfaceFactory->create();
            $this->resource->load($promotionalblock, $promotionalblockId);
            if (!$promotionalblock->getId()) {
                throw new \Magento\Framework\Exception\NoSuchEntityException(__('Requested Promotional&#x20;Block doesn\'t exist'));
            }
            $this->instances[$promotionalblockId] = $promotionalblock;
        }
        return $this->instances[$promotionalblockId];
    }

    /**
     * Retrieve Promotional Blocks matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \TM\PromotionalBlock\Api\Data\PromotionalblockSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /** @var \TM\PromotionalBlock\Api\Data\PromotionalblockSearchResultInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

        /** @var \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock\Collection $collection */
        $collection = $this->promotionalblockCollectionFactory->create();

        //Add filters from root filter group to the collection
        /** @var \Magento\Framework\Api\Search\FilterGroup $group */
        foreach ($searchCriteria->getFilterGroups() as $group) {
            $this->addFilterGroupToCollection($group, $collection);
        }
        $sortOrders = $searchCriteria->getSortOrders();
        /** @var \Magento\Framework\Api\SortOrder $sortOrder */
        if ($sortOrders) {
            foreach ($searchCriteria->getSortOrders() as $sortOrder) {
                $field = $sortOrder->getField();
                $collection->addOrder(
                    $field,
                    ($sortOrder->getDirection() == \Magento\Framework\Api\SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        } else {
            // set a default sorting order since this method is used constantly in many
            // different blocks
            $field = 'promotionalblock_id';
            $collection->addOrder($field, 'ASC');
        }
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());

        /** @var \TM\PromotionalBlock\Api\Data\PromotionalblockInterface[] $promotionalblocks */
        $promotionalblocks = [];
        /** @var \TM\PromotionalBlock\Model\Promotionalblock $promotionalblock */
        foreach ($collection as $promotionalblock) {
            /** @var \TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblockDataObject */
            $promotionalblockDataObject = $this->promotionalblockInterfaceFactory->create();
            $this->dataObjectHelper->populateWithArray(
                $promotionalblockDataObject,
                $promotionalblock->getData(),
                \TM\PromotionalBlock\Api\Data\PromotionalblockInterface::class
            );
            $promotionalblocks[] = $promotionalblockDataObject;
        }
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults->setItems($promotionalblocks);
    }

    /**
     * Delete Promotional Block.
     *
     * @param \TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock)
    {
        /** @var \TM\PromotionalBlock\Api\Data\PromotionalblockInterface|\Magento\Framework\Model\AbstractModel $promotionalblock */
        $id = $promotionalblock->getId();
        try {
            unset($this->instances[$id]);
            $this->resource->delete($promotionalblock);
        } catch (\Magento\Framework\Exception\ValidatorException $e) {
            throw new \Magento\Framework\Exception\CouldNotSaveException(__($e->getMessage()));
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\StateException(
                __('Unable to remove Promotional&#x20;Block %1', $id)
            );
        }
        unset($this->instances[$id]);
        return true;
    }

    /**
     * Delete Promotional Block by ID.
     *
     * @param int $promotionalblockId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($promotionalblockId)
    {
        $promotionalblock = $this->getById($promotionalblockId);
        return $this->delete($promotionalblock);
    }

    /**
     * Helper function that adds a FilterGroup to the collection.
     *
     * @param \Magento\Framework\Api\Search\FilterGroup $filterGroup
     * @param \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock\Collection $collection
     * @return $this
     * @throws \Magento\Framework\Exception\InputException
     */
    protected function addFilterGroupToCollection(
        \Magento\Framework\Api\Search\FilterGroup $filterGroup,
        \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock\Collection $collection
    ) {
        $fields = [];
        $conditions = [];
        foreach ($filterGroup->getFilters() as $filter) {
            $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
            $fields[] = $filter->getField();
            $conditions[] = [$condition => $filter->getValue()];
        }
        if ($fields) {
            $collection->addFieldToFilter($fields, $conditions);
        }
        return $this;
    }
}
