<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BienesEnCustodia;

/**
 * BienesEnCustodiaSearch represents the model behind the search form of `common\models\BienesEnCustodia`.
 */
class BienesEnCustodiaSearch extends BienesEnCustodia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_lin', 'id_class_sudebip', 'status_fisico_sdb', 'status_uso_sdb', 'id_und_actual', 'id_resp_directo'], 'integer'],
            [['num_bien', 'descripcion', 'date_creation'], 'safe'],
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
        $query = BienesEnCustodia::find();

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
            'id_lin' => $this->id_lin,
            'id_class_sudebip' => $this->id_class_sudebip,
            'status_fisico_sdb' => $this->status_fisico_sdb,
            'status_uso_sdb' => $this->status_uso_sdb,
            'id_und_actual' => $this->id_und_actual,
            'id_resp_directo' => $this->id_resp_directo,
            'date_creation' => $this->date_creation,
        ]);

        $query->andFilterWhere(['ilike', 'num_bien', $this->num_bien])
            ->andFilterWhere(['ilike', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
