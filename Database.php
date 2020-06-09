<?php
class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "mobile";
    private $conn;
    public function __construct()
    {
        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8", $this->user, $this->pass);
        $this->conn->exec("SET CHARACTER SET utf8");
    }
    public function showData($page = '1', $limit = '10')
    {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM phone LIMIT $limit OFFSET $offset";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $r;
        }
        return $data;
    }
}
?>
