<?php

namespace skyss0fly\welcomemessage;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use skyss0fly\welcomemessage\Form\{Form, SimpleForm};
use pocketmine\player\Player;

class Main extends PluginBase implements Listener {
    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

 
    public function onPlayerJoin(PlayerJoinEvent $event) {
       $player = $event->getPlayer();
        

         
        $joinform = new SimpleForm(function (Player $player, $data){
            $result = $data;
            if ($result !== null) {
        
                switch ($result) {
                    case 0:
                  
                    $submitmsg = $this->getConfig()->get("Submit-Msg");
                    $player->sendMessage($submitmsg);
                      
                    break;
                }
            }
        });
        $formtitle = $this->getConfig()->get("Form-Title");
        $formcontent = $this->getConfig()->get("Form-Content");
    
       
        $joinform->setTitle($formtitle);
        $joinform->setContent($formcontent);
        $joinform->addButton("§d§lSubmit!");
        $player->sendForm($joinform);
    }
    


}
