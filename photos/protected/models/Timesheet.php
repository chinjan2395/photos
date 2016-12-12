<?php

class Timesheet extends CActiveRecord
{

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName(){
    return 'timesheet';
    }


    public function getCriteria(){
        return new CDbCriteria();
    }
    /**
	 * Declares the validation rules.
	 */
    public $file;
	public function rules()
	{
		return array(
			// verifyCode needs to be entered correctly
		);
	}


	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
		);
	}
}
