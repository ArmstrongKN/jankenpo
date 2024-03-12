 
<!DOCTYPE html>
<html>
<head>
    <title>Jankenpo</title>
</head>
<body>

<!--form action levando para a pagina jankenpo
  um select com o nome jogada e um botão submit-->
    <h1>Bem-vindo ao Jankenpo!</h1>
    <form action="jankenpo.php" method="post">
        <label for="jogada">Escolha sua jogada:</label>
        <select name="jogada">
            <option value="pedra">Pedra</option>
            <option value="papel">Papel</option>
            <option value="tesoura">Tesoura</option>
        </select>
        <input type="submit" value="Jogar">
    </form>
</body>
</html>


 

