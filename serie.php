<?php

include 'conexao.php';

// criado por samuel de sousa campos

$stmt = $pdo->prepare('SELECT * FROM series_tv');
$stmt->execute();
$results = $stmt->fetchAll(); // coleta todos os dados de cada coluna da tabela sem exceção

//var_dump($results);

$q = (isset($_POST['q'])) ? $_POST['q'] : ''; // aqui irei receber a data referente a pesquisa
$id = (isset($_POST['id'])) ? $_POST['id'] : ''; // aqui irei receber a data referente a pesquisa

$dataR = $q; // apenas criei um apelido para a query que vai receber o POST
$data = date_create($dataR); // crio um data pra ser mais correto para a pesquisa

if (empty($id)) : //verifico se esta passando id, se nao ele deixa a variavel sem valor
    $PesquisaId = '';
    $pesquisa = '';
else :
    foreach ($id as $rss) : //faço um loop em todos os id que estao vindo atraves do POST
        $PesquisaId = implode("','", $id); // adiciono uma virgula apos a id para fazer a pesquisa
    endforeach;
    $PesquisaId;
    $pesquisa = "id IN ('$PesquisaId') "; // aqui ire pesquisar por todas as series que tiverem TAL ID na tabela
endif;


$stmt = $pdo->prepare('SELECT * FROM series_tv');
$stmt->execute();
$series = $stmt->fetchAll(); // carrego todas as series

if (empty($id)) :
    "carrega todos os dados";
    $stmt = $pdo->prepare('SELECT * FROM series_tv');  // carrego todas as series se nao tiver pesquisa
    $stmt->execute();
    $results = $stmt->fetchAll();
else : // se tiver pesquisa ele vai ler o codigo abaixo
    $stmt = $pdo->prepare("SELECT * FROM series_tv WHERE $pesquisa ORDER BY titulo asc"); // seleciona todos as series de tv que contem o tal id na alfabetica
    $stmt->execute();
    $results = $stmt->fetchAll();
endif;


foreach ($results as $r) :

    $id = $r['id'];
    $stmt = $pdo->prepare("SELECT * FROM series_tv_intervalos WHERE id_serie_tv = $id"); // seleciona os dados da tabela refente a cada id da chave primaria
    $stmt->execute();
    $resultados = $stmt->fetchAll(); // coleta todos os dados de cada coluna da tabela sem exceção

    foreach ($resultados as $i => $arr) {
        $dia[$i] = $arr['dia_da_semana']; // crie uma variavel dia referente a cada serie
        $hora[$i] = $arr['horario']; // // crie uma variavel hora referente a cada serie

        // Define a data e hora da próxima exibição
        $proximaData = new DateTime($arr['horario']);
        // Calcula a diferença entre as datas
        $diff = $data->diff($proximaData);
        // Verifica se a próxima exibição já ocorreu
        if ($diff->invert) {
            $Data[$i] = 'A exibição já ocorreu';
        } else {
            $Data[$i] = 'A próxima exibição será em ' . $diff->format('%d dias, %h horas e %i minutos.');
        }
    }

    $arrGeral[] = array( // criei uma array para salvar todo os dados que preciso para aparecer ao usuario
        "id" => $r['id'],
        "titulo" => $r['titulo'],
        "canal" => $r['canal'],
        "genero" => $r['genero'],
        "dia_da_semana" =>  $dia[$i],
        "horario" =>  $hora[$i],
        "data" =>  $Data[$i]
    );

endforeach;
//var_dump($arrGeral);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="mx-auto col-md-5 mt-5 mb-5">
            <form>
                <div class="mx-auto col-md-5">
                    <button class="btn btn-sm btn-primary mt-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        Filtro
                    </button>
                    <button type="submit" class="btn btn-sm btn-success mt-2">Limpar</button>
                </div>
            </form>
        </div>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filtro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

                <form action="#" method="post">
                    <div class="p-3 bg-light">
                        <label for="exampleFormControlInput1" class="form-label">Escolha uma data e a hora</label>
                        <input type="datetime-local" name="q" placeholder="Pesquisar" class="form form-control">
                        <span class="text-primary">Series</span>
                        <?php foreach ($series as $a) : ?>
                            <div class="col-md-auto mt-2 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="id[]" value="<?php echo $a['id']  ?>">
                                    <label title="<?php echo $a['titulo']  ?>" class="form-check-label text-primary" for="">
                                        <?php echo $a['titulo']  ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="mx-auto col-md-5">
                        <button type="submit" class="btn btn-sm btn-success mt-2">Pesquisar</button>
                    </div>

                </form>
            </div>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Serie</th>
                    <th scope="col">genero</th>
                    <th scope="col">Dia de exibição</th>
                </tr>
            </thead>
        </table>

        <div id="receberDados"></div>

    </div>

    <script>
        const array = JSON.parse('<?= json_encode($arrGeral); ?>'); // passar a array que fiz com todos os dados que precisava para JS
        console.log(array);
        var HtmlDaPagina = "<table class='table table-hover'>";
        for (let i = 0; i < array.length; i++) {
            HtmlDaPagina += "<tbody><tr>";
            HtmlDaPagina += "<td>" + array[i].titulo + "</td>";
            HtmlDaPagina += "<td>" + array[i].genero + "</td>";
            HtmlDaPagina += "<td>" + array[i].data + "</td>";

            HtmlDaPagina += "</tr></tbody>";
        }
        HtmlDaPagina += "</table>";
        HtmlDaPagina += '<span type="" class="badge bg-md bg-primary position-relative"> Quantidade de Series encontrada<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> ' + array.length + ' <span class="visually-hidden">unread messages</span> </span></span>';
        // escreve no HTML
        var elemento = document.getElementById('receberDados');
        elemento.innerHTML = HtmlDaPagina;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>