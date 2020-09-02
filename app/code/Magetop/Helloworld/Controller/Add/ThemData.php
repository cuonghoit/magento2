<?php
namespace Magetop\Helloworld\Controller\Add;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class ThemData implements HttpPostActionInterface {
    protected $_dataPosts;
    protected $_resultRedirect;

    protected $request;
    protected $redirect;
    public function __construct(
        \Magetop\Helloworld\Model\PostsFactory  $dataPosts,
        \Magento\Framework\Controller\ResultFactory $result,
        \Magento\Framework\App\RequestInterface $request,
        RedirectFactory $redirectFactory
    ){

        $this->request = $request;
        $this->_dataPosts = $dataPosts;
        $this->_resultRedirect = $result;
        $this->redirect = $redirectFactory;
    }
    public function execute(){
        $post = (array) $this->request->getParams();

        if(!empty($post)){
            $model = $this->_dataPosts->create();
            $model->addData($post);
            $model->save();
            /* @var \Magento\Framework\Controller\Result\Redirect $redirect */
            $redirect = $this->redirect->create();
            return $redirect->setRefererOrBaseUrl();
            //$this->messageManager->addSuccess( __('Insert Record Successfully !') );
            }
            //$_resultRedirect = $this->_resultRedirect->create(ResultFactory::TYPE_REDIRECT);
            //$_resultRedirect->setUrl('/hello/index/view');
            return true;
    }
}
