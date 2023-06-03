<?php

namespace skyss0fly\welcomemessage;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use joejoe77777\FormAPI;

class Main extends PluginBase implements Listener {
const CONFIG_VERSION = 1;
    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
  private function updateConfig(){
        if (!file_exists($this->getDataFolder() . 'config.yml')) {
            $this->saveResource('config.yml');
            return;
        }
        if ($this->getConfig()->get('config-version') !== self::CONFIG_VERSION) {
            $config_version = $this->getConfig()->get('config-version');
            $this->getLogger()->info("Your Config isn't the latest. We renamed your old config to §bconfig-" . $config_version . ".yml §6and created a new config");
            rename($this->getDataFolder() . 'config.yml', $this->getDataFolder() . 'config-' . $config_version . '.yml');
            $this->saveResource('config.yml');
        }
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
 ```php
public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer();

        $joinform = new SimpleForm(function (Player $player, $data){
            $result = $data;
            if ($result !== null) {
                switch ($result) {
                    case 0:
                    $sumbitmsg = $this->config->get("Sumbit-Msg");
                    $player->sendMessage(self::PREFIX . $sumbitmsg);
                    break;
                }
            }
        });
        $formtitle = $this->config->get("Form-Title");
        $formcontent = $this->config->get("Form-Content");
        
        $joinform->setTitle($formtitle);
        $joinform->setContent($formcontent);
        $joinform->addButton("§d§lSumbit");
        $player->sendForm($joinform);
    }
```
    }
}
