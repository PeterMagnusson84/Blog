<?php

include_once 'analyticstracking.php';

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
        <html lang='sv-se' xmlns=\"http://www.w3.org/1999/xhtml\"> 
          <head> 
             <meta name='msvalidate.01' content='857981E0616C72E62F8A39F395E85B9E' />
             <meta name='robots' content='INDEX, FOLLOW' />

             <meta http-equiv='content-language' content='sv-se'>

             <title>$title</title> 
             <meta http-equiv=\"content-type\" content=\"text/html; charset=$this->m_charset\" />
             <meta name='keywords' content='it nyheter, petermagnusson84, it, phpprojekt, uddevalla, blogg, windows, android, webb, spel, windows phone' />
             <meta name='description' content='Nyheter inom IT. Testar och förösker få Google sökmotoroptemering att fungera när jag söker på google.se' />

             $head
          </head>

            <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-56406752-1', 'auto');
            ga('send', 'pageview');

            </script>
          
          <body id='body'>
          <include_once('analyticstracking.php')>
            $body
          </body>
          
        </html>";
    return $xml;
  }


}
