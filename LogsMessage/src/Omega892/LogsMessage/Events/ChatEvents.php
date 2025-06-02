<?php

namespace Omega892\LogsMessage\CEvents;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use CortexPE\DiscordWebhookAPI\Message;
use CortexPE\DiscordWebhookAPI\Webhook;
use Omega892\LogsMessage\Main;

class ChatEvents implements Listener {

    public function onChat(PlayerChatEvent $event){

        $webhookURL = Main::$config->get("webhook-url");
        $player = $event->getPlayer();
        $message = $event->getMessage();
        $name = $player->getName();
        $date = date("Y-m-d H:i:s");

        $log = "[$date] **{$name}**: {$message}";

        $msg = new Message();
        $webHook = new Webhook($webhookURL);
        $msg->setContent($log);
        $webHook->send($msg);
    }
}