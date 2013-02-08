<?php 
    class  Application_Model_ModOrganizeDb{
    	private $_DbRefCodes;
    	public function __construct(){
    		$this->_DbRefCodes = new Application_Model_DbTable_RefCodes();
    	}
    	public function SelectRefCode(){
    		$sql = $this->_DbRefCodes->select()->from($this->_DbRefCodes,array("ref_Libelle","ref_Code","ref_Id"))
    		->where("ref_Code=?","COM002");
    		return $this->_DbRefCodes->fetchAll($sql)->toArray();
    		
    	}
    	
    }