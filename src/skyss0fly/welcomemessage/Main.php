<?php

namespace skyss0fly\welcomemessage;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\player\Player;

class Main extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onPlayerJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $servername = $this->getConfig()->get("ServerName");
        $prefix = $this->getConfig()->get("Prefix");
        $message = $this->getConfig()->get("Message");
        $broadcasttoserver = $this->getConfig()->get("Broadcast");
        $formmode = $this->getConfig()->get("Mode")
        $msg = str_replace("{player}", $player->getName(), $message);
        $prefix = str_replace("&", "§", $prefix);
        $servername = str_replace("&", "§", $servername);
        $mesg = str_replace("&", "§", $msg);
        $mesag = $prefix . ": " . $mesg . $servername;
if ($broadcasttoserver === true and $formmode === false) {
        $this->getServer()->broadcastMessage($message);
}
elseif ($broadcasttoserver === false and $formmode === false) {
    $player->sendMessage($message);
}
else {
 $title = $this->getConfig()->get("Title");
 $content = $this->getConfig()->get("Content");
 $button = $this->getConfig()->get("ButtonText");

$form = new SimpleForm(function(Player $player, $data){
    if($data === null) return;
  
});
$form->setTitle($title);
$form->setContent($content);
$form->addButton($button);
$player->sendForm($form);

}
}
}
