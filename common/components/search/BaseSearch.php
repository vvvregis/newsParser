<?php
namespace common\components\search;


class BaseSearch
{

    /**
     * @var string
     */
    protected $query;

    /**
     * Getter query
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Setter query
     * @param $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }
}