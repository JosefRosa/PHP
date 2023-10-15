<?php

class Graph {
    private $graph = array();

    public function addEdge($start, $end) {
        if (!isset($this->graph[$start])) {
            $this->graph[$start] = array();
        }
        $this->graph[$start][] = $end;
    }

    public function hasPath($start, $end) {
        $visited = array();
        $queue = new SplQueue();

        $queue->enqueue($start);
        $visited[$start] = true;

        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();

            foreach ($this->graph[$node] as $neighbor) {
                if (!isset($visited[$neighbor])) {
                    if ($neighbor === $end) {
                        return true;
                    }
                    $queue->enqueue($neighbor);
                    $visited[$neighbor] = true;
                }
            }
        }
        return false;
    }
}

$graph = new Graph();
$graph->addEdge(1, 2);
$graph->addEdge(2, 3);
$graph->addEdge(3, 4);
$graph->addEdge(4, 5);

$startNode = 1;
$endNode = 5;

if ($graph->hasPath($startNode, $endNode)) {
    echo "Cesta mezi uzly $startNode a $endNode existuje.";
} else {
    echo "Cesta mezi uzly $startNode a $endNode neexistuje.";
}

?>
