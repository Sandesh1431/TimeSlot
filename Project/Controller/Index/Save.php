<?php
namespace Codilar\Project\Controller\Index;

    use Magento\Framework\App\Action\Action;
    use Magento\Framework\App\Action\Context;
    use Magento\Framework\Exception\CouldNotSaveException;
    use Magento\Framework\Exception\LocalizedException;
    use Magento\Framework\Exception\NoSuchEntityException;
    use Magento\Framework\View\Result\PageFactory;                                                                                                                                                                                                                                                          

    use Codilar\Project\Api\SlotRepositoryInterface;
    use Codilar\Project\Api\Data\SlotInterface;
    use Magento\ReCaptchaWebapiApi\Model\Data\Endpoint;

    class Save extends Action
    {
        protected $_pageFactory;
        public $count;
        protected $_SlotsRepository;
        protected $_SlotsModel;


        public function __construct(
            Context $context,
            PageFactory $pageFactory,
            SlotRepositoryInterface $SlotsRepository,
            SlotInterface $SlotsInterface
        ) {
           
            $this->_pageFactory = $pageFactory;
            $this->_SlotsRepository=$SlotsRepository;
            $this->_SlotsModel = $SlotsInterface;
            return parent::__construct($context);
        }
    
        public function execute()
        {
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $customerSession = $objectManager->create('Magento\Customer\Model\Session');
            $name= $customerSession->getCustomer()->getName();
            // $email= $customerSession->getCustomer()->getEmail();
            $data = $this->getRequest()->getParams();
            $date=$data['date'];
            $slot=$data['slot'];
            $Slotdata=$this->_SlotsModel;
            $Slotdata->setDate($date);
            $Slotdata->setSlot($slot);
            $Slotdata->setName($name);
            $blockInstance = $this->_objectManager->get('Codilar\Project\Block\Slot');
            $data=$blockInstance->getAllData();
            $count=0;
            if($data){
            foreach($data as $datanew){
                if(($date==$datanew['date'] )&& ($slot==$datanew['slot'])){
                    $count++;
                }
            }
        }
            try{     
                if ($count>=1){
                    $this->messageManager->addErrorMessage('Slot already Booked');
                }
                else{
                    $this->_SlotsRepository->save($Slotdata);
                    $this->messageManager->addSuccessMessage("Slot Booked!!");
                }
            }
            catch(CouldNotSaveException $e){
                echo $e->getMessage();
            }
        
           
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('time');
        return $redirect;
            
        
        
    }
    }