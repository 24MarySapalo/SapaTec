<?php


namespace rnpagebuilder\core\Integration\Processors\Settings\Forms\Fields;


use rnpagebuilder\Utilities\Sanitizer;

class SignatureFieldSettings extends FieldSettingsBase
{
    public function __construct()
    {
        parent::__construct();
        $this->RendererType='Signature';
        $this->IsPR=true;
    }

    public function GetType()
    {
        return 'Signature';
    }

    public function GetURL($value){
        return Sanitizer::GetStringValueFromPath($value,['Value']);

    }

}