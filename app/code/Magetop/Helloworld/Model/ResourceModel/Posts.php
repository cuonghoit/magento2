<?php
namespace Magetop\Helloworld\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Posts extends AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }
    protected function _construct()
    {
        // magetop_hello là tên bảng , id là khóa chính primary của bảng
        $this->_init('hello_world', 'id');
    }
}
