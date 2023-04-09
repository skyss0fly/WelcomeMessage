<?php

namespace skyss0fly;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\player;
class Main extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->getLogger()->info("Welcome Message plugin has been enabled");
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onPlayerJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $plrname = $player->getName();
        $serverName = $this->getConfig()->get("ServerName");
        $prefix = $this->getConfig()->get("Prefix");
        $message = $prefix . " " . $plrname . ": Welcome to " . $serverName;
        $this->getServer()->broadcastMessage($message);
    }
}
