<?php
namespace skyss0fly\WelcomeMessage;
use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {
public function onEnable() {

$this->getLogger()info()->("Welcome Message Has Loaded ");
}
}
public function PlayerJoin() {
$this->getServer(->broadcastMessage("Welcome to" . $config this-> new(Servername) "!";
$this->getLogger()info()->("Player has joined.");
}
