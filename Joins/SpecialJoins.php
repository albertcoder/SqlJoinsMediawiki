<?php
class SpecialJoins extends SpecialPage{
public function __construct(){
parent::__construct('Joins');
}
public function execute($sub){
	global $wgOut;
	global $array;
	$wiki_message = 'J3';
	$wgOut->setPageTitle( wfMessage('join'));
	$wgOut->addWikiMsg('hi-hello');
	$dbr = wfGetDB( DB_SLAVE );
	$res2=$dbr->select('trait_tables',array('table_name'),"",__METHOD__);
	$g=0;
	foreach($res2 as $samedata){
	$array[$g] = $samedata->table_name;
	$g++;
	} 
	for($i=0; $i<5; $i++ ){
	$res = $dbr->select(
		array( 'material',$array[$i]),
		array( 'material_name','value' ),
		array(
			'mat_id>0'
		),
		__METHOD__,
		array(),
		array( $array[$i] => array( 'INNER JOIN', array(
			"{$dbr->tableName( 'material' )}.id=mat_id" ) ) )
 	);
	
	$this->getOutput()->addHTML("<table border='1' width='250' height='30' cellspacing='1' cellpadding='3'><tr><th>Material_Name</th><th>$array[$i]</th></tr>");
	foreach( $res as $row ) {
		$this->getOutput()->addHTML("<tr><td>".$row->material_name."</td><td>".$row->value."</td></tr>");

	}
	$this->getOutput()->addHTML("</table><br>");}
}
}

