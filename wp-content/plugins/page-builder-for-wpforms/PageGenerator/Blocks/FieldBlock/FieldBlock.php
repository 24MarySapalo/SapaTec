<?php

namespace rnpagebuilder\PageGenerator\Blocks\FieldBlock;

use rnpagebuilder\DTO\FieldBlockOptionsDTO;
use rnpagebuilder\PageGenerator\Blocks\Core\BlockBase;

class FieldBlock extends BlockBase
{
    /** @var FieldBlockOptionsDTO */
    public $Options;

    protected function GetTemplateName()
    {
        return 'PageGenerator/Blocks/FieldBlock/FieldBlock.twig';
    }

    public function GetValue(){
        return $this->GetEntryRetriever()->GetCurrentRowHtmlValue($this->Options->FieldId,$this->Options->PathId);
    }
}