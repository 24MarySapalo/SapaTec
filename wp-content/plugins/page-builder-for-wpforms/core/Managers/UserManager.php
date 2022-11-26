<?php


namespace rnpagebuilder\core\Managers;


use rnpagebuilder\core\Loader;

class UserManager
{
    /** @var Loader */
    public $Loader;
    public function __construct($loader)
    {
        $this->Loader=$loader;
    }

    public function UserCanViewPreview(){
        return current_user_can('administrator');
    }

}