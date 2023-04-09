<?php
namespace skyss0fly\WelcomeMessage;
use resources\CustomConfig;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {






public function onEnable() {
	$this->getLogger()->info("Welcome Message Has Successfully loaded");
	$this->saveDefaultConfig()
$this->getConfig()->get("ServerName")
$this->getConfig()->get("Prefix")
}

public function PlayerJoin() {
$this->getLogger()->info("player has joined!");
$this->getServer()->broadcastMessage("Welcome to" . $ServerName);
}
}