<?php
class Chain implements IChain {
    private array $blocks = [];

    public function addBlock(Block $block): static {
        $lastBlock = $this->getLastBlock();
        $blockHash = $this->generateBlockHash($block, $lastBlock);
        $block = new Block($block->getContent(), $lastBlock->getId() + 1, date('Y-m-d H:i:s'), $blockHash);
        $this->blocks[] = $block;
        return $this;
    }

    public function getBlock(int $id): ?Block {
        foreach ($this->blocks as $block) {
            if ($block->getId() === $id) {
                return $block;
            }
        }
        return null;
    }

    public function getLastBlock(): ?Block {
        if (count($this->blocks) > 0) {
            return end($this->blocks);
        }
        return null;
    }

    public function isValid(): bool {
        foreach ($this->blocks as $i => $block) {
            if ($i === 0) {
                continue;
            }

            $previousBlock = $this->blocks[$i-1];

            if ($block->getId() !== $previousBlock->getId() + 1) {
                return false;
            }

            if ($block->getHash() !== $this->generateBlockHash($block, $previousBlock)) {
                return false;
            }
        }
        return true;
    }

    private function generateBlockHash(Block $block, ?Block $previousBlock): string {
        $previousHash = $previousBlock ? $previousBlock->getHash() : "";
        return hash("sha256", $block->getContent() . $block->getId() . $block->getDttm() . $previousHash);
    }
}
