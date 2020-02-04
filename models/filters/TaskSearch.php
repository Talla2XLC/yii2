<?php

namespace app\models\filters;

use app\models\tables\Tasks;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TaskSearch represents the model behind the search form of `app\models\tables\Tasks`.
 */
class TaskSearch extends Tasks {
	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['id', 'creator_id', 'responsible_id', 'status_id'], 'integer'],
			[['creator_id', 'responsible_id', 'status_id'], 'string'],
			[['title', 'description', 'priority_id', 'deadline'], 'safe'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function scenarios() {
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
	public function search($params) {
		$query = Tasks::find();

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
			'creator_id' => $this->creator_id,
			'responsible_id' => $this->responsible_id,
			'status_id' => $this->status_id,
		]);

		$query->andFilterWhere(['like', 'title', $this->title])
			->andFilterWhere(['like', 'description', $this->description])
			->andFilterWhere(['like', 'priority_id', $this->priority_id])
			->andFilterWhere(['=', 'MONTH(deadline)', $this->deadline ]);

		return $dataProvider;
	}

	public function attributeLabels() {
		return [
			'deadline' => \Yii::t('app', 'deadline_attr'),
		];
	}
}
