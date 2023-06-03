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
}
}
