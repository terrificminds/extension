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

class Save extends \TM\PromotionalBlock\Controller\Adminhtml\Promotionalblock
{
    /**
     * Promotional Block factory
     * 
     * @var \TM\PromotionalBlock\Api\Data\PromotionalblockInterfaceFactory
     */
    protected $promotionalblockFactory;

    /**
     * Data Object Processor
     * 
     * @var \Magento\Framework\Reflection\DataObjectProcessor
     */
    protected $dataObjectProcessor;

    /**
     * Data Object Helper
     * 
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * Data Persistor
     * 
     * @var \Magento\Framework\App\Request\DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * constructor
     * 
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface $promotionalblockRepository
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \TM\PromotionalBlock\Api\Data\PromotionalblockInterfaceFactory $promotionalblockFactory
     * @param \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor
     * @param \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface $promotionalblockRepository,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \TM\PromotionalBlock\Api\Data\PromotionalblockInterfaceFactory $promotionalblockFactory,
        \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper,       
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->promotionalblockFactory = $promotionalblockFactory;
        $this->dataObjectProcessor     = $dataObjectProcessor;
        $this->dataObjectHelper        = $dataObjectHelper;      
        $this->dataPersistor           = $dataPersistor;
        parent::__construct($context, $coreRegistry, $promotionalblockRepository, $resultPageFactory);
    }

    /**
     * run the action
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        /** @var \TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock */
        $promotionalblock = null;
        $postData = $this->getRequest()->getPostValue();
        $data = $postData;
        $data = $this->filterData($data);
        $id = !empty($data['promotionalblock_id']) ? $data['promotionalblock_id'] : null;
        $resultRedirect = $this->resultRedirectFactory->create();
        try {
            if ($id) {
                $promotionalblock = $this->promotionalblockRepository->getById((int)$id);
            } else {
                unset($data['promotionalblock_id']);
                $promotionalblock = $this->promotionalblockFactory->create();
            }
            $this->dataObjectHelper->populateWithArray($promotionalblock, $data, \TM\PromotionalBlock\Api\Data\PromotionalblockInterface::class);
            $this->promotionalblockRepository->save($promotionalblock);
            $this->messageManager->addSuccessMessage(__('You saved the Promotional&#x20;Block'));
            $this->dataPersistor->clear('tm_promotionalblock_promotionalblock');
            if ($this->getRequest()->getParam('back')) {
                $resultRedirect->setPath('tm_promotionalblock/promotionalblock/edit', ['promotionalblock_id' => $promotionalblock->getId()]);
            } else {
                $resultRedirect->setPath('tm_promotionalblock/promotionalblock');
            }
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->dataPersistor->set('tm_promotionalblock_promotionalblock', $postData);
            $resultRedirect->setPath('tm_promotionalblock/promotionalblock/edit', ['promotionalblock_id' => $id]);
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('There was a problem saving the Promotional&#x20;Block'));
            $this->dataPersistor->set('tm_promotionalblock_promotionalblock', $postData);
            $resultRedirect->setPath('tm_promotionalblock/promotionalblock/edit', ['promotionalblock_id' => $id]);
        }
        return $resultRedirect;
    }

}
