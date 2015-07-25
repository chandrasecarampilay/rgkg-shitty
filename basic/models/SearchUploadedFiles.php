<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UploadedFiles;

/**
 * SearchUploadedFiles represents the model behind the search form about `app\models\UploadedFiles`.
 */
class SearchUploadedFiles extends UploadedFiles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'size'], 'integer'],
            [['name', 'filename', 'type'], 'safe'],
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
        $query = UploadedFiles::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'size' => $this->size,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
