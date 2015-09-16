<?php

namespace opensrs\domains\transfer;

use OpenSRS\Base;
use OpenSRS\Exception;

class TransferRsp2Rsp extends Base {
	public $action = "rsp2rsp_push_transfer";
	public $object = "domain";

	public $_formatHolder = "";
	public $resultFullRaw;
	public $resultRaw;
	public $resultFullFormatted;
	public $resultFormatted;

	public function __construct( $formatString, $dataObject, $returnFullResponse = true ) {
		parent::__construct();

		$this->_formatHolder = $formatString;

		$this->_validateObject( $dataObject );

		$this->send( $dataObject, $returnFullResponse );
	}

	public function __destruct() {
		parent::__destruct();
	}

	// Validate the object
	public function _validateObject( $dataObject ) {
		// Command required values
		if(
			!isset( $dataObject->attributes->domain ) ||
			$dataObject->attributes->domain == ""
		) {
			throw new Exception( "oSRS Error - domain is not defined." );
		}
		if(
			!isset( $dataObject->attributes->grsp ) ||
			$dataObject->attributes->grsp == ""
		) {
			throw new Exception( "oSRS Error - grsp is not defined." );
		}
	}
}