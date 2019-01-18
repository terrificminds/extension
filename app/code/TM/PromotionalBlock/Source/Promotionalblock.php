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
 * @copyright Copyright (c) 2019
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 */
namespace TM\PromotionalBlock\Source;

class Promotionalblock implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Promotional Block repository
     * 
     * @var \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface
     */
    protected $promotionalblockRepository;

    /**
     * Search Criteria Builder
     * 
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    /**
     * Filter Builder
     * 
     * @var \Magento\Framework\Api\FilterBuilder
     */
    protected $filterBuilder;

    /**
     * Options
     * 
     * @var array
     */
    protected $options;

    /**
     * constructor
     * 
     * @param \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface $promotionalblockRepository
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param \Magento\Framework\Api\FilterBuilder $filterBuilder
     */
    public function __construct(
        \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface $promotionalblockRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder
    ) {
        $this->promotionalblockRepository = $promotionalblockRepository;
        $this->searchCriteriaBuilder      = $searchCriteriaBuilder;
        $this->filterBuilder              = $filterBuilder;
    }

    /**
     * Retrieve all Promotional Blocks as an option array
     *
     * @return array
     * @throws StateException
     */
    public function getAllOptions()
    {
        if (empty($this->options)) {
            $options = [];
            $searchCriteria = $this->searchCriteriaBuilder->create();
            $searchResults = $this->promotionalblockRepository->getList($searchCriteria);
            foreach ($searchResults->getItems() as $promotionalblock) {
                $options[] = [
                    'value' => $promotionalblock->getPromotionalblockId(),
                    'label' => $promotionalblock->getName(),
                ];
            }
            $this->options = $options;
        }

        return $this->options;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return $this->getAllOptions();
    }
}
