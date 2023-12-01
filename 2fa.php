<?php 

session_start();
$host = "localhost";
$dbname = "pizzaria";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['resposta']) && isset($_POST['pergunta'])) {
        $resposta = $_POST['resposta'];
        $pergunta = $_POST['pergunta'];
        $email = $_SESSION['email'];

        var_dump($resposta);
        exit();

        switch ($pergunta) {
            case "Qual é o nome da sua mãe?":
                $sql = "SELECT * FROM usuario WHERE usuario.email = '$email'";
                $res = $conn->query($sql);
                $row = $res->fetch_assoc();
                $nomeMaterno = $row['nome_materno'];

                if (strtoupper($nomeMaterno) === strtoupper($resposta)) {
                    echo "true";
                } else {
                    echo "false";
                }
                break;
            case "Qual é a data do seu nascimento?":
                $sql = "SELECT * FROM usuario WHERE usuario.email = '$email'";
                $res = $conn->query($sql);
                $row = $res->fetch_assoc();
                $dataNascimento = $row['dt_nascimento'];

                if ($dataNascimento === $resposta) {
                    echo "true";
                } else {
                    echo "false";
                }
                break;
            case "Qual é o CEP do seu endereço?":
                $sql = "SELECT * FROM usuario WHERE usuario.email = '$email'";
                $res = $conn->query($sql);
                $row = $res->fetch_assoc();
                $cep = $row['cep'];

                if ($cep === $resposta) {
                    echo "true";
                } else {
                    echo "false";
                }
                break;
            default:
                echo "false";
                break;
        }
    } else {
        // Caso a resposta ou a pergunta não tenham sido submetidas
        echo "Resposta ou pergunta não submetidas!";
    }
}

?>