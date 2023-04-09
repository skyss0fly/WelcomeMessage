<?php
namespace skyss0fly\WelcomeMessage;
use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {
public function onEnable() {
this->getLogger()info->(TEXTFORMAT::MINECOIN_GOLD . "Welcome Message Has Loaded:) ");
public function on Join() {
$this->getServer(->broadcastMessage("Welcome to" . $config this-> new(Servername) "!";
$this->getLogger0->info("Player has joined.");
}
}