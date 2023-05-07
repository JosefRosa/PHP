<?php
interface IChain {
    public function addBlock(Block $block): static;
    public function getBlock(int $id): ?Block;
    public function getLastBlock(): ?Block;
    public function isValid(): bool;
}

$ch = (new Chain)
    ->addBlock(new Block("Varnsdorf", 0, date('Y-m-d H:i:s'), ""))
    ->addBlock(new Block("Rumburk", 1, date('Y-m-d H:i:s'), ""));
var_dump($ch);
echo "Chain " . ($ch->isValid() ? "is" : "is not") . " valid.\n";
echo "Poslední město: " . $ch->getLastBlock()->getContent() . "\n";
