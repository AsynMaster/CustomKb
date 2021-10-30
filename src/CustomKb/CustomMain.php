<?php

namespace CustomKb;

use pocketmine\plugin\PluginBase;

class CustomMain extends PluginBase
{
    private static $main;

    public function onEnable()
    {
        self::$main = $this;
        $this->saveDefaultConfig();
        
        $command = explode(":", $this->getConfig()->get("command"));
        $this->getServer()->getCommandMap()->register($command[0], new CustomKbCommand($this));
        $this->getServer()->getPluginManager()->registerEvents(new CustomKbEvent(), $this);
    }

    public static function getInstance(): CustomMain
    {
        return self::$main;
    }
}
