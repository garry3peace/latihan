 <?php

class CMS_Column extends CActiveRecord
{
	public $default_field = 'textfield';

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '_column';
	}

	public function rules()
	{

	}

	private function _getFieldMethod(){
		$fieldMethod = '_'.$this->type;
		if(!method_exists($this, $fieldMethod)){
			$fieldMethod = '_'.$this->default_field;
		}
		return $fieldMethod;
	}


	private function _textfield(){
		$column = $this->column;
		$param = CJSON::decode($this->type_param);

		return CHtml::textfield($column,'', $param);
	}

	private function _textarea(){
		$column = $this->column;
		$param = CJSON::decode($this->type_param);

		return CHtml::textarea($column,'', $param);
	}

	/**
		Draw the field 
	**/
	public function field(){
		//calling the suitable functions
		$field = call_user_func( array( $this, $this->_getFieldMethod($this) ));

		return $field;
	}

	public function label(){
		return $this->label;
	}
} 
