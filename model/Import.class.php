<?php
class Import extends Entity{
	//definition de la structure base de donné
	public static $_properties = array (
			//table csvassociate
			'csvassociate'=>array(
					'apiid'=>array(
							Entity::TYPE=>Entity::INT,
							Entity::LEN=>Entity::INT_MAX_LEN,
							Entity::NULL_OR_NOT=>Entity::NOT_NULL,
							Entity::COMMENT=>'id du csv upload�',
					),
					'csvid'=>array(
							Entity::TYPE=>Entity::INT,
							Entity::LEN=>Entity::INT_MAX_LEN,
							Entity::NULL_OR_NOT=>Entity::NOT_NULL,
							Entity::COMMENT=>'id du csv upload�',
					),
					'opt'=>array(
							Entity::TYPE=>Entity::TEXT,
							Entity::LEN=>9999,
							Entity::NULL_OR_NOT=>NULL,
							Entity::COMMENT=>'options d association'
					),
			),
	);
	//attributs
	protected $_apiid;
	protected $_csvid;
	protected $_opt;

}