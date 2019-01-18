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
namespace TM\PromotionalBlock\Controller\Adminhtml;

abstract class Promotionalblock extends \Magento\Backend\App\Action
{
    /**
     * Core registry
     * 
     * @var \Magento\Framework\Registry
     */
    protected $coreRegistry;

    /**
     * Promotional Block repository
     * 
     * @var \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface
     */
    protected $promotionalblockRepository;

    /**
     * Page factory
     * 
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * constructor
     * 
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface $promotionalblockRepository
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface $promotionalblockRepository,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->coreRegistry               = $coreRegistry;
        $this->promotionalblockRepository = $promotionalblockRepository;
        $this->resultPageFactory          = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * filter values
     *
     * @param array $data
     * @return array
     */
    protected function filterData($data)
    {
        if (isset($data['customergroups'])) {
            if (is_array($data['customergroups'])) {
                $data['customergroups'] = implode(',', $data['customergroups']);
            }
        }
        return $data;
    }
}
