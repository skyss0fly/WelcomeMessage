<?php

namespace skyss0fly\welcomemessage;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use joejoe77777\FormAPI;

class Main extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
private function updateConfig() €
if (file_exists (Sthis->getDatafolder () .
'config.ym]')) {
Sthis->saveResource( config.ym]') ;
return:
if (Sthis->getConfig()-›get('config-version')!== self:: CONFIG_VERSION) {
Sconfig_version = $this->getConfig()->get('config-version');
Sthis->getLogger()->info("Your Config isn't the latest. We renamed your old config to sbconfig-"
. Sconfig_version . ". ym
rename (Sthis->getDatafolder () . "config.ymI', Sthis->getDatafolder () . 'config-' . $config_version
".yml');
Sthis->saveResource( config.ym]');
}
}
    public function onPlayerJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $servername = $this->getConfig()->get("ServerName");
        $prefix = $this->getConfig()->get("Prefix");
        $message = $this->getConfig()->get("Message");
        $formmode = $this->getConfig()->get("formmode);
        $broadcasttoserver = $this->getConfig()->get("BroadcastToServer");
        $message = str_replace("{player}", $player->getName(), $message);
        $prefix = str_replace("&", "§", $prefix);
        $servername = str_replace("&", "§", $servername);
        $message = str_replace("&", "§", $message);
        $message = $prefix . ": " . $message . $servername;
if ($broadcasttoserver === true and $formmode === false) {
        $this->getServer()->broadcastMessage($message);
}
elseif ($broadcasttoserver === false and $formmode === false {
    $player->sendMessage($message);
}
else {
 //* form stuff here
    }
}
