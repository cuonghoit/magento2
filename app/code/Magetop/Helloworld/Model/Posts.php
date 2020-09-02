<?php
namespace Magetop\Helloworld\Model;

class Posts extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'hello_world';

    protected $_cacheTag = 'hello_world';

    protected $_eventPrefix = 'hello_world';
    protected function _construct()
    {
        $this->_init('Magetop\Helloworld\Model\ResourceModel\Posts');
    }
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
