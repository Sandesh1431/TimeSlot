<?php
namespace Codilar\Project\Block;


// use Magento\Framework\View\Element\Template;
// use Codilar\Repo\Model\ResourceModel\Slot\Collection;
// use Codilar\Repo\Api\SlotRepositoryInterface;
// use Magento\Framework\Api\SearchCriteriaBuilder;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrderBuilder;
use Codilar\Project\Api\SlotRepositoryInterface;
use  Magento\Customer\Model\Session;

class Slot extends Template
{
    /**
     * @var Collection
     */
    // private $collection;

      /**
  * @var SearchCriteriaBuilder
  */
  protected $searchCriteriaBuilder;
 
  /**
  * @var SortOrderBuilder
  */
  protected $sortOrderBuilder;
 
  /**
  * @var SlotRepositoryInterface
  */
  protected $SlotRepository;
    /**
     * Hello constructor.
     * @param Template\Context $context
     * @param Collection $collection
     * @param array $data
     */
  protected $customer;
 public function __construct(
       Template\Context $context,
    SearchCriteriaBuilder $searchCriteriaBuilder,
    SortOrderBuilder $sortOrderBuilder,
    SlotRepositoryInterface $SlotRepository,
    Session $customerSession
) {
    $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    $this->sortOrderBuilder = $sortOrderBuilder;
    $this->SlotRepository = $SlotRepository; 
    parent::__construct($context);
    $this->customer = $customerSession;
}
    public function getAllData() {
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $customerSession = $objectManager->create('Magento\Customer\Model\Session');
            $name=  $customerSession->getCustomer()->getName();
            $names=$name;
            $searchCriteria = $this->searchCriteriaBuilder->addFilter(
                'name',
                $names,
                'eq'
            );

            $searchCriteria = $searchCriteria->create();
            $searchResult = $this->SlotRepository->getList($searchCriteria);
            if ($searchResult->getTotalCount() > 0) {
            $items = $searchResult->getItems();
            return $items;
            }
            }
    public function getmyUrl() {
        return $this->getUrl('time/index/save');
    }  
    public function display(){
            $value=$this->_scopeConfig->getValue('helloworld/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $display= $this->_scopeConfig->getValue('helloworld/general/display_text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
     if($value==1){
     
     return  $display;
     }
     }
     public function getDeleteAction()
     {
         return $this->getUrl('time/index/delete', ['_secure' => true]);
     }
    
} 