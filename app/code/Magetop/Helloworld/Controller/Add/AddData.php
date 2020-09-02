<?php
namespace Magetop\Helloworld\Controller\Add;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class AddData extends Action
{
    protected $_pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->_pageFactory = $pageFactory;
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        return $resultPage;
    }
}
