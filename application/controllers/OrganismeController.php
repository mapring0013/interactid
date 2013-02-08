<?php
require_once 'Zend/Controller/Plugin/Abstract.php';
class OrganismeController extends Zend_Controller_Action
{
   public $getLibBaseUrl;
   public $GetModelOrganize;
    public function init()
    {
        /* Initialize action controller here */
    	$this->getLibBaseUrl = new Zend_View_Helper_BaseUrl();
    	$this->GetModelOrganize = new Application_Model_ModOrganizeDb();
    }

    public function indexAction()
    {
       if(!$this->CheckTransactionUser()){
       	try {
       		Zend_Session::start();
       		$lan = $this->_getParam('lang');
       		$this->_redirect ($lan.'/index' );
       		exit();
       		throw new ErrorException("No Permission for accessing this page");
       	} catch(Zend_Session_Exception $e) {
       		echo "Message:".$e->getMessage();
       		session_start();
       	}
       	
       	
       }else{
       	
       	  try {
       	  	$getRefCodeToview = $this->GetModelOrganize->SelectRefCode();
       	  	$this->view->RefCodesFromController = $getRefCodeToview;
       	  }catch (ErrorException $exe){
       	  	echo "Message:".$exe->getMessage();
       	  }
       }
       
    }
    public function CheckTransactionUser(){
    	
    	if(isset($_SESSION ['UserSession'])){
    		return true;
    	}else {
    		return false;
    	}
    }

}

