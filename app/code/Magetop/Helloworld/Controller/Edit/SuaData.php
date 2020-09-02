<?php
namespace Magetop\Helloworld\Controller\Edit;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class SuaData implements HttpPostActionInterface {
    protected $_dataPosts;
    protected $_resultRedirect;

    protected $request;
    protected $_getRequest;
    protected $redirect;
    public function __construct(
        \Magetop\Helloworld\Model\PostsFactory  $dataPosts,
        \Magento\Framework\Controller\ResultFactory $result,
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\App\Request\Http $getRequest,
        RedirectFactory $redirectFactory
    ){
        $this->request = $request;
        $this->_getRequest = $getRequest;
        $this->_dataPosts = $dataPosts;
        $this->_resultRedirect = $result;
        $this->redirect = $redirectFactory;
    }
    public function execute(){
        $id = $this->_getRequest->getParam('id');
        $post = (array) $this->request->getParams();
        if(!empty($post)){
                $model = $this->_dataPosts->create();
            $model->setData($post);
            $model->save();

            /** @var \Magento\Framework\Controller\Result\Redirect $redirect */
            $redirect = $this->redirect->create();
            return $redirect->setRefererOrBaseUrl();
            //$this->messageManager->addSuccess( __('Insert Record Successfully !') );
        }
        //$_resultRedirect = $this->_resultRedirect->create(ResultFactory::TYPE_REDIRECT);
        //$_resultRedirect->setUrl('/hello/index/view');
        return true;
    }
}
