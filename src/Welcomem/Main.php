<?php

namespace Welcomem;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

class Main extends PluginBase implements Listener
{

    public function onEnable(): void
    {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onJoin(PlayerJoinEvent $event): void
    {
        $player = $event->getPlayer();
        $name = $player->getName();
        $config = $this->getConfig();
        $joinMessage = $config->get("welcome_message", "");
        $joinMessage = str_replace("<player>", $name, $joinMessage);
        $player->sendMessage($joinMessage);
        $jointitle = $config->get("welcome_title", "");
        $jointitle = str_replace("<player>", $name, $jointitle);
        $joinsubtitle = $config->get("welcome_subtitle", "");
        $joinsubtitle = str_replace("<player>", $name, $joinsubtitle);
        $player->sendTitle($jointitle, $joinsubtitle, 20, 100, 20);
    }
}
