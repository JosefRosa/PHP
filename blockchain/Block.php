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
