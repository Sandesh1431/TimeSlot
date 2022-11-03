<?php
namespace Codilar\Project\Model\ResourceModel\Slot;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Codilar\Project\Model\Slot as Model;
use Codilar\Project\Model\ResourceModel\Slot as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}