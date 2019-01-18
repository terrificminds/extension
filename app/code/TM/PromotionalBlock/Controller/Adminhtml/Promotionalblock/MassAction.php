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

abstract class MassAction extends \Magento\Backend\App\Action
{
    /**
     * Promotional Block repository
     * 
     * @var \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface
     */
    protected $promotionalblockRepository;

    /**
     * Mass Action filter
     * 
     * @var \Magento\Ui\Component\MassAction\Filter
     */
    protected $filter;

    /**
     * Promotional Block collection factory
     * 
     * @var \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * Action success message
     * 
     * @var string
     */
    protected $successMessage;

    /**
     * Action error message
     * 
     * @var string
     */
    protected $errorMessage;

    /**
     * constructor
     * 
     * @param \Magento\Backend\App\Action\Context $context
     * @param \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface $promotionalblockRepository
     * @param \Magento\Ui\Component\MassAction\Filter $filter
     * @param \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock\CollectionFactory $collectionFactory
     * @param string $successMessage
     * @param string $errorMessage
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface $promotionalblockRepository,
        \Magento\Ui\Component\MassAction\Filter $filter,
        \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock\CollectionFactory $collectionFactory,
        $successMessage,
        $errorMessage
    ) {
        $this->promotionalblockRepository = $promotionalblockRepository;
        $this->filter                     = $filter;
        $this->collectionFactory          = $collectionFactory;
        $this->successMessage             = $successMessage;
        $this->errorMessage               = $errorMessage;
        parent::__construct($context);
    }

    /**
     * @param \TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock
     * @return mixed
     */
    abstract protected function massAction(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock);

    /**
     * execute action
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $collectionSize = $collection->getSize();
            foreach ($collection as $promotionalblock) {
                $this->massAction($promotionalblock);
            }
            $this->messageManager->addSuccessMessage(__($this->successMessage, $collectionSize));
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addExceptionMessage($e, $this->errorMessage);
        }
        $redirectResult = $this->resultRedirectFactory->create();
        $redirectResult->setPath('tm_promotionalblock/*/index');
        return $redirectResult;
    }
}
