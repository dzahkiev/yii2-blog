<?php
/**
 * Файл ArticleRepository.php
 *
 * @copyright Copyright (c) 2019, Dzahkiev
 */

namespace app\modules\admin\repositories;

use app\modules\admin\models\Article;
use yii\db\Exception;
use yii\web\NotFoundHttpException;

class ArticleRepository
{
    /**
     * Поиск модели по ее идентификатору
     * @param $id
     * @return array|\yii\db\ActiveRecord|null
     * @throws NotFoundHttpException
     */
    public function get($id)
    {
        if ($model = Article::find()->findById($id)->one()) {
            return $model;
        }

        throw new NotFoundHttpException('Запращиваемая статья не найдена или была удалени ранее');
    }

    /**
     * Создание новой модели
     * @return Article
     */
    public function create()
    {
        return new Article();
    }

    /**
     * @param Article $model
     * @return bool
     * @throws Exception
     */
    public function save(Article $model)
    {
        if (!$model->save()) {
            throw new Exception('Не удалось сохранить модель');
        }
        return true;
    }
}