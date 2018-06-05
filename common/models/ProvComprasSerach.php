<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProvCompras;

/**
 * ProvComprasSerach represents the model behind the search form of `common\models\ProvCompras`.
 */
class ProvComprasSerach extends ProvCompras
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_prov', 'id_user', 'status', 'ref'], 'integer'],
            [['fecha_fact', 'motivo', 'motivo_null', 'num_fact'], 'safe'],
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
        $query = ProvCompras::find();

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
            'fecha_fact' => $this->fecha_fact,
            'id_user' => $this->id_user,
            'status' => $this->status,
            'ref' => $this->ref,
        ]);

        $query->andFilterWhere(['ilike', 'motivo', $this->motivo])
            ->andFilterWhere(['ilike', 'motivo_null', $this->motivo_null])
            ->andFilterWhere(['ilike', 'num_fact', $this->num_fact]);

        return $dataProvider;
    }
}
