<?php
/**
 * MediaWiki JOINS extension
 * http://www.mediawiki.org/wiki/Extension:HelloWorld
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * This program is distributed WITHOUT ANY WARRANTY.
 */

/**
 * This file loads everything needed for the JOINS extension to function.
 *
 * @file
 * @ingroup Extensions
 * @author Albert Coder
 */

// Alert the user that this is not a valid entry point to MediaWiki if they try to access the file directly.


// Extension credits that will show up on Special:Version

$wgExtensionCredits['specialpage'][]=array(
'path'=>__FILE__,
'name'=>'sql_joins_mediawiki',
'author'=>'Albert Coder',
'version'=>'1.0',
'url'=>'Coderalbert.wordpress.com',
'descriptionmsg'=>'applies joins on two tables and shows the result in tabular form',
);

$dir=dirname(__FILE__).DIRECTORY_SEPARATOR;
$wgAutoloadClasses['SpecialJoins']=$dir.'SpecialJoins.php';
$wgExtensionMessagesFiles['Joins'] = $dir .'Joins.i18n.php';
$wgExtensionMessagesFiles['JoinsAlias'] = $dir .'Joins.alias.php';
$wgSpecialPages['Joins']='SpecialJoins';
$wgSpecialPageGroups['Joins']='other';
?>

