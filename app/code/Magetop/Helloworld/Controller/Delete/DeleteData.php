<?php
namespace Magetop\Helloworld\Controller\Delete;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class DeleteData implements HttpGetActionInterface {
    protected $_dataPosts;
    protected $_resultRedirect;
    protected $redirect;
    protected $_getRequest;
    public function __construct(
        \Magetop\Helloworld\Model\PostsFactory  $dataPosts,
        \Magento\Framework\Controller\ResultFactory $result,
        \Magento\Framework\App\Request\Http $getRequest,
        RedirectFactory $redirectFactory
    ){
        $this->_dataPosts = $dataPosts;
        $this->_resultRedirect = $result;
        $this->redirect = $redirectFactory;
        $this->_getRequest = $getRequest;
    }
    public function execute(){

        $id = $this->_getRequest->getParam('id');
        $model = $this->_dataPosts->create();
        $model->setId($id)->delete();
        /** @var \Magento\Framework\Controller\Result\Redirect $redirect */
        $redirect = $this->redirect->create();
        return $redirect->setRefererOrBaseUrl();
        //$this->messageManager->addSuccess( __('Insert Record Successfully !') );
        //$_resultRedirect = $this->_resultRedirect->create(ResultFactory::TYPE_REDIRECT);
        //$_resultRedirect->setUrl('/hello/index/view');
        return true;
    }
}

