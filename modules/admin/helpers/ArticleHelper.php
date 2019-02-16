<?php
/**
 * Файл ArticleHelper.php
 *
 * @copyright Copyright (c) 2018, Oleg Chulakov Studio
 * @link http://chulakov.com/
 */

namespace app\modules\admin\helpers;

use app\modules\admin\models\Category;
use app\modules\admin\models\Tag;
use yii\helpers\ArrayHelper;

class ArticleHelper
{
    public static function getCategoriesForDropDownList()
    {
        return ArrayHelper::map(Category::find()->all(), 'id', 'name');
    }

    public static function getTagsForDropDownList()
    {
        return ArrayHelper::map(Tag::find()->all(), 'id', 'name');
    }
}