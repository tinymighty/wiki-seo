
# MediaWiki WikiSEO extension

This is a simple MediaWiki extension to give you control over the HTML title 
and meta tags via a tag or parser function.

## Steps to take

### Install with Composer

Follow the instructions at https://www.mediawiki.org/wiki/Composer

### Manual installation

You can get the extension via Git:

    git clone https://github.com/tinymighty/wiki-seo.git

Or [download it as zip archive](https://github.com/tinymighty/wiki-seo/archive/master.zip).

In either case, the "WikiSEO" extension should end up in the "extensions" directory 
of your MediaWiki installation. If you got the zip archive, you will need to put it 
into a directory called WikiSEO.

Add the following line to the end of your LocalSettings file:

    require_once "$IP/extensions/WikiSEO/WikiSEO.php";

## Usage

Use this extension as described [on the extensions documentation page](https://www.mediawiki.org/wiki/Extension:WikiSEO).
