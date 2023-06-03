<?php

namespace skyss0fly\welcomemessage;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use skyss0fly\welcomemessage\Form\{form, simpleform};

class Main extends PluginBase implements Listener {
    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

 
    public function onPlayerJoin(PlayerJoinEvent $event) {
    

        $joinform = new SimpleForm(function (Player $player, $data){
            $result = $data;
            if ($result !== null) {
                switch ($result) {
                    case 0:
                  
                    $submitmsg = $this->config()->get("Submit-Msg");
                    $player->sendMessage(self::PREFIX . $sumbitmsg);
                    break;
                }
            }
        });
        $formtitle = $this->config()->get("Form-Title");
        $formcontent = $this->config()->get("Form-Content");
        
        $joinform->setTitle($formtitle);
        $joinform->setContent($formcontent);
        $joinform->addButton("§d§lSumbit");
        $player->sendForm($joinform);
    }
}
