<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Bm3;

/**
 * Bm3Search represents the model behind the search form of `common\models\Bm3`.
 */
class Bm3Search extends Bm3
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_bien', 'id_bm3'], 'integer'],
            [['date_caducidad', 'date_in', 'observaciones'], 'safe'],
            [['active'], 'boolean'],
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
        $query = Bm3::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_bien' => $this->id_bien,
            'id_bm3' => $this->id_bm3,
            'date_caducidad' => $this->date_caducidad,
            'active' => $this->active,
            'date_in' => $this->date_in,
        ]);

        $query->andFilterWhere(['ilike', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
