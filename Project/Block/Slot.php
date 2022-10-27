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
    public function __construct(
    //     Template\Context $context,
    //     //Collection $collection,
    //     SlotRepositoryInterface $SlotRepositoryInterface,
    //     array $data = []
    // )
    // {
    //     parent::__construct($context, $data);
    //     $this->collection = $collection;
    // }
    Template\Context $context,
    SearchCriteriaBuilder $searchCriteriaBuilder,
    SortOrderBuilder $sortOrderBuilder,
    SlotRepositoryInterface $SlotRepository
   
) {
    $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    $this->sortOrderBuilder = $sortOrderBuilder;
    $this->SlotRepository = $SlotRepository; 
    parent::__construct($context);
}

    public function getAllData() {
         $searchCriteria = $this->searchCriteriaBuilder;
        // ->addFilter();
// print_r($searchCriteria);

$searchCriteria = $searchCriteria->create();
$searchResult = $this->SlotRepository->getList($searchCriteria);
// print_r($searchResult);

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

}  