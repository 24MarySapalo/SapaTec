<?php 

namespace rnpagebuilder\DTO;

class FieldCellTemplateOptionsDTO extends GridColumnBaseOptionsDTO{
	/** @var string */
	public $FieldId;
	/** @var string */
	public $PathId;
	/** @var Boolean */
	public $IsSortable;


	public function LoadDefaultValues(){
		parent::LoadDefaultValues();
		$this->Type='Field';
		$this->FieldId='';
		$this->PathId='';
		$this->IsSortable=false;
	}
}

