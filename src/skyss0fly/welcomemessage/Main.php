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
        
 $title = $this->getConfig()->get("Title");
 $content = $this->getConfig()->get("Content");
 $button = $this->getConfig()->get("ButtonText");
 $btn1 = $this->getConfig()->get("Btn1");
$form = new SimpleForm(function(Player $player, $data){
    if($data === null) return;
  
});
$form->setTitle($title);
$form->setContent($content);
$form->addButton($button);
$form->addButton($btn1);
$player->sendForm($form);

}
}
