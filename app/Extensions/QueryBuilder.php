<?php

namespace App\Extensions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as BaseBuilder;

class QueryBuilder extends BaseBuilder
{
    protected Model $model;

    public function __construct($connection, $grammar, $processor, $model)
    {
        parent::__construct($connection, $grammar, $processor);
        $this->model = $model;
    }

    public function toSql(): array|string
    {
        $mapFields = $this->model->fieldsMap();
        if ($mapFields) {
            $sql = parent::toSql();

            // Заменяем имена полей в sql запросе согласно массиву fieldsMap
            foreach ($mapFields as $originalField => $mappedField) {
                $sql = str_replace('[' . $originalField . ']', '[' . $mappedField . ']', $sql);
            }
            return $sql;
        }
        return parent::toSql();
    }
}
