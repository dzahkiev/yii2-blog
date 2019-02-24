<?php
/**
 * Файл ArticleHelper.php
 *
 * @copyright Copyright (c) 2019, Dzahkiev
 */

namespace app\modules\admin\helpers;

use app\modules\admin\models\Category;
use app\modules\admin\models\Tag;
use yii\helpers\ArrayHelper;

class ArticleHelper
{
    /**
     * @return array
     */
    public static function getCategoriesForDropDownList()
    {
        return ArrayHelper::map(Category::find()->all(), 'id', 'name');
    }

    /**
     * @return array
     */
    public static function getTagsForDropDownList()
    {
        return ArrayHelper::map(Tag::find()->all(), 'id', 'name');
    }

    /**
     * @param $ids
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getTagsByIds($ids)
    {
        return Tag::find()->andWhere(['id' => $ids])->all();
    }
}