<?php

class PageView{
	
	private $m_charset;
	private $m_metaTags = array();
	
	//Funktion för att få utf-8 
	public function __construct($charset = "utf-8"){
		$this->m_charset = $charset; 
	}
	
	//Funktion för att använda css.
	public function StyleSheet($href){
		$this->m_metaTags[] = "<link rel='StyleSheet' href='$href' type='text/css'";
	}
	
	//Funktion för Headtags.
	private function BuildHeadTags($isXML) {
    $end = ">";
    if ($isXML) {
      $end = "/>";
    }
    $retValue = "";
    foreach($this->m_metaTags as $tag) {
      $retValue .= $tag . "$end\n            "; // "\n            " for readability
    }
    return $retValue;
  }
	
	//Hämtar html sidan.
	// public function GetHTMLPage($title, $body) {
    
 //    $head = $this->BuildHeadTags(false);
    
 //    $html = "
 //        <!DOCTYPE HTML SYSTEM>
 //        <html>
 //          <head>
 //            <title>$title</title>
 //            <meta http-equiv='content-type' content='text/html; charset=$this->m_charset'>
 //            $head
 //          </head>
 //          <body>
 //            $body
 //          </body>
 //        </html>";
		       
 //    return $html;
 //  }
	
	//Returnerar xml sidan.
	public function GetXHTML10StrictPage($title, $body) {
    $head = $this->BuildHeadTags(true);
    $xml = "
        <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\"> 
        <html xmlns=\"http://www.w3.org/1999/xhtml\"> 
          <head> 
             <title>$title</title> 
             <meta http-equiv=\"content-type\" content=\"text/html; charset=$this->m_charset\" /> 
             $head
          </head> 
          <body id='body'>
            $body
          </body>
        </html>";
    return $xml;
  }
}
