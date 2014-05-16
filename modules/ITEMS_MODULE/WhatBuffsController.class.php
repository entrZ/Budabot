<?php

namespace Budabot\User\Modules;

/**
 * @Instance
 *
 * Commands this controller contains:
 *	@DefineCommand(
 *		command     = 'whatbuffs',
 *		accessLevel = 'all',
 *		description = 'Find items that buff an ability or skill',
 *		help        = 'whatbuffs.txt'
 *	)
 */
class WhatBuffsController {
	
	public $moduleName;

	/** @Inject */
	public $http;

	/** @Inject */
	public $text;
	
	/** @Inject */
	public $db;
	
	/** @Inject */
	public $util;
	
	/** @Inject */
	public $itemsController;
	
	/** @Logger */
	public $logger;
	
	private $types = array('Weapon' => '-3', 'Armor' => '-4', 'Utility' => '-6');
	
	/** @Setup */
	public function setup() {
		$this->db->loadSQLFile($this->moduleName, "skills");
	}

	/**
	 * @HandlesCommand("whatbuffs")
	 * @Matches("/^whatbuffs$/i")
	 * @Matches("/^whatbuffs ([^ ]+)$/i")
	 * @Matches("/^whatbuffs ([^ ]+) (.*)$/i")
	 */
	public function whatbuffsCommand($message, $channel, $sender, $sendto, $args) {
		if (count($args) == 1) {
			$blob = '';
			forEach ($this->types as $type => $typeId) {
				$blob .= $this->text->make_chatcmd(ucfirst($type), "/tell <myname> whatbuffs $type") . "\n";
			}
			$msg = $this->text->make_blob("WhatBuffs - Choose Type", $blob);
		} else if (count($args) == 2) {
			$type = ucfirst(strtolower($args[1]));
			$data = $this->db->query("SELECT name FROM skills WHERE common = 1");
			$blob = '';
			forEach ($data as $row) {
				$blob .= $this->text->make_chatcmd(ucfirst($row->name), "/tell <myname> whatbuffs $type $row->name") . "\n";
			}
			$msg = $this->text->make_blob("WhatBuffs - Choose Skill", $blob);
		} else if (count($args) == 3) {
			$type = ucfirst(strtolower($args[1]));
			$typeId = $this->types[$type];
			$skill = $args[2];
			$postParams = array('submit' => 'search', 'conditions' => "EFF($skill)>=1", 'searchtype' => $typeId);

			$response = $this->http->post("http://auno.org/ao/db.php?cmd=parse-search")->withQueryParams($postParams)->waitAndReturnResponse();
			$newUrl = "http://auno.org" . $response->headers['location'] . "&pagesize=1000";
			$contents = $this->http->post($newUrl)->waitAndReturnResponse()->body;
			
			preg_match_all("@<a href=\"/ao/db.php\?id=(\d+)\">([^>]+)</a>@", $contents, $matches, PREG_SET_ORDER);
			
			$blob = $this->text->make_chatcmd("See results on Auno.org", "/start $newUrl") . "\n\n";
			$count = 0;
			forEach ($matches as $match) {
				$item = $this->itemsController->findById($match[1]);
				if ($item !== null) {
					$count++;
					$blob .= $this->text->make_item($item->lowid, $item->highid, $item->highql, $item->name) . "\n";
				}
			}
			$blob .= "\nSearch results provied by Auno.org";
			
			if ($count > 0) {
				$msg = $this->text->make_blob("WhatBuffs - $type $skill ($count)", $blob);
			} else {
				$msg = "No results found for $type $skill.";
			}
		}
		$sendto->reply($msg);
	}
}

?>
