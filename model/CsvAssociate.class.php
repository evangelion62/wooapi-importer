<?php
class CsvAssociate extends Entity{
	//definition de la structure base de donné
	public static $_properties = array (
			//table csvassociate
			'csvassociate'=>array(
					'rowid'=>array(
							Entity::TYPE=>Entity::INT,
							Entity::LEN=>Entity::INT_MAX_LEN,
							Entity::NULL_OR_NOT=>Entity::NOT_NULL,
							Entity::COMMENT=>'id utilisateur',
					),
					'attribute'=>array(
							Entity::TYPE=>Entity::TEXT,
							Entity::LEN=>9999,
							Entity::NULL_OR_NOT=>NULL,
							Entity::COMMENT=>'nom des colonne'
					),
					'type'=>array(
							Entity::TYPE=>Entity::TEXT,
							Entity::LEN=>9999,
							Entity::NULL_OR_NOT=>NULL,
							Entity::COMMENT=>'nom des colonne'
					),
					'csvid'=>array(
							Entity::TYPE=>Entity::INT,
							Entity::LEN=>Entity::INT_MAX_LEN,
							Entity::NULL_OR_NOT=>Entity::NOT_NULL,
							Entity::COMMENT=>'id utilisateur',
					),
			),
	);
	//attributs
	protected $_attribute;
	protected $_type;
	protected $_rowid;
	protected $_csvid;

}