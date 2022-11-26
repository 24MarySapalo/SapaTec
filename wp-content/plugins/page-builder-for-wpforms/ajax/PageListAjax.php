<?php

namespace rnpagebuilder\ajax;

use rnpagebuilder\core\db\PageRepository;

class PageListAjax extends AjaxBase
{

    function GetDefaultNonce()
    {
        return 'pageList';
    }

    protected function RegisterHooks()
    {
        $this->RegisterPrivate('list_pages','ListPage');
        $this->RegisterPrivate('Delete','Delete');
        $this->RegisterPrivate('export_page','ExportPage');

    }


    public function ExportPage(){
        $id=$this->GetRequired('Id');

        $pageRepository=new PageRepository($this->Loader);
        $option=$pageRepository->GetPageById($id);

        if($option==null)
        {
            echo "The template could not be found";
            die();
        }

        $option->Id=0;

        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: private', false);
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="' .sanitize_file_name($option->Name)  . '.json";');
        header('Content-Transfer-Encoding: binary');

        echo json_encode($option);
    }

    public function ListPage(){

        $pageSize=$this->GetRequired('PageSize');
        $pageIndex=$this->GetRequired('Index');
        $direction=$this->GetRequired('Direction');
        $search=$this->GetRequired('Search');
        $pageRepository=new PageRepository($this->Loader);

        $this->SendSuccessMessage(['Result'=>$pageRepository->GetPageList($pageSize,$pageIndex,$search),'Count'=>$pageRepository->GetPageListCount($search)]);

    }


    public function Delete(){
        $id=$this->GetRequired('TemplateId');
        $pageRepository=new PageRepository($this->Loader);

        try
        {
            $pageRepository->Delete($id);
        }catch (\Exception $e)
        {
            $this->SendException($e);
        }

        $this->SendSuccessMessage(true);
    }
}