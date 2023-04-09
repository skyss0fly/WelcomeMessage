<?php
namespace skyss0fly\WelcomeMessage;
use resources\CustomConfig;
use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {






public function onEnable() {
	$this->getLogger()->info(TextFormat::MINECOIN_GOLD . "Welcome Message Has Successfully loaded");
    Sthis->config = new CustomConfig (new CustomConfig(Sthis->getDataFolder () . "config.yml"
CustomConfig:: YAML))) ;
}

public function PlayerJoin() {
$this->getLogger()->info(TextFormat::MINECOIN_GOLD . "player has joined!");
$this->getServer(broadcastMessage("Welcome to" . $config::SERVERNAME);
}
