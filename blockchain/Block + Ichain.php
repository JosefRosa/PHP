<?php

class Block {
    private int $id;
    private string $dttm;
    private string $hash;
    private string $content;

    public function __construct(string $content, int $id, string $dttm, string $hash) {
        $this->content = $content;
        $this->id = $id;
        $this->dttm = $dttm;
        $this->hash = $hash;
    }

    public function getContent(): string {
        return $this->content;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getDttm(): string {
        return $this->dttm;
    }

    public function getHash(): string {
        return $this->hash;
    }
}

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
