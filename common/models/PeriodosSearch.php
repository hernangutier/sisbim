<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Periodos;

/**
 * PeriodosSearch represents the model behind the search form of `common\models\Periodos`.
 */
class PeriodosSearch extends Periodos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['descripcion', 'fini', 'fclose'], 'safe'],
            [['status'], 'boolean'],
            [['saldo_bm_ini', 'saldo_bu_ini', 'saldo_in_bm', 'saldo_in_bu'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Periodos::find();

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
            'fini' => $this->fini,
            'fclose' => $this->fclose,
            'status' => $this->status,
            'saldo_bm_ini' => $this->saldo_bm_ini,
            'saldo_bu_ini' => $this->saldo_bu_ini,
            'saldo_in_bm' => $this->saldo_in_bm,
            'saldo_in_bu' => $this->saldo_in_bu,
        ]);

        $query->andFilterWhere(['ilike', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
