    <?php

    /* Gerar o array com todos os caracteres ASCII da vírgula até a barra vertical */
    $array = range(",", "|");
    /*
  var_dump($array); // preferir usar var_dump porque fica uma lista tudo em baixo do outro nesse caso
  echo "<hr>";
*/
    // Remover e descartar um elemento aleatório do array

    $ArrayAntes = $array;

    $remove = array_splice( // array_splice Remove uma parte array e a substitui por outra coisa
        $array,
        rand( // Gera um número inteiro aleatório
            0,
            count($array) - 1
        ),
        1
    )[0];


    $ArrayDepois = $array;

    /*  echo "Mostra a array ja sem o elemento que foi retirado";*/
    //  var_dump($array);

    /* Encontrar o caractere que está faltando */
    $faltando = null;

    for ($i = 0; $i < count($array); $i++) {

        if (ord($array[$i]) - ord($array[0]) != $i) {
            $faltando = chr(ord($array[0]) + $i);
            "linha" . $i;
            $LinhaQueAlterou = $i;
            break;
        }
    }
    /*
    Imprimir o resultado
      echo "Caractere removido: " . $remove . "<br>";
      echo "<hr>";
      echo "Caractere : " . $faltando . "<br>";
      */
    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>CRIAR NUMERO PRIMO</title>
    </head>

    <body>
        <div class="container py-3">
            <span class="fw-bold text-primary mb-3">A linha que foi afetada foi a linha: <span class="text-dark"><?= $LinhaQueAlterou ?></span> o caracter que está faltando: <span class="text-dark"><?= $faltando ?></span> </span>
            <div class="mx-auto col-md-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Antes</th>
                            <th scope="col">Depois</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php foreach ($ArrayAntes as $indice => $r) :  ?>
                                    <?php if ($LinhaQueAlterou == $indice) : ?>
                                        <span class="bg-danger fw-bold text-white">Linha Afetada - <?= $r ?> </span>
                                    <?php else : ?>
                                        <span class="fw-bold text-"> <?= $r ?> </span>
                                    <?php endif; ?>
                                    <hr>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($ArrayDepois as $indiceB => $b) :  ?>
                                    <span class="fw-bold text-"> <?= $b ?> </span>
                                    <hr>

                                <?php endforeach; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>