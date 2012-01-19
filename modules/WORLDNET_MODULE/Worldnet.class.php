<?php

class Worldnet {
	/** @Inject */
	public $setting;
	
	/** @Inject */
	public $db;
	
	/** @Inject */
	public $buddyList;
	
	/** @Inject */
	public $ban;
	
	/** @Inject */
	public $help;
	
	/** @Inject */
	public $chatBot;
	
	/** @Logger */
	public $logger;
	
	function init($MODULE_NAME) {
		// since settings for channels are added dynamically, we need to re-add them manually
		$data = $this->db->query("SELECT * FROM settings_<myname> WHERE module = ? AND name LIKE ?", $MODULE_NAME, "%_channel");
		forEach ($data as $row) {
			$this->setting->add($row->module, $row->name, $row->description, $row->mode, $row->type, $row->value, $row->options, $row->intoptions, $row->admin, $row->help);
		}

		$this->setting->add($MODULE_NAME, 'worldnet_bot', 'Name of bot', 'edit', "text", "Worldnet", "Worldnet;Dnet", '', 'mod', 'worldnet.txt');

		// colors
		$this->setting->add($MODULE_NAME, 'worldnet_channel_color', "Color of channel text in worldnet messages", 'edit', "color", "<font color='#FFFFFF'>");
		$this->setting->add($MODULE_NAME, 'worldnet_message_color', "Color of message text in worldnet messages", 'edit', "color", "<font color='#FFFFFF'>");
		$this->setting->add($MODULE_NAME, 'worldnet_sender_color', "Color of sender text in worldnet messages", 'edit', "color", "<font color='#FFFFFF'>");
	}

	/**
	 * @Event("logOn")
	 * @Description("Requests invite from worldnet bot")
	 */
	function logon($eventObj) {
		if (strtolower($this->setting->get('worldnet_bot')) == strtolower($eventObj->sender)) {
			$msg = "!join";
			$this->logger->log_chat("Out. Msg.", $eventObj->sender, $msg);
			$this->chatBot->send_tell($eventObj->sender, $msg);
		}
	}
	
	/**
	 * @Event("connect")
	 * @Description("Adds worldnet bot to buddylist")
	 */
	function connect($eventObj) {
		$this->buddyList->add($this->setting->get('worldnet_bot'), 'worldnet');
	}
	
	/**
	 * @Event("extJoinPrivRequest")
	 * @Description("Accepts invites from worldnet bot")
	 */
	function acceptInvite($eventObj) {
		if (strtolower($this->setting->get('worldnet_bot')) == strtolower($eventObj->sender)) {
			$this->chatBot->privategroup_join($eventObj->sender);
		}
	}
	
	/**
	 * @Event("extPriv")
	 * @Description("Relays incoming messages to the guild/private channel")
	 */
	function incomingMessage($eventObj) {
		$sender = $eventObj->sender;
		$message = $eventObj->message;
	
		if (strtolower($this->setting->get('worldnet_bot')) != strtolower($sender)) {
			return;
		}

		$message = preg_replace("/<font(.+?)>/s", "", $message);
		$message = preg_replace("/<\/font>/s", "", $message);

		if (!preg_match("/\\[([^ ]+)\\] (.*) \\[([a-z0-9-]+)\\]$/i", $message, $arr)) {
			return;
		}

		$worldnetChannel = $arr[1];
		$messageText = $arr[2];
		$name = $arr[3];
		
		$channelSetting = strtolower($sender . '_' . $worldnetChannel . '_channel');
		if ($this->setting->get($channelSetting) === false) {
			$this->setting->add('WORLDNET_MODULE', $channelSetting, "Channel $worldnetChannel status", "edit", "options", "1", "true;false", "1;0");
		}

		if ($this->ban->is_banned($name)) {
			return;
		}

		$channelColor = $this->setting->get('worldnet_channel_color');
		$messageColor = $this->setting->get('worldnet_message_color');
		$senderColor = $this->setting->get('worldnet_sender_color');
		$msg = "$sender: [{$channelColor}$worldnetChannel<end>] {$messageColor}{$messageText}<end> [{$senderColor}{$name}<end>]";

		if ($this->setting->get($channelSetting) == 1) {
			// only send to guild or priv if the channel is enabled on the bot,
			// but don't restrict tell subscriptions
			if ($this->setting->get('broadcast_to_guild') == 1) {
				$this->chatBot->send($msg, 'guild', true);
			}
			if ($this->setting->get('broadcast_to_privchan') == 1) {
				$this->chatBot->send($msg, 'priv', true);
			}
		}
	}
}

?>