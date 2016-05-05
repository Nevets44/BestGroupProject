<?php
//Author: Chris Dumlao
//Do no remove authorship
//(C) 2016 Christopher  Dumlao
/*$current_page - String of the page the user is currently on i.e. "Dining"
//generates navigation
*/
	function generateNavigation ($current_page = "") {
	
		//Array of main navigation links
		$nav_links = array("Home", "Map", "Dining", "Attractions", "Contact");
		
		//Array of dropdown navigation links
		$dining_links = array("Breakfast", "Lunch", "Dinner");
		
		//Array of dropdown navigation links
		$attractions_links = array("Historical Sites", "Parks", "Shows");
	
		//variable will hold your html
		$navHTML = '<div id="dynamic-nav" ><ul>';
	
		//Iterate of main navigation links
		foreach($nav_links as $link) {
		// if Home append <li>Home<a href="index.php"</a></li>
			if($link == "Home"){
				$navHTML .= "<li>$link<a href=\"index.php\"></a></li>";
			}
			// if Dining append <li>Dining<a href="Dining.php"</a></li>
			else if ($link == "Dining"){
				//if Dining is the current page make it the active link in the navigation
				$navHTML .= isActive($current_page, $link);

				$navHTML .= generateDropDown($dining_links, $link);
			}
			else if ($link == "Attractions"){
				$navHTML .= isActive($current_page, $link);
				$navHTML .= generateDropDown($attractions_links, $link);
			}
			else {
				// appends html for a navigation link without any submenu dropdowns
				$navHTML .= "<li>$link<a href=\"$link.php\"></a></li>";
			}
		}

		$navHTML .= "</ul></div>";
		
		echo $navHTML;
	}
	
?>