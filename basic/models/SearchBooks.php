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
    public $authorFirstName;

    /**
     * @var string
     */
    public $authorLastName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'author_id'], 'integer'],
//            [['name', 'date_create', 'date_update', 'preview', 'date'], 'safe'],
            [['name', 'date_create', 'date_update', 'preview', 'date', 'authorFirstName', 'authorLastName'], 'safe'],
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
        ]);

        $sortAttributes = $dataProvider->getSort()->attributes;
        $sortAttributes = array_merge($sortAttributes,
                                                [
                                                'authorFirstName' => [
                                                    'asc' => ['authors.firstname' => SORT_ASC],
                                                    'desc' => ['authors.firstname' => SORT_DESC],
                                                    'label' => 'First Name'
                                                ],
                                                'authorLastName' => [
                                                    'asc' => ['authors.lastname' => SORT_ASC],
                                                    'desc' => ['authors.lastname' => SORT_DESC],
                                                    'label' => 'Last Name'
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

        // WTF ?!?
//        $this->addCondition($query, 'id');
//        $this->addCondition($query, 'authorFirstName', true);
//        $this->addCondition($query, 'authorLastName', true);
//        $this->addCondition($query, 'author_id');


        $query->andFilterWhere([
            'id' => $this->id,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
            'date' => $this->date,
            'author_id' => $this->author_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'authors.firstname', $this->authorFirstName])
            ->andFilterWhere(['like', 'authors.lastname', $this->authorLastName])
            ->andFilterWhere(['like', 'preview', $this->preview]);

//        $query->joinWith(['author' => function ($q) {
//            $q->where('authors.firstname LIKE "%' . $this->authorFirstName . '%"');
//        }]);

        $query->joinWith('author');

        return $dataProvider;
    }
}
