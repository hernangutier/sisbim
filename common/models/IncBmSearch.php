<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\IncBm;

/**
 * IncBmSearch represents the model behind the search form of `common\models\IncBm`.
 */
class IncBmSearch extends IncBm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'periodo', 'status', 'id_origen', 'tipo'], 'integer'],
            [['fecha', 'observaciones', 'ref'], 'safe'],
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
        $query = IncBm::find();

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
            'fecha' => $this->fecha,
            'periodo' => $this->periodo,
            'status' => $this->status,
            'id_origen' => $this->id_origen,
            'tipo' => $this->tipo,
        ]);

        $query->andFilterWhere(['ilike', 'observaciones', $this->observaciones])
            ->andFilterWhere(['ilike', 'ref', $this->ref]);

        return $dataProvider;
    }
}
