<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProvArticulos;

/**
 * ProvArticulosSerach represents the model behind the search form about `common\models\ProvArticulos`.
 */
class ProvArticulosSerach extends ProvArticulos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'und_empaque', 'id_lin', 'existencias'], 'integer'],
            [['ref', 'descripcion', 'descripcion_detail', 'und_mayor', 'und_menor'], 'safe'],
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
        $query = ProvArticulos::find();

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
            'und_empaque' => $this->und_empaque,
            'id_lin' => $this->id_lin,
            'existencias' => $this->existencias,
        ]);

        $query->andFilterWhere(['like', 'ref', $this->ref])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'descripcion_detail', $this->descripcion_detail])
            ->andFilterWhere(['like', 'und_mayor', $this->und_mayor])
            ->andFilterWhere(['like', 'und_menor', $this->und_menor]);

        return $dataProvider;
    }
}
