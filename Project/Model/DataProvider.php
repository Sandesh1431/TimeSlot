<?php
/**
 * Webkul Software.
 *
 * @category  Webkul
 * @package   Webkul_UiForm
 * @author    Webkul
 * @copyright Copyright (c) 2010-2016 Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */
namespace Codilar\Project\Model;
 
use Codilar\Project\Model\ResourceModel\Slot\CollectionFactory;;
 
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $_loadedData;
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
    public function getData()
    {
        // if (isset($this->_loadedData)) {
        
        //     return $this->_loadedData;
        // }
        // $items = $this->collection->getItems();
     
        // foreach ($items as $data) {
        //     $this->_loadedData[$data->getId()]= $data->getData();
        // }
        
        // return $this->_loadedData;
        return [];
    }
}
