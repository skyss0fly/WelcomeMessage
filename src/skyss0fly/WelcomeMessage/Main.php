<?php

namespace skyss0fly\WelcomeMessage;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\{PlayerJoinEvent, PlayerQuitEvent};
use skyss0fly\WelcomeMessage\Form\{Form, SimpleForm};
use pocketmine\player\Player;

class Main extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onPlayerJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();
        $config = $this->getConfig();

        if ($config->get("UseFormInsteadOfChat") === true) {
            $joinForm = new SimpleForm(function (Player $player, $data) {
                if ($data !== null) {
                    $submitMessage = $this->getConfig()->get("Submit-Msg");
                    $player->sendMessage($submitMessage);
                }
            });

            $formTitle = $config->get("Form-Title");
            $formContent = $config->get("Form-Content");

            $joinForm->setTitle($formTitle);
            $joinForm->setContent($formContent);
            $joinForm->addButton("§d§lSubmit!");
            $player->sendForm($joinForm);
        } else {
            $rawMessage = $config->get("JoinMessage");
            $message = str_replace("{player}", $player->getName(), $rawMessage);
            $this->getServer()->broadcastMessage($message);
        }
    }

    public function onPlayerLeave(PlayerQuitEvent $event): void {
        $player = $event->getPlayer();
        $config = $this->getConfig();
        $leaveMessageEnabled = $config->get("LeaveMessageEnabled");

        if ($leaveMessageEnabled === true) {
            $rawMessage = $config->get("LeaveMessage");
            $message = str_replace("{player}", $player->getName(), $rawMessage);
            $newMessage = str_replace("{server}", $this->getServer()->getName(), $message);
            $this->getServer()->broadcastMessage($newMessage);
        } elseif ($leaveMessageEnabled === false) {
            // No action required
        } else {
            $this->getLogger()->error("Invalid value for 'LeaveMessageEnabled'. Disabling plugin to protect the server.");
            $this->getServer()->getPluginManager()->disablePlugin($this);
        }
    }
}
