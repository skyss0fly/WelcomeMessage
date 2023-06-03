<?php

namespace skyss0fly\welcomemessage;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

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
        $messageoptions = $this->getConfig()->get("messageoptions");
        $message = str_replace("{player}", $player->getName(), $message);
        $prefix = str_replace("&", "§", $prefix);
        $servername = str_replace("&", "§", $servername);
        $message = str_replace("&", "§", $message);
        $message = $prefix . ": " . $message . $servername;
if ($messageoptions === "broadcast") {
        $this->getServer()->broadcastMessage($message);
}  if ($messageoptions === "whisper") {
        $this->getServer()->broadcastMessage($message);
}
 if ($messageoptions === "whisper") {
         $player->sendMessage($message);
 }
       if ($messageoptions === "both") {
$player->sendMessage($message);
           $this->getServer()->broadcastMessage($message);
       }
    }
}
