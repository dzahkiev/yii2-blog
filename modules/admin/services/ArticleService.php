<?php
/**
 * Файл ArticleService.php
 *
 * @copyright Copyright (c) 2019, Dzahkiev
 */

namespace app\modules\admin\services;

use app\modules\admin\forms\ArticleForm;
use app\modules\admin\models\Article;
use app\modules\admin\repositories\ArticleRepository;
use yii\db\Exception;

class ArticleService
{
    protected $repository;

    /**
     * Конструктор с внедрением зависимости
     * @param ArticleRepository $repository
     */
    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Метод сохрания новой модели
     * @param ArticleForm $form
     * @return Article|null
     */
    public function create(ArticleForm $form)
    {
        $model = $this->repository->create();

        $this->fill($model, $form);
        try {
            if ($this->repository->save($model)) {
                return $model;
            }
        } catch (Exception $e) {
            $form->addErrors($model->getErrors());
        }

        return null;
    }

    /**
     * Метод обновления существующей модели
     * @param Article $model
     * @param ArticleForm $form
     * @return bool
     */
    public function update(Article $model, ArticleForm $form)
    {
        $this->fill($model, $form);
        try {
            if ($this->repository->save($model)) {
                return true;
            }
        } catch (\Exception $e) {
            $form->addErrors($model->getErrors());
        }

        return false;
    }

    /**
     * Заполнение модели данными из формы
     * @param Article $model
     * @param ArticleForm $form
     */
    public function fill(Article $model, ArticleForm $form)
    {
        $model->setAttributes($form->getAttributes([
            'category_id',
            'title',
            'description',
            'content',
        ]));
    }

    /**
     * @param $id
     * @return \app\modules\admin\models\scopes\ArticleQuery|\yii\db\ActiveQuery
     * @throws \yii\web\NotFoundHttpException
     */
    public function find($id)
    {
        return $this->repository->get($id);
    }
}