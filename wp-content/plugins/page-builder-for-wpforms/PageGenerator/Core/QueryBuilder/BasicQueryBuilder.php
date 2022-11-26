<?php

namespace rnpagebuilder\PageGenerator\Core\QueryBuilder;

class BasicQueryBuilder extends QueryBuilder
{
    public $GroupBy='';
    private $BasicColumns=[];
    public function AddColumn($column){
        $this->BasicColumns[]=$column;
    }

    public function AddGroupBy($groupBy)
    {
        $this->GroupBy=$groupBy;
    }

    public function Execute($limit = 0, $skip = 0)
    {
        $query=parent::Execute($limit, $skip);
        if($this->GroupBy!='')// TODO: Change the autogenerated stub
            $query.=' group by '.$this->GroupBy;
        return $query;
    }

    public function GenerateColumnsSectionQuery($isCountString=false)
    {
        return 'select '.implode(',',$this->BasicColumns);
    }

}