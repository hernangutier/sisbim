<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Personal;

/**
 * PersonalSearch represents the model behind the search form about `common\models\Personal`.
 */
class PersonalSearch extends Personal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'sexo', 'id_und', 'id_nom', 'id_carg', 'id_prof', 'edo_civil', 'lateralidad'], 'integer'],
            [['cedrif', 'nombres', 'apellidos', 'direccion', 'tel_cel', 'email', 'fnac', 'create_date', 'update_date', 'tel_hab', 'tel_otro', 'lugar_nac'], 'safe'],
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
        $query = Personal::find();

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
            'status' => $this->status,
            'fnac' => $this->fnac,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,
            'sexo' => $this->sexo,
            'id_und' => $this->id_und,
            'id_nom' => $this->id_nom,
            'id_carg' => $this->id_carg,
            'id_prof' => $this->id_prof,
            'edo_civil' => $this->edo_civil,
            'lateralidad' => $this->lateralidad,
        ]);

        $query->andFilterWhere(['like', 'cedrif', $this->cedrif])
            ->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'tel_cel', $this->tel_cel])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'tel_hab', $this->tel_hab])
            ->andFilterWhere(['like', 'tel_otro', $this->tel_otro])
            ->andFilterWhere(['like', 'lugar_nac', $this->lugar_nac]);

        return $dataProvider;
    }
}
