<?php
/**
 * Файл UserQuery.php
 *
 * @copyright Copyright (c) 2019, Dzahkiev
 */

namespace app\modules\admin\models\scopes;

use yii\db\ActiveQuery;

class UserQuery extends ActiveQuery
{
    public function findByEmail($email)
    {
        return $this->andWhere(['email' => $email]);
    }

}