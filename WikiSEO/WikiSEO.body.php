<?php
class WikiSEO{
	
	protected static 	$title = '';
	protected static 	$title_mode = 'replace';
	protected static 	$title_modes = array('title','keywords','description','metakeywords','metadescription');
	protected static 	$meta_keywords = '';
	protected static 	$meta_description = '';
	
	//do not allow this class to be instantiated, it is static
	private function __construct(){ }
	
	public static function init(Parser $wgParser){
		
		$wgParser->setHook( 'seo', 'WikiSEO::parserTag' );
		$wgParser->setFunctionHook( 'seo', 'WikiSEO::parserFunction' );
		
		return true;
	}
	
	//parse the <seo> tag
	public static function parserTag( $text, $params = array(), $parser ) {	    
	    //ensure at least one of the required parameters has been set, otherwise display an error
	    if( !self::validateParams($params) ){
	    	return '<div class="errorbox">' . wfMsgForContent('seo-empty-attr') . '</div>';
	    }
	    
        self::processParams($params,$parser);
 
 		//this tag should not output anything directly here, we use the parameters to modify the title and meta tags later
        return '';
	   
	}
	
	public static function parserFunction( $parser ){
		$args = func_get_args();
		$args = array_slice($args, 1, count($args) );
		$params = array();
		foreach($args as $a){
			if(strpos($a, '=')){
				$exploded = explode('=', $a);
				$params[$exploded[0]] = $exploded[1];
			}
		}
		
		
		if( !self::validateParams($params) ){
			return '<div class="errorbox">' . wfMsgForContent('seo-empty-attr') . '</div>';
		}
		
		self::processParams($params,$parser);
		
		return '';
	}
	
	protected static function validateParams($params){
		//correct params for compatibility with HtmlTitleAndMeta extension
		if(isset($params['metak'])){
			$params['keywords'] = $params['metak'];
			unset($params['metak']);
		}
		if(isset($params['metad'])){
			$params['description'] = $params['metad'];
			unset($params['metad']);
		}
		if(count( array_intersect(array_keys($params),self::$title_modes) )  > 0){
			return true;
		}
		return false;
	}
	
	protected static function processParams($params,$parser){
		if  (isset($params['title'])) {
			self::$title = $parser->recursiveTagParse($params['title']);
		}
		//check for both metakeywords and metak params
		if  (isset($params['metakeywords']) || isset($params['keywords'])) {
			$keywords = isset($params['metakeywords']) ? $params['metakeywords'] : $params['keywords'];
			self::$meta_keywords = $parser->recursiveTagParse($keywords);
		}
		//check for both metadescription and metad params
		if  (isset($params['metadescription']) || isset($params['description'])) {
			$description = isset($params['metadescription']) ? $params['metadescription'] : $params['description'];
			self::$meta_description = $parser->recursiveTagParse($description);
		}
		
		if(isset($params['titlemode']) && in_array($params['titlemode'], array('append','prepend','replace')) ){
			self::$title_mode = $params['titlemode'];
		}
	}
	
		
	public static function modifyHTML ( $out ) {
		//echo 'lol'; exit;
		//set title
		if(!empty(self::$title)){
			switch(self::$title_mode){
				case 'append':
					$title = $out->getPageTitle() . ' - ' . self::$title;
					break;
				case 'prepend':
					$title = self::$title . ' - ' . $out->getPageTitle();
					break;
				case 'replace':
				default:
					$title = self::$title;
			}
			$out->setHTMLTitle($title);
		}
		//set meta keywords
		if(!empty(self::$meta_keywords)){
			$out->addKeyword(self::$meta_keywords );
		}
		//set meta description
		if(!empty(self::$meta_description)){
			$out->addMeta( 'description', self::$meta_description );
		}
		
	    return true;
	}
}

