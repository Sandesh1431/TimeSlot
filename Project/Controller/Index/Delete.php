<?php
 
namespace Codilar\Project\Controller\Index;
 
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Codilar\Project\Model\SlotFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
 
class Delete extends Action
{
    protected $resultPageFactory;
    protected $extensionFactory;
 
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        SlotFactory $extensionFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->extensionFactory = $extensionFactory;
        parent::__construct($context);
    }
 
    public function execute()
    {
        try {
            $data = (array)$this->getRequest()->getParams();
            if ($data) {
                $model = $this->extensionFactory->create()->load($data['id']);
                $model->delete();
                $this->messageManager->addSuccessMessage(__("Slot Canceled Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t Cancel Booking at the movement, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
 
    }
}
