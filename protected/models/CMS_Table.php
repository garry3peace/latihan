 <?php

class CMS_Table extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '_table';
    }

    public function relations()
    {
	return array(
		'columns'=>array(self::HAS_MANY, 'CMS_Column', 'table_id', 'order'=>'`order` ASC','condition'=>'`visibility` = 1'),
	);
    }

	public function form(){
		$listColumns = $this->columns;
		foreach($listColumns as $column){
			echo $column->label();
			echo $column->field();
			echo "<br/>";
		}
	}

   
} 
