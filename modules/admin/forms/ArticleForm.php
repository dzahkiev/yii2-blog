<?php
/**
 * Файл ArticleForm.php
 *
 * @copyright Copyright (c) 2019, Dzahkiev
 */

namespace app\modules\admin\forms;

use app\modules\admin\models\Article;
use app\modules\admin\models\Category;
use yii\base\Model;
use yii\web\UploadedFile;

class ArticleForm extends Model
{
    public $id;
    /**
     * @var integer
     */
    public $category_id;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $content;

    /**
     * @var UploadedFile
     */
    public $image;

    /**
     * @var array
     */
    public $tags;

    /**
     * @var Article
     */
    protected $model;

    public function __construct(Article $model = null, array $config = [])
    {
        $this->model = $model;
        parent::__construct($config);
        $this->fill();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['description', 'content'], 'string'],
            [['title'], 'string', 'max' => 80],
         //   [['image'], 'string', 'max' => 250],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            ['tags', 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок статьи',
            'description' => 'Описание',
            'content' => 'Контент',
            'image' => 'Изображение',
            'tags' => 'Теги',
            'category_id' => 'Категория',
        ];
    }

    protected function fill()
    {
        if ($this->model) {
            $this->setAttributes($this->model->getAttributes([
                'id',
                'category_id',
                'title',
                'description',
                'content',
                'tags'
            ]));

        }
    }
}