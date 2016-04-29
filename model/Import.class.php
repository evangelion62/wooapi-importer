<?php
class Import extends Entity{
	//definition de la structure base de donné
	public static $_properties = array (
			//table csvassociate
			'import'=>array(
					'name'=>array(
							Entity::TYPE=>Entity::VARCHAR,
							Entity::LEN=>Entity::VARCHAR_MAX_LEN,
							Entity::NULL_OR_NOT=>Entity::NOT_NULL,
							Entity::COMMENT=>'nom de l import',
					),
					'apiid'=>array(
							Entity::TYPE=>Entity::INT,
							Entity::LEN=>Entity::INT_MAX_LEN,
							Entity::NULL_OR_NOT=>Entity::NOT_NULL,
							Entity::COMMENT=>'id du csv upload',
					),
					'csvid'=>array(
							Entity::TYPE=>Entity::INT,
							Entity::LEN=>Entity::INT_MAX_LEN,
							Entity::NULL_OR_NOT=>Entity::NOT_NULL,
							Entity::COMMENT=>'id du csv upload',
					),
					'opt'=>array(
							Entity::TYPE=>Entity::TEXT,
							Entity::LEN=>9999,
							Entity::NULL_OR_NOT=>NULL,
							Entity::COMMENT=>'options d association'
					),
					'userid'=>array(
							Entity::TYPE=>Entity::INT,
							Entity::LEN=>Entity::INT_MAX_LEN,
							Entity::NULL_OR_NOT=>Entity::NOT_NULL,
							Entity::COMMENT=>'id utilisateur',
					),
			),
	);
	//attributs
	protected $_name;
	protected $_apiid;
	protected $_csvid;
	protected $_opt;
	protected $_userid;
}