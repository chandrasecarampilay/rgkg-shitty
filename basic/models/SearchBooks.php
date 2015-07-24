<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Books;

/**
 * SearchBooks represents the model behind the search form about `app\models\Books`.
 */
class SearchBooks extends Books
{
    /**
     * @var string
     */
    public $authorFullName;

    /**
     * @var string
     */
    public $authorFirstName;

    /**
     * @var string
     */
    public $authorLastName;

    /**
     * @var string
     */
    public $searchDateCreateFrom;

    /**
     * @var string
     */
    public $searchDateCreateTo;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'author_id'], 'integer'],
//            [['name', 'date_create', 'date_update', 'preview', 'date'], 'safe'],
            [['name', 'date_create', 'date_update', 'preview', 'date', 'authorFirstName', 'authorLastName', 'authorFullName', 'searchDateCreateFrom', 'searchDateCreateFrom'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Books::find();
//        $query = Books::find()->joinWith('author');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);

        $sortAttributes = $dataProvider->getSort()->attributes;
        $sortAttributes = array_merge($sortAttributes,
                                                [
//                                                'authorFirstName' => [
//                                                    'asc' => ['authors.firstname' => SORT_ASC],
//                                                    'desc' => ['authors.firstname' => SORT_DESC],
//                                                    'default' => SORT_ASC,
//                                                    'label' => 'First Name'
//                                                ],
//                                                'authorLastName' => [
//                                                    'asc' => ['authors.lastname' => SORT_ASC],
//                                                    'desc' => ['authors.lastname' => SORT_DESC],
//                                                    'default' => SORT_ASC,
//                                                    'label' => 'Last Name'
//                                                ],
                                                'authorFullName' => [
                                                    'asc' => ['authors.firstname' => SORT_ASC, 'authors.lastname' => SORT_ASC],
                                                    'desc' => ['authors.firstname' => SORT_DESC, 'authors.lastname' => SORT_DESC],
                                                    'default' => SORT_ASC,
                                                    'label' => 'Author Name'
                                                ],
                                            ]
            );
        $dataProvider->setSort([ 'attributes' => $sortAttributes]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith('author');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'books.id' => $this->id,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
            'date' => $this->date,
            'author_id' => $this->author_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andWhere('authors.firstname LIKE :fullname1 OR authors.lastname LIKE :fullname2', [':fullname1' => '%'.$this->authorFullName.'%', ':fullname2' => '%'.$this->authorFullName.'%'])
            ->andFilterWhere(['like', 'preview', $this->preview]);

        $query->joinWith('author');

        return $dataProvider;
    }
}
