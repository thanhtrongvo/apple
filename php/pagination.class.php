<?php
class PerPage {
	public $perpage;
	
	function __construct() {
		$this->perpage = 8;
	}
	function getAllPageLinks($count,$href) {
		$output = '';
		if(!isset($_GET["page"])) $_GET["page"] = 1;
		if($this->perpage != 0)
			$pages  = ceil($count/$this->perpage);
		if($pages>1) {
			if($_GET["page"] == 1) 
				$output = $output . '<span class="link first disabled">&#8810;</span><span class="link disabled">&#60;</span>';
			else	
				$output = $output . '<a class="link first" onclick="getresult(\'' . $href . (1) . '\')" >&#8810;</a><a class="link" onclick="getresult(\'' . $href . ($_GET["page"]-1) . '\')" >&#60;</a>';
			
			for($i=1; $i<=$pages; $i++)	{
				if($i>$pages) break;
				if($_GET["page"] == $i)
					$output = $output . '<span id='.$i.' class="link current">'.$i.'</span>';
				else				
					$output = $output . '<a class="link" onclick="getresult(\'' . $href . $i . '\')" >'.$i.'</a>';
			}
			
			if($_GET["page"] < $pages)
				$output = $output . '<a  class="link" onclick="getresult(\'' . $href . ($_GET["page"]+1) . '\')" >></a><a  class="link" onclick="getresult(\'' . $href . ($pages) . '\')" >&#8811;</a>';
			else				
				$output = $output . '<span class="link disabled">></span><span class="link disabled">&#8811;</span>';
			
			
		}
		return $output;
	}
	function getPrevNext($count,$href) {
		$output = '';
		if(!isset($_GET["page"])) $_GET["page"] = 1;
		if($this->perpage != 0)
			$pages  = ceil($count/$this->perpage);
		if($pages>1) {
			if($_GET["page"] == 1) 
				$output = $output . '<span class="link disabled first">Prev</span>';
			else	
				$output = $output . '<a class="link first" onclick="getresult(\'' . $href . ($_GET["page"]-1) . '\')" >Prev</a>';			
			
			if($_GET["page"] < $pages)
				$output = $output . '<a  class="link" onclick="getresult(\'' . $href . ($_GET["page"]+1) . '\')" >Next</a>';
			else				
				$output = $output . '<span class="link disabled">Next</span>';
			
			
		}
		return $output;
	}
}

?>