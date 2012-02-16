<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->msg = '';
        
        if($this->getRequest()->isPost()){
            // Se envio el formulario
            $url = $this->_getParam('url');
            
            if($url == ''){
                $this->view->msg = 'Ingrese una URL.';
                return false;
            }
            
            $metodo = $this->_getParam('metodo');
            
            if($metodo == ''){
                $this->view->msg = 'Ingrese el nombre del metodo.';
                return false;
            }
            
            $client = new Zend_XmlRpc_Client($url);

            /*$arg1 = 1.1;
            $arg2 = 'foo';

            $result = $client->call('test.sayHello', array($arg1, $arg2));*/
            
            $this->view->result = $client->call($metodo);
            var_dump($this->view->result);
        }
        
        
    }


}

