<?php

namespace Omega892\LogsMessage;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;
use pocketmine\scheduler\Task;

use Omega892\LogsMessage\Events\ChatEvents;


class Main extends PluginBase {

    use SingletonTrait;
    public static Config $config;

    public function onEnable(): void {
        self::setInstance($this);
        $this->saveDefaultConfig();
        self::$config = new Config($this->getDataFolder() . 'config.yml', Config::YAML);

        $this->getServer()->getPluginManager()->registerEvents(new ChatEvents(),$this);
    }
}