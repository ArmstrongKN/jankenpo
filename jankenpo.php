<?php
//primeiro se cria uma classe para o jogador
class Jogador {
    //aqui a variavel para armazenar a escolha do jogador
    private $escolha;
    //aqui a função escolher recebe a opção
    public function escolher($opcao) {
        $this->escolha = $opcao;
    }
    //função getEscolha recebe a escolha da jogada
    public function getEscolha() {
        return $this->escolha;
    }
}

class Jogo {

    //aqui é criado as variaveis
    const PEDRA = 'pedra';
    const PAPEL = 'papel';
    const TESOURA = 'tesoura';

    //função jogar com parametro e com retorno
    //cria o jogador1 ja com a jogada escolhida do HTML
    public static function jogar($jogadaJogador1) {
        $jogador1 = new Jogador();
        $jogador1->escolher($jogadaJogador1);

     //a variavel opcões recebe o array com as 3 opções
        $opcoes = [self::PEDRA, self::PAPEL, self::TESOURA];

     //a variavel jogador2 recebe através de um array randomico(que sorteia uma opção) uma das opções de dentro do array    
        $jogadaJogador2 = $opcoes[array_rand($opcoes)];

        //cria o jogador2 ja com a jogada escolhida do HTML
        $jogador2 = new Jogador();
        $jogador2->escolher($jogadaJogador2);

     //retorna jogador1 e jogador2 e suas escolhas  
        return self::avaliarResultado($jogador1->getEscolha(), $jogador2->getEscolha());
    }

    //function static é uma função que não deverá ser mudada em hipotese nenhuma. Onde essa é a regra.
    private static function avaliarResultado($escolhaJogador1, $escolhaJogador2) {
        //condição de empate
        if ($escolhaJogador1 === $escolhaJogador2) {
            return "Empate!";
            //condição de vitoria do jogador 1
        } elseif (
            ($escolhaJogador1 === self::PEDRA && $escolhaJogador2 === self::TESOURA) ||
            ($escolhaJogador1 === self::TESOURA && $escolhaJogador2 === self::PAPEL) ||
            ($escolhaJogador1 === self::PAPEL && $escolhaJogador2 === self::PEDRA)
        ) {
            return "Jogador 1 ganhou!";
            // se as condições acima não forem validadas então validará a condição abaixo
        } else {
            return "Jogador 2 ganhou!";
        }
    }
}
// define que o metodo enviado do index seja POST e o parametro jogada enviado no metodo POST
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['jogada'])) {
    $jogadaJogador1 = $_POST['jogada'];
    //a variavel resultado armazena a jogada do jogador 1
    // classe jogo chamando o metodo(function) jogar
    //a classe jogo chama a função atraves de ::
    $resultado = Jogo::jogar($jogadaJogador1);
    //senão ele volta para o index.php
} else {
    header("Location: index.php");
    exit;
}
?>

 <!--a parte do html para exibir o resultado e um botão oara voltar para o index-->
<!DOCTYPE html>
<html>
<head>
    <title>Jankenpo - Resultado</title>
</head>
<body>
    <h1>Jogador 1 escolheu: <?php echo ucfirst($jogadaJogador1); ?></h1>
    <h1>Jogador 2 escolheu: <?php echo ucfirst($jogadaJogador2 = Jogo::PEDRA); // Jogador 2 é controlado pelo código ?></h1>
    <h2><?php echo $resultado; ?></h2>
    <p><a href="index.php">Jogar novamente</a></p>
</body>
</html>

 