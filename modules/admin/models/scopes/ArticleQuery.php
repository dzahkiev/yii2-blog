<?php
/**
 * Файл ArticleQuery.php
 *
 * @copyright Copyright (c) 2019, Dzahkiev
 */

namespace app\modules\admin\models\scopes;

use yii\db\ActiveQuery;

class ArticleQuery extends ActiveQuery
{
    public function findById($id)
    {
        return $this->andWhere(['id' => $id]);
    }
}