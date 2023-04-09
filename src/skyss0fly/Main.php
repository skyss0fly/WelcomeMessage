<?php
namespace skyss0fly\WelcomeMessage;
use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {






public function onEnable() {
$this->getLogger()info()->("Welcome message has loaded.");
}

public function PlayerJoin() ::void {
$this->getLogger()info()->("Player has joined.");
$this->getServer(->broadcastMessage("Welcome to" . $config this-> new(Servername)"!");
}
