<?php

namespace Codilar\Project\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Slot extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('booking','id');
    }
}