<?php
namespace App\Models;

use App\Extensions\QueryBuilder;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function newBaseQueryBuilder(): QueryBuilder
    {
        $connection = $this->getConnection();
        return new QueryBuilder($connection, $connection->getQueryGrammar(), $connection->getPostProcessor(), $this);
    }

    public function newFromBuilder($attributes = [], $connection = null): Model
    {
        $mappedAttributes = [];

        foreach ($attributes as $key => $value) {
            // Проверяем, есть ли альтернативное имя поля в массиве fieldsMap
            if (in_array($key, $this->fieldsMap())) {
                // Если есть, используем альтернативное имя поля в качестве ключа
                $key = array_search($key, $this->fieldsMap());
                $mappedAttributes[$key] = $value;
            } else {
                // Если нет, то оставляем название с бд
                $mappedAttributes[$key] = $value;
            }
        }
        return parent::newFromBuilder($mappedAttributes);
    }
}
