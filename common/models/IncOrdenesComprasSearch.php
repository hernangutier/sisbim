<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\IncOrdenesCompras;

/**
 * IncOrdenesComprasSearch represents the model behind the search form of `common\models\IncOrdenesCompras`.
 */
class IncOrdenesComprasSearch extends IncOrdenesCompras
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_prov', 'status', 'id_user'], 'integer'],
            [['num', 'fecha', 'descripcion'], 'safe'],
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
        $query = IncOrdenesCompras::find();

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
            'id_prov' => $this->id_prov,
            'fecha' => $this->fecha,
            'status' => $this->status,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['ilike', 'num', $this->num])
            ->andFilterWhere(['ilike', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
