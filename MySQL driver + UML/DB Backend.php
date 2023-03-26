<?php

class MySQL implements IDB
{
    private $connection;

    public function connect(
        string $host = "",
        string $username = "",
        string $password = "",
        string $database = ""
    ): ?static {
        $this->connection = mysqli_connect($host, $username, $password, $database);
        return $this;
    }

    public function select(string $query): array {
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            return [];
        }
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $rows;
    }

    public function insert(string $table, array $data): bool {
        $keys = implode(',', array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $query = "INSERT INTO $table ($keys) VALUES ($values)";
        return mysqli_query($this->connection, $query);
    }

    public function update(string $table, int $id, array $data): bool {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "$key='$value',";
        }
        $query = "UPDATE $table SET $set WHERE id=$id";
        return mysqli_query($this->connection, $query);
    }

    public function delete(string $table, int $id): bool {
        $query = "DELETE FROM $table WHERE id=$id";
        return mysqli_query($this->connection, $query);
    }
}

class Entity {
    private $id;
    private $name;
    private $description;

    public function __construct(int $id, string $name, string $description) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }
}

class Entity {
    protected $db;

    public function __construct(IDB $db) {
        $this->db = $db;
    }

    public function getAll(): array {
        return $this->db->select("SELECT * FROM entities");
    }
}

class HTMLTable {
    public function generate(array $data): string {
        $html = '<table>';
        $html .= '<tr>';
        foreach (array_keys($data[0]) as $header) {
            $html .= "<th>$header</th>";
        }
        $html .= '</tr>';
        foreach ($data as $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= "<td>$cell</td>";
            }
            $html .= '</tr>';
        }
        $html .= '</table>';
        return $html;
    }
}

$db = (new MySQL())->connect("localhost", "username", "password", "database");
$entity = new Entity($db);
$data = $entity->getAll();
$table = new HTMLTable();
echo $table->generate($data);
