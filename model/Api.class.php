<?php
class Api extends Entity{
	//definition de la structure base de donné
	public static $_properties = array (
			//table page
			'api'=>array(
					'url'=>array(
							Entity::TYPE=>Entity::VARCHAR,
							Entity::LEN=>Entity::VARCHAR_MAX_LEN,
							Entity::NULL_OR_NOT=>Entity::NOT_NULL,
							Entity::COMMENT=>'url du site',
					),
					'ck'=>array(
							Entity::TYPE=>Entity::VARCHAR,
							Entity::LEN=>255,
							Entity::NULL_OR_NOT=>Entity::NOT_NULL,
							Entity::COMMENT=>'clef client',
							Entity::KEY=>Entity::UNIQUE_KEY
					),
					'cs'=>array(
							Entity::TYPE=>Entity::VARCHAR,
							Entity::LEN=>255,
							Entity::NULL_OR_NOT=>Entity::NOT_NULL,
							Entity::COMMENT=>'secrete client',
							Entity::KEY=>Entity::UNIQUE_KEY
					),
					'sslverify'=>array(
							Entity::TYPE=>Entity::INT,
							Entity::LEN=>Entity::INT_MAX_LEN,
							Entity::NULL_OR_NOT=>NULL,
							Entity::COMMENT=>'verification ssl ou non'
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
	protected $_url;
	protected $_ck;
	protected $_cs;
	protected $_sslverify;
	protected $_userid;
	
}