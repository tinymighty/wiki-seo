<?php 
# Confirm MW environment
if (!defined('MEDIAWIKI'))
	exit;


# Credits
$wgExtensionCredits['parserhook'][] = array(
	'path' => __FILE__,
    'name' =>'SEO Tag',
    'author' =>'Andru Vallance (andru.tinymighty.com) based on the work of Vladimir Radulovski and Jim Wilson',
    'url' =>'http://www.mediawiki.org/wiki/Extension:WikiSEO',
    'description' => 'Adds the &lt;seo title="The Title" metakeywords="keyword one,keyword two." metadescription="Your meta description" /&gt; tag so you can add to the meta keywords and HTML-title of a wiki-page.',
    'version'=>'1.0.0'
);

$wgAutoloadClasses['WikiSEO'] = dirname(__FILE__) . '/WikiSEO.body.php';
$wgExtensionMessagesFiles['WikiSEOMagic'] = dirname( __FILE__ ) . '/WikiSEO.i18n.magic.php';
$wgExtensionMessagesFiles['WikiSEO'] = dirname( __FILE__ ) . '/WikiSEO.i18n.php';

$wgHooks['ParserFirstCallInit'][] = 'WikiSEO::init';
$wgHooks['BeforePageDisplay'][] = 'WikiSEO::modifyHTML';

?>