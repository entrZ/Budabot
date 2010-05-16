<?php 
	$MODULE_NAME = "BASIC_CHAT_MODULE";
	$PLUGIN_VERSION = 0.1;

	//Invite/Leave/lock commands
	bot::addsetting("topic_guild_join", "Show Topic in guild on join", "edit", "0", "ON;OFF", "1;0", "mod", "$MODULE_NAME/topic_show_guild.txt");
	bot::addsetting("priv_status", "no", "hide", "open");
	bot::addsetting("priv_status_reason", "no", "hide", "not set");	

	//Check macros
	bot::command("priv", "$MODULE_NAME/check.php", "check", "rl", "Checks who of the raidgroup is in the area");	
	
	//Topic set/show
	bot::event("joinPriv", "$MODULE_NAME/topic.php", "topic", "Show Topic when someone joins PrivChat");
	bot::event("logOn", "$MODULE_NAME/topic_logon.php", "none", "Show Topic on logon of members");
	bot::command("", "$MODULE_NAME/topic.php", "topic", "all", "Show Topic");
	bot::subcommand("msg", "$MODULE_NAME/topic.php", "topic (.+)", "leader", "topic", "Change Topic");
	bot::addsetting("topic", "Topic for Priv Channel", "noedit", "No Topic set.");	
	bot::addsetting("topic_setby", "no", "hide", "none");
	bot::addsetting("topic_time", "no", "hide", time());

    // Afk Check
	bot::event("priv", "$MODULE_NAME/afk_check.php", "afk");
	bot::command("priv", "$MODULE_NAME/afk.php", "afk", "all", "Sets a member afk");

	//Leader
	bot::command("priv", "$MODULE_NAME/leader.php", "leader", "all", "Sets the Leader of the raid");
	bot::subcommand("priv", "$MODULE_NAME/leader.php", "leader (.+)", "raidleader", "leader", "Set a specific Leader");
	bot::command("priv", "$MODULE_NAME/leaderecho_cmd.php", "leaderecho", "leader", "Set if the text of the leader will be repeated");
	bot::event("priv", "$MODULE_NAME/leaderecho.php", "leader");
	bot::addsetting("leaderecho", "Repeat the text of the raidleader", "edit", "1", "ON;OFF", "1;0");
	bot::addsetting("leaderecho_color", "Color for Raidleader echo", "edit", "<font color=#FFFF00>", "color");

	//Assist
	bot::command("", "$MODULE_NAME/assist.php", "assist", "all", "Creates/shows an Assist macro");
	bot::subcommand("", "$MODULE_NAME/assist.php", "assist (.+)", "leader", "assist", "Set a new assist");
	bot::command("", "$MODULE_NAME/heal_assist.php", "heal", "all", "Creates/showes an Doc Assist macro");
	bot::subcommand("", "$MODULE_NAME/heal_assist.php", "heal (.+)", "leader", "heal", "Set a new Doc assist");

	//Tell
	bot::command("priv", "$MODULE_NAME/tell.php", "tell", "all", "Repeats a Message 3times");
	
	//updateme
	bot::command("msg", "$MODULE_NAME/updateme.php", "updateme", "all", "Updates Charinfos from a player");

	//Set admin and user news
	bot::command("msg", "$MODULE_NAME/set_news.php", "privnews", "rl", "Set news that are shown on privjoin");
	bot::command("msg", "$MODULE_NAME/set_news.php", "adminnews", "mod", "Set adminnews that are shown on privjoin");
	bot::addsetting("news", "no", "hide", "Not set.");
	bot::addsetting("adminnews", "no", "hide", "Not set.");	
	
	//Helpfiles
	bot::help("afk_priv", "$MODULE_NAME/afk.txt", "all", "Going AFK", "Raidbot");
	bot::help("assist", "$MODULE_NAME/assist.txt", "all", "Creating an Assist Macro", "Raidbot");
	bot::help("check", "$MODULE_NAME/check.txt", "all", "See of the ppls are in the area", "Raidbot");
	bot::help("heal_assist", "$MODULE_NAME/healassist.txt", "all", "Creating an Healassist Macro", "Raidbot");
	bot::help("leader", "$MODULE_NAME/leader.txt", "all", "Set a Leader of a Raid/Echo on/off", "Raidbot");	
	bot::help("priv_news", "$MODULE_NAME/priv_news.txt", "raidleader", "Set Privategroup News", "Raidbot");			
	bot::help("tell", "$MODULE_NAME/tell.txt", "leader", "Repeating of a msg 3times", "Raidbot");
	bot::help("topic", "$MODULE_NAME/topic.txt", "raidleader", "Set the Topic of the raid", "Raidbot");			
	bot::help("updateme", "$MODULE_NAME/updateme.txt", "all", "Update your character infos", "Raidbot");
?>
