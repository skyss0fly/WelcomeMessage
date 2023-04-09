<?php
namespace skyss0fly\WelcomeMessage;
use resources\CustomConfig;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {






public function onEnable() {
	$this->getLogger()->info("Welcome Message Has Successfully loaded");

}

public function PlayerJoin() {
$this->getLogger()->info("player has joined!");
$this->getServer(BroadcastMessage("Welcome to" . $config::SERVERNAME));
}
}