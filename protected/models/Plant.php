<?php

/**
 * This is the model class for table "plant".
 *
 * The followings are the available columns in table 'plant':
 * @property integer $plantid
 * @property integer $plantcode
 * @property string $description
 * @property integer $recordstatus
 */
class Plant extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Plant the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'plant';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('plantcode, description, recordstatus', 'required'),
			array('recordstatus', 'numerical', 'integerOnly'=>true),
			array('plantcode', 'length', 'max'=>5),
			array('description', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('plantid, plantcode, description, recordstatus', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'plantid' => 'Data',
			'plantcode' => 'Plant Code',
			'description' => 'Description',
			'recordstatus' => 'Record Status',
		);
	}
	
	private function comparedb($criteria)
	{
		if (isset($_GET['plantcode']))
{
	$criteria->compare('plantcode',$_GET['plantcode'],true);
}
if (isset($_GET['description']))
{
	$criteria->compare('description',$_GET['description'],true);
}
}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
$this->comparedb($criteria);
		$criteria->compare('plantid',$this->plantid);
		$criteria->compare('plantcode',$this->plantcode);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('recordstatus',$this->recordstatus);

		return new CActiveDataProvider(get_class($this), array(
'pagination'=>array(
        'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
    ),
			'criteria'=>$criteria,
		));
	}

	public function searchwstatus()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$this->comparedb($criteria);
		$criteria->condition='recordstatus=1';
		$criteria->compare('plantid',$this->plantid);
		$criteria->compare('plantcode',$this->plantcode);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('recordstatus',$this->recordstatus);

		return new CActiveDataProvider(get_class($this), array(
'pagination'=>array(
        'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
    ),
			'criteria'=>$criteria,
		));
	}

}