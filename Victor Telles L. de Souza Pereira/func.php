<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(80deg, #404040 7%, #004608 52%, #004755 100%);
            color: #fff;
            text-align: center;
            padding: 20px;
            min-height: 100vh;
        }

        .gallery-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .gallery-container img {
            width: 250px;
            height: 250px;
            border: 3px solid #fff;
            border-radius: 10px;
            object-fit: cover;
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover,
        .btn-voltar:hover {
            background-color: #2980b9;
        }

        .btn-voltar {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 16px;
            border: none;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['autenticado'])) {
        header('Location: index.php');
        exit;
    }

    $imagens = [
        'img/imagem1.jpg',
        'img/imagem2.jpg',
        'img/imagem3.jpg',
        'img/imagem4.jpg',
        'img/imagem5.jpg'
    ];

    $filtros = [
        'grayscale' => 'filter: grayscale(100%)',
        'sepia' => 'filter: sepia(100%)',
        'brightness' => 'filter: brightness(150%)',
        'none' => ''
    ];

    $filtroAtual = isset($_POST['filtro']) && array_key_exists($_POST['filtro'], $filtros) ? $filtros[$_POST['filtro']] : '';

    if (isset($_POST['esconder'])) array_pop($imagens);
    if (isset($_POST['aleatorizar'])) shuffle($imagens);
    ?>

    <h1>Funções</h1>

    <div class="gallery-container">
        <?php foreach ($imagens as $imagem): ?>
            <img src="<?= $imagem ?>" alt="Imagem" style="<?= $filtroAtual ?>">
        <?php endforeach; ?>
    </div>

    <div class="controls">
        <form method="POST">
            <button type="submit" name="filtro" value="grayscale">Tons de Cinza</button>
            <button type="submit" name="filtro" value="sepia">Filtro Sépia</button>
            <button type="submit" name="filtro" value="brightness">Aumentar Brilho</button>
            <button type="submit" name="aleatorizar">Aleatorizar Imagens</button>
            <button type="submit" name="esconder">Esconder Última Imagem</button>
            <button type="submit" name="filtro" value="none">Remover Filtros</button>
        </form>
    </div>

    <a href="index.php" class="btn-voltar">Voltar</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>