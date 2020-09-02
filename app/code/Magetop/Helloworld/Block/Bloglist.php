<?php
namespace Magetop\Helloworld\Block;



class Bloglist extends \Magento\Framework\View\Element\Template
{
    protected $_postsFactory;
    protected $_request;


    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magetop\Helloworld\Model\PostsFactory $postsFactory,
        \Magento\Framework\App\Request\Http $request
)
    {
        $this->_postsFactory = $postsFactory;
        $this->_request = $request;
        parent::__construct($context);
    }

    public function getBlog(){
        $blog = $this->_postsFactory->create();
        $collection = $blog->getCollection();
        return $collection ;
    }
    public function getFormData(){
        return $this->getUrl('hello/add/themData');
    }
    public function getThemData(){
        return $this->getUrl('hello/add/addData');
    }
    public  function getView(){
        return $this->getUrl('hello/learning/view');
    }

    public function getEditData(){
        return $this->getUrl('hello/edit/editData');
    }

    public function getFormEdit(){
        $id = $this->_request->getParam('id');
        return $this->getUrl('hello/edit/suaData/id/'.$id);

    }
    public function getSuaData(){
        $id = $this->_request->getParam('id');
        $record = $this->_postsFactory->create()->load($id);
        return $record;
    }
    public function getDelete(){
        return $this->getUrl('hello/delete/deleteData');
    }
    public function getAjaxAdd(){
        return $this->getUrl('hello/ajax/addAjax');

    }
    public function getFormAjax(){
        return $this->getUrl('hello/ajax/ajaxData');
    }
    public function getEditAjax(){
        return $this->getUrl('hello/ajax/editajax');
    }
    public function getFormEditAjax(){
        $id = $this->_request->getParam('id');
        return $this->getUrl('hello/ajax/suaAjax/id/'.$id);
    }
    public function getSuaAjax(){
        $id = $this->_request->getParam('id');
        $record = $this->_postsFactory->create()->load($id);
        return $record;
    }

}
