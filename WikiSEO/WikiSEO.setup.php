<?php

/**
 * WikiSEO extension - Allows per page meta settings (keywords, description) and to change the title.
 * @version 1.0.1 - 2013/07/12 (based on the work of Vladimir Radulovski and Jim Wilson)
 *
 * @link https://www.mediawiki.org/wiki/Extension:WikiSEO Documentation
 *
 * @file
 * @ingroup Extensions
 * @package MediaWiki
 * @author Andru Vallance (Andrujhon)
 * @copyright (C) 2013 Andru Vallance
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

# Confirm MW environment
if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension and thus not a valid entry point' );
}

# Credits
$wgExtensionCredits['parserhook'][] = array(
	'path' => __FILE__,
	'name' => 'WikiSEO',
	'author' => array(
		'Andru Vallance', '...'
		),
	'url' =>'https://www.mediawiki.org/wiki/Extension:WikiSEO',
	'descriptionmsg' => 'seo-desc',
	'version'=>'1.0.1'
);

$wgAutoloadClasses['WikiSEO'] = dirname(__FILE__) . '/WikiSEO.body.php';
$wgExtensionMessagesFiles['WikiSEOMagic'] = dirname( __FILE__ ) . '/WikiSEO.i18n.magic.php';
$wgExtensionMessagesFiles['WikiSEO'] = dirname( __FILE__ ) . '/WikiSEO.i18n.php';

$wgHooks['ParserFirstCallInit'][] = 'WikiSEO::init';
$wgHooks['BeforePageDisplay'][] = 'WikiSEO::modifyHTML';
