<?php
/*
*
* Extension homepage is at  http://www.mediawiki.org/wiki/Extension:Add_HTML_Meta_and_Title
*
* --------------- Begin Jim R. Wilson's License Data --------------------------------------------------------
 * Copyright (c) 2007 Jim R. Wilson
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy 
 * of this software and associated documentation files (the "Software"), to deal 
 * in the Software without restriction, including without limitation the rights to 
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of 
 * the Software, and to permit persons to whom the Software is furnished to do 
 * so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all 
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, 
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES 
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND 
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT 
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, 
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING 
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR 
 * OTHER DEALINGS IN THE SOFTWARE. 
 * --------------- End of Jim R. Wilson's License Data --------------------------------------------------------
 */
 
# Confirm MW environment
if (!defined('MEDIAWIKI'))
	exit;


# Credits
$wgExtensionCredits['parserhook'][] = array(
	'path' => __FILE__,
    'name' =>'SEO Tag',
    'author' =>'Andru Vallance (andru.tinymighty.com) based on the work of Vladimir Radulovski and Jim Wilson',
    'url' =>'http://www.mediawiki.org/wiki/Extension:Add_HTML_Meta_and_Title',
    'description' => 'Adds the &lt;seo title="The Title" metakeywords="keyword one,keyword two." metadescription="Your meta description" /&gt; tag so you can add to the meta keywords and HTML-title of a wiki-page.',
    'version'=>'1.0.0'
);

$wgAutoloadClasses['WikiSEO'] = dirname(__FILE__) . '/WikiSEO.body.php';
$wgExtensionMessagesFiles['WikiSEOMagic'] = dirname( __FILE__ ) . '/WikiSEO.i18n.magic.php';
$wgExtensionMessagesFiles['WikiSEO'] = dirname( __FILE__ ) . '/WikiSEO.i18n.php';

$wgHooks['ParserFirstCallInit'][] = 'WikiSEO::init';
$wgHooks['BeforePageDisplay'][] = 'WikiSEO::modifyHTML';

?>