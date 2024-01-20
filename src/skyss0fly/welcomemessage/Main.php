<?php

namespace skyss0fly\welcomemessage;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\{PlayerJoinEvent, PlayerQuitEvent};
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
    
  public function onPlayerLeave(PlayerQuitEvent $event) {
       $player = $event->getPlayer();
      $msg = $this->getConfig()->get("LeaveMessage");
            $deactivate = $this->getConfig()->get("LeaveMessageEnabled");
      if ($deactivate == "true") {
if ($msg->str_contains("{player}")) {

    $leavemsg = str_replace("{player}" , $player->getName(), $msg);
}

    $this->getServer()->broadcastMessage($leavemsg);
    }
      elseif ($deactivate == "false") {
          # Nothing
      }
      else {
$this->getLogger()->error("An Error Has Occurred within the configuration of This Plugin, 'LeaveMessageEnabled has an invalid bool Value' To protect your server from corruption, this Plugin Will Disable itself ");
          $this->getServer()->getPluginManager()->disablePlugin($this);
      }
}

}
