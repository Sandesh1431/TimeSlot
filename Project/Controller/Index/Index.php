<?php

namespace Codilar\Project\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use  Magento\Customer\Model\Session;
class Index extends Action {
    /**
     * @var PageFactory
     */
    private $pageFactory;


    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Session $customerSession
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->_customerSession = $customerSession;
    }
    public function execute()
    
    {

	
$email = $this->_customerSession->getCustomer()->getEmail();
        if ($email==null)
{
    $redirect = $this->resultRedirectFactory->create();
    $redirect->setPath('customer/account/login');
    return $redirect;
}
else
{
        
        $page = $this->pageFactory->create();
        return $page;
    }
}

}