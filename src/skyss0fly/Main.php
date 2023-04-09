<?php
namespace skyss0fly\WelcomeMessage;
use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {






public function onEnable() {
	$this->getLogger()->info(TextFormat::MINECOIN_GOLD . "Welcome Message Has Successfully loaded");
}

public function PlayerJoin() {
$this->getLogger()->info(TextFormat::MINECOIN_GOLD . "player has joined!");
$this->getServer(broadcastMessage("Welcome to" . $config::SERVERNAME);
}
