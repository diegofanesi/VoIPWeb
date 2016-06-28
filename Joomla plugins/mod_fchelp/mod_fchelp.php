<?php
/**
 * @version		$Id: mod_stats.php 14401 2010-01-26 14:10:00Z louis $
 * @package		Joomla
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include the syndicate functions only once

$component=JRequest::getVar('option','home');
$view=JRequest::getVar('view',null);
$mode = $params->get('debug');
$string='';
$strlang=JText::_($component.':'.$view);
if (($strlang==$component.':'.$view) && ($mode!=1)) {
	$strlang=='';
} else {
	$app =& JFactory::getApplication();
	$moduleDir = JURI::base().'modules'.DS.'mod_fchelp';
	$string.='<script type="text/javascript">
function toggleHelp( ) {
var help = document.getElementById(\'fc_help_div\'); 
if (help.style.display != \'block\') {
help.style.display = \'block\';
opacity(\'fc_help_div\', 0, 100, 300);
} else {
help.style.opacity = 0;
help.style.display =  \'none\';
}
}

function opacity(id, opacStart, opacEnd, millisec) { 
    //speed for each frame 
    var speed = Math.round(millisec / 85); 
    var timer = 0; 

    //determine the direction for the blending, if start and end are the same nothing happens 
    /*if(opacStart > opacEnd) { 
        for(i = opacStart; i >= opacEnd; i--) { 
            setTimeout("changeOpac(" + i + ",\'" + id + "\')",(timer * speed)); 
            timer++; 
        } 
    } else*/ if(opacStart < opacEnd) { 
        for(i = opacStart; i <= opacEnd; i++) 
            {
			
            setTimeout("changeOpac(" + i + ",\'" + id + "\')",(timer * speed)); 
            timer++;
			
        } 
    } 
} 

//change the opacity for different browsers 
function changeOpac(opacity, id) { 
    var object = document.getElementById(id).style; 
    object.opacity = (opacity / 100); 
    object.MozOpacity = (opacity / 100); 
    object.KhtmlOpacity = (opacity / 100); 
    object.filter = "alpha(opacity=" + opacity + ")";
	
	
	
}</script>';
	$string.='<div id="fc_help_div" class="fc_help">'.$strlang.'</div>';
}
echo $string;