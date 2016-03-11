<?php
class Csv extends Entity{
	//definition de la structure base de donné
	public static $_properties = array (
			//table csv
			'csv'=>array(
					'name'=>array(
							Entity::TYPE=>Entity::VARCHAR,
							Entity::LEN=>Entity::VARCHAR_MAX_LEN,
							Entity::NULL_OR_NOT=>Entity::NOT_NULL,
							Entity::COMMENT=>'nom du fichier',
					),
					'row'=>array(
							Entity::TYPE=>Entity::TEXT,
							Entity::LEN=>9999,
							Entity::NULL_OR_NOT=>NULL,
							Entity::COMMENT=>'nom des colonne separe par pipe'
					),
					'separateur'=>array(
							Entity::TYPE=>Entity::VARCHAR,
							Entity::LEN=>255,
							Entity::NULL_OR_NOT=>NULL,
							Entity::COMMENT=>'separateur de colonne',
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
	protected $_row;
	protected $_separateur;
	protected $_userid;
	
}