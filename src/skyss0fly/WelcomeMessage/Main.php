<?php

namespace skyss0fly\WelcomeMessage;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\{PlayerJoinEvent, PlayerQuitEvent};
use skyss0fly\WelcomeMessage\Form\{Form, SimpleForm};
use pocketmine\player\Player;
use cooldogepm\BedrockEconomy\api\BedrockEconomyAPI;

class Main extends PluginBase implements Listener {

    private $cooldown;
    
    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->cooldown = $this->getConfig()->get("Cooldown");
        // Initialise Daily Cooldown
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();
        $xuid = $player->getXuid();
        // Returns Empty if Player is not Logged into Xbox Auth.
        
        $config = $this->getConfig();
 //       if ($config->get("UseBedrockEconomy") === true) {
$currentTime = time();
                if (isset($this->cooldowns[$player_name]) && $this->cooldowns[$player_name] > $currentTime && !$sender->hasPermission("WelcomeMessage.cooldownbypass")) {
                    $remainingTime = $this->cooldowns[$player_name] - $currentTime;
                    
                    return false;
                    
                } else {
                    BedrockEconomyAPI::CLOSURE()->add(
    xuid: $xuid,
    username: $player->getNameExact(),
    amount: $this->getConfig()->get("Amount"),
    decimals: 0,
    onSuccess: static function (): void {
        echo 'Balance updated successfully.';
    },
    onError: static function (SQLException $exception): void {
        if ($exception instanceof RecordNotFoundException) {
            echo 'Account not found';
            return;
        }

        echo 'An error occurred while updating the balance.';
    }
);

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
            if ($config->get("Whisper") === false){
            $rawMessage = $config->get("JoinMessage");
            $message = str_replace("{player}", $player->getName(), $rawMessage);
            $this->getServer()->broadcastMessage($message);
        }
            else {
            $rawMessage = $config->get("JoinMessage");
            $message = str_replace("{player}", $player->getName(), $rawMessage);
            $player->sendMessage($message);
            
    }
        }
                }
    }
    public function onPlayerLeave(PlayerQuitEvent $event): void {
        $player = $event->getPlayer();
        $config = $this->getConfig();
        $leaveMessageEnabled = $config->get("LeaveMessageEnabled");

        if ($leaveMessageEnabled === true) {
            $rawMessage = $config->get("LeaveMessage");
            $message = str_replace("{player}", $player->getName(), $rawMessage);
            $this->getServer()->broadcastMessage($message);
        } elseif ($leaveMessageEnabled === false) {
            // No action required
        } else {
            $this->getLogger()->error("Invalid value for 'LeaveMessageEnabled'. Disabling plugin to protect the server.");
            $this->getServer()->getPluginManager()->disablePlugin($this);
        }
    }
}
