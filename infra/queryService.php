<?php

class QueryService {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function busca($tabela, $colunas = array(), $condicoes = "", $joins = array()) {
        if (empty($colunas)) {
            $sql = "SELECT * FROM " . $tabela;
        } else {
            $sql = "SELECT " . implode(", ", $colunas) . " FROM " . $tabela;
        }

        if (!empty($joins)) {
            foreach ($joins as $join) {
                $sql .= " " . $join;
            }

        }

        if (!empty($condicoes)) {
            $sql .= " WHERE " . $condicoes;
        }
        // echo "<script>console.log('consulta', " . json_encode($sql) . ");</script>";

        $result = mysqli_query($this->conn, $sql);

        if (!$result) {
            die("Erro na consulta: " . mysqli_error($this->conn));
        }

        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    public function __destruct() {
        mysqli_close($this->conn);
    }
}

?>
