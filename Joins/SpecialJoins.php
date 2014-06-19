<?php
class SpecialJoins extends SpecialPage{
public function __construct(){
parent::__construct('Joins');
}
public function execute($sub){
	global $wgOut;
	$wiki_message = 'J3';
	$wgOut->setPageTitle( wfMessage('join'));
	$wgOut->addWikiMsg('hi-hello');
	$dbr = wfGetDB( DB_SLAVE );
	$res = $dbr->select(
		array( 'material', 'boiling_point' ),
		array( 'material_name','value' ),
		array(
			'mat_id>0'
		),
		__METHOD__,
		array(),
		array( 'boiling_point' => array( 'INNER JOIN', array(
			"{$dbr->tableName( 'material' )}.id=mat_id" ) ) )
 	);

	$this->getOutput()->addHTML("<table border='1' width='250' height='30' cellspacing='1' cellpadding='3'><tr><th>Material_Name</th><th>Boiling 		Point</th></tr>");
	foreach( $res as $row ) {
		$this->getOutput()->addHTML("<tr><td>".$row->material_name."</td><td>".$row->value."</td></tr>");

	}
	$this->getOutput()->addHTML("</table>");
}
}

