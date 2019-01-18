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
namespace TM\PromotionalBlock\Controller\Adminhtml\Promotionalblock;

class InlineEdit extends \TM\PromotionalBlock\Controller\Adminhtml\Promotionalblock
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
     * Date filter
     * 
     * @var \Magento\Framework\Stdlib\DateTime\Filter\Date
     */
    protected $dateFilter;

    /**
     * Data object processor
     * 
     * @var \Magento\Framework\Reflection\DataObjectProcessor
     */
    protected $dataObjectProcessor;

    /**
     * Data object helper
     * 
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * JSON Factory
     * 
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $jsonFactory;

    /**
     * Promotional Block resource model
     * 
     * @var \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock
     */
    protected $promotionalblockResourceModel;

    /**
     * constructor
     * 
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface $promotionalblockRepository
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Stdlib\DateTime\Filter\Date $dateFilter
     * @param \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor
     * @param \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
     * @param \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
     * @param \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock $promotionalblockResourceModel
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface $promotionalblockRepository,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory,
        \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock $promotionalblockResourceModel
    ) {
        $this->dataObjectProcessor           = $dataObjectProcessor;
        $this->dataObjectHelper              = $dataObjectHelper;
        $this->jsonFactory                   = $jsonFactory;
        $this->promotionalblockResourceModel = $promotionalblockResourceModel;
        parent::__construct($context, $coreRegistry, $promotionalblockRepository, $resultPageFactory);
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        $postItems = $this->getRequest()->getParam('items', []);
        if (!($this->getRequest()->getParam('isAjax') && count($postItems))) {
            return $resultJson->setData([
                'messages' => [__('Please correct the data sent.')],
                'error' => true,
            ]);
        }

        foreach (array_keys($postItems) as $promotionalblockId) {
            /** @var \TM\PromotionalBlock\Model\Promotionalblock|\TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock */
            $promotionalblock = $this->promotionalblockRepository->getById((int)$promotionalblockId);
            try {
                $promotionalblockData = $postItems[$promotionalblockId];
                $promotionalblockData = $this->filterData($promotionalblockData);
                $this->dataObjectHelper->populateWithArray($promotionalblock, $promotionalblockData, \TM\PromotionalBlock\Api\Data\PromotionalblockInterface::class);
                $this->promotionalblockResourceModel->saveAttribute($promotionalblock, array_keys($promotionalblockData));
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $messages[] = $this->getErrorWithPromotionalblockId($promotionalblock, $e->getMessage());
                $error = true;
            } catch (\RuntimeException $e) {
                $messages[] = $this->getErrorWithPromotionalblockId($promotionalblock, $e->getMessage());
                $error = true;
            } catch (\Exception $e) {
                $messages[] = $this->getErrorWithPromotionalblockId(
                    $promotionalblock,
                    __('Something went wrong while saving the Promotional&#x20;Block.')
                );
                $error = true;
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }

    /**
     * Add Promotional&#x20;Block id to error message
     *
     * @param \TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock
     * @param string $errorText
     * @return string
     */
    protected function getErrorWithPromotionalblockId(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock, $errorText)
    {
        return '[Promotional&#x20;Block ID: ' . $promotionalblock->getId() . '] ' . $errorText;
    }
}
