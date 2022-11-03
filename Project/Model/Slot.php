<?php
namespace Codilar\Project\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Codilar\Project\Api\Data\SlotInterface;
use Codilar\Project\Model\ResourceModel\Slot as ResourceModel;

/**
 * Class Slot
 */
class Slot extends AbstractModel implements SlotInterface
{
    const CACHE_TAG = 'booking';

    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(ResourceModel::class);
    }


    public function getId()
    {
        return $this->getData('id');
    }
       public function getSlot()
    {
        return $this->getData('slot');
    }
    public function setSlot($slot)
    {
        return $this->setData('slot', $slot);
    }
    public function getDate()
    {
        return $this->getData('date');
    }
    public function setDate($date)
    {
        return $this->setData('date', $date);
    }public function getName(){
        return $this->getData('name');
    }
        public function setName($name){
            return $this->setData('name',$name);
        }
    }
   

