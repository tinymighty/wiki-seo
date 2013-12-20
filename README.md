
# MediaWiki WikiSEO extension

This is a simple MediaWiki extension to give you control over the HTML title 
and meta tags via a tag or parser function.

## Steps to take

### Download and install this extension

You can get the extension via Git:

    git clone https://github.com/andru/wiki-seo.git

Or [download it as zip archive](https://github.com/andru/wiki-seo/archive/master.zip).

In either case, the "WikiSEO" extension should end up in the "extensions" directory 
of your MediaWiki installation. If you got the zip archive, you will need to put it 
into a directory called WikiSEO.

Add the following line to the end of your LocalSettings file:

    require_once "$IP/extensions/WikiSEO/WikiSEO.php";

Note that prior to version 1.1.1 of this extension the call was

    require_once "$IP/extensions/WikiSEO/WikiSEO.setup.php";

This is a lecacy call that will be dropped in a future version of this extension. 
Because of this you are advised to change your current call to the new one.

## Usage

Use this extension as described [on the extensions documentation page](https://www.mediawiki.org/wiki/Extension:WikiSEO).
