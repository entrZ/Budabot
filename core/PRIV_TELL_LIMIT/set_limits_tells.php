<?php

   /*
   ** Author: Derroylo (RK2)
   ** Description: Set requirements for responding in tells
   ** Version: 0.2
   **
   ** Developed for: Budabot(http://sourceforge.net/projects/budabot)
   **
   ** Date(created): 26.07.2006
   ** Date(last modified): 18.10.2006
   ** 
   ** Copyright (C) 2006 Carsten Lohmann
   **
   ** Licence Infos: 
   ** This file is part of Budabot.
   **
   ** Budabot is free software; you can redistribute it and/or modify
   ** it under the terms of the GNU General Public License as published by
   ** the Free Software Foundation; either version 2 of the License, or
   ** (at your option) any later version.
   **
   ** Budabot is distributed in the hope that it will be useful,
   ** but WITHOUT ANY WARRANTY; without even the implied warranty of
   ** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   ** GNU General Public License for more details.
   **
   ** You should have received a copy of the GNU General Public License
   ** along with Budabot; if not, write to the Free Software
   ** Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
   */

if(eregi("^tminlvl$", $message)) {
 	if($this->settings["tell_req_lvl"] == 0)
 		$msg = "No Level Limit has been set for responding on tells.";
 	else
 		$msg = "Level Limit for responding on tells is set to Lvl {$this->settings["tell_req_lvl"]}";

    if($type == "msg")
        bot::send($msg, $sender);
    elseif($type == "priv")
       	bot::send($msg);
    elseif($type == "guild")
       	bot::send($msg, "guild");
} elseif(eregi("^tminlvl ([0-9]+)$", $message, $arr)) {
	$minlvl = strtolower($arr[1]);
	
	if($minlvl > 220 || $minlvl < 0) {
		$msg = "<red>Minimum Level can be only set between 1-220<end>";
		bot::send($msg, $sender);
		return;
	}
	
	bot::savesetting("tell_req_lvl", $minlvl);
	
	if($minlvl == 0) {
		$msg = "Player min level limit has been removed from responding on tells.";
	} else {
 		$msg = "Responding on tells will be done for the Minimumlevel of $minlvl.";
 	}
 	
    if($type == "msg")
        bot::send($msg, $sender);
    elseif($type == "priv")
       	bot::send($msg);
    elseif($type == "guild")
       	bot::send($msg, "guild");     	
} elseif(eregi("^topen$", $message)) {
 	if($this->settings["tell_req_open"] == "all")
 		$msg = "No General Limit is set for responding on tells.";
 	elseif($this->settings["tell_req_open"] == "org")
 		$msg = "General Limit for responding on tells is set to Organisation members only.";
	else
		$msg = "General Limit for responding on tells is set to Bot members only.";
		
    if($type == "msg")
        bot::send($msg, $sender);
    elseif($type == "priv")
       	bot::send($msg);
    elseif($type == "guild")
       	bot::send($msg, "guild");
} elseif(eregi("^topen (org|all|members)$", $message, $arr)) {
	$open = strtolower($arr[1]);
	
	bot::savesetting("tell_req_open", $open);
	
	if($open == "all") {
		$msg = "General restriction for responding on tells has been removed.";
	} elseif($open == "org") {
 		$msg = "Responding on tells will be done only for Members of your Organisation.";
 	} else {
 		$msg = "Responding on tells will be done only for Members of this Bot.";
 	}
 	
    if($type == "msg")
        bot::send($msg, $sender);
    elseif($type == "priv")
       	bot::send($msg);
    elseif($type == "guild")
       	bot::send($msg, "guild");
} elseif(eregi("^tfaction$", $message)) {
 	if($this->settings["tell_req_faction"] == "all")
 		$msg = "No Faction Limit is set for responding on tells.";
	else
		$msg = "Faction Limit for responding on tells is set to {$this->settings["tell_req_faction"]}.";
		
    if($type == "msg")
        bot::send($msg, $sender);
    elseif($type == "priv")
       	bot::send($msg);
    elseif($type == "guild")
       	bot::send($msg, "guild"); 	
} elseif(eregi("^tfaction (omni|clan|neutral|all)$", $message, $arr)) {
	$faction = ucfirst(strtolower($arr[1]));
	
	bot::savesetting("tell_req_faction", $faction);
	
	if($faction == "all") {
		$msg = "Faction limit removed for tell responces.";
	} else {
 		$msg = "Responding on tells will be done only for players with the Faction $faction.";
 	}
 	
    if($type == "msg")
        bot::send($msg, $sender);
    elseif($type == "priv")
       	bot::send($msg);
    elseif($type == "guild")
       	bot::send($msg, "guild");
} elseif(eregi("^tfaction not (omni|clan|neutral)$", $message, $arr)) {
	$faction = ucfirst(strtolower($arr[1]));
	
	bot::savesetting("tell_req_faction", "not ".$faction);
	
	$msg = "Responding on tells will be done for players that are not $faction.";

    if($type == "msg")
        bot::send($msg, $sender);
    elseif($type == "priv")
       	bot::send($msg);
    elseif($type == "guild")
       	bot::send($msg, "guild");
} else
	$syntax_error = true;

?>