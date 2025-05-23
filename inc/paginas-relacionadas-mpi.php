<?php
$mpiLimit = 4;
$mpiMatches = array();
$commonKeyWords = ['a', 'ante', 'até', 'após', 'de', 'desde', 'em', 'entre', 'com', 'para', 'por', 'perante', 'sem', 'sob', 'sobre', 'na', 'no', 'e', 'do', 'da', 'mais', 'empresa', 'empresas', 'servico', 'servicos', 'fabricacao', 'fabricante', 'distribuidor', 'distribuidores', 'fornecedor', 'fornecedores', 'aluguel', 'preco', 'valor', 'orcamento', 'projeto', 'projetos', 'frete', 'calcular', 'calculo', 'rápido', 'brasil', 'sao paulo', 'sp', 'entrega', 'cotação', 'consulta', 'cotar', 'enviar', 'envio', 'preço', 'compra', 'venda', 'produtor', 'marca', 'garantia', 'tipos', 'especialização', 'recomendações', 'eficiência', 'durabilidade', 'uso', 'benefícios'];
$currentKeyWords = array_diff(explode('-', $urlPagina), $commonKeyWords);

// Verifica se estamos em modo híbrido
if ($hibrido) {
    // Itera sobre categorias e suas subcategorias
    foreach ($vetProjetoBusca as $categoria) {
        foreach ($categoria['sub-menu'] as $item) {
            $mpiKeyWords = array_diff(explode('-', $item['url']), $commonKeyWords);
            $mpiEqualWords = count(array_intersect($currentKeyWords, $mpiKeyWords));
            if ($mpiEqualWords > 0 && $item['url'] != $urlPagina) {
                $mpiMatches[] = [
                    "equalWords" => $mpiEqualWords,
                    'mpiKey' => $item['url']  // Corrigido para usar o URL em vez de uma chave numérica
                ];
            }
        }
    }

    // Ordena os matches por número de palavras iguais em ordem decrescente
    rsort($mpiMatches);

    // Se houver 5 ou mais subcategorias, adicione itens aleatórios até o limite
    if (count($mpiMatches) < $mpiLimit) {
        // Cria uma lista de URLs de subcategorias existentes
        $allSubmenuUrls = [];
        foreach ($vetProjetoBusca as $categoria) {
            foreach ($categoria['sub-menu'] as $item) {
                $allSubmenuUrls[] = $item['url'];
            }
        }

        // Remove URLs já existentes em $mpiMatches
        $existingUrls = array_column($mpiMatches, 'mpiKey');
        $remainingUrls = array_diff($allSubmenuUrls, $existingUrls, [$urlPagina]);

        // Adiciona URLs aleatórias ao array de matches até alcançar o limite
        while (count($mpiMatches) < $mpiLimit && !empty($remainingUrls)) {
            $randomUrl = array_rand($remainingUrls);
            $mpiMatches[] = [
                'equalWords' => 0,
                'mpiKey' => $remainingUrls[$randomUrl]
            ];
            // Remove a URL selecionada para evitar repetições
            unset($remainingUrls[$randomUrl]);
        }
    }
?>
    <section class="mpi-pag_relacionadas">
        <div class="container">
            <div class="wrapper">
                <h2>Páginas Relacionadas</h2>
                <div class="row">
                    <?php foreach ($mpiMatches as $key => $item):
                        if ($key >= $mpiLimit) break;
                        $mpiUrl = $item['mpiKey'];
                        $mpiTitle = ''; // Inicializa como uma string vazia
                        // Encontra o título correspondente para a URL
                        foreach ($vetProjetoBusca as $categoria) {
                            foreach ($categoria['sub-menu'] as $subItem) {
                                if ($subItem['url'] === $mpiUrl) {
                                    $mpiTitle = $subItem['key'];
                                    break 2;
                                }
                            }
                        }
                    ?>
                        <div class="col-3">
                            <div class="card card--pag-relacionadas">
                                <a rel="nofollow" href="<?= $url . $mpiUrl ?>" title="<?= htmlspecialchars($mpiTitle) ?>">
                                    <img class="card__cover" src="<?= $url ?>imagens/categorias/<?= htmlspecialchars($mpiUrl) ?>.webp" title="<?= htmlspecialchars($mpiTitle) ?>" alt="<?= htmlspecialchars($mpiTitle) ?>" loading="lazy">
                                    <h2 class="card__title"><?= htmlspecialchars($mpiTitle) ?></h2>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php
// Verifica se $buscaone é verdadeiro
if ($buscaone) {
    foreach ($vetKey as $key => $item) :
        $mpiKeyWords = array_diff(explode('-', $item['url']), $commonKeyWords);
        $mpiEqualWords = count(array_intersect($currentKeyWords, $mpiKeyWords));
        if ($mpiEqualWords > 0 && $item['url'] != $urlPagina) :
            array_push($mpiMatches, array("equalWords" => $mpiEqualWords, 'mpiKey' => $key));
        endif;
    endforeach;
    rsort($mpiMatches);
    if (count($vetKey) >= 5) :
        while (count($mpiMatches) < $mpiLimit) {
            $randomRelated = array_rand($vetKey);
            if ($urlPagina != $vetKey[$randomRelated]['url']) :
                if (!in_array($randomRelated, array_column($mpiMatches, 'mpiKey'))) :
                    array_push($mpiMatches, array('equalWords' => 0, 'mpiKey' => $randomRelated));
                endif;
            endif;
        }
    endif;
?>
    <section class="mpi-pag_relacionadas">
        <div class="container">
            <div class="wrapper">
                <h2>Páginas Relacionadas</h2>
                <div class="row">
                    <?php foreach ($mpiMatches as $key => $item):
                        if ($key >= $mpiLimit) break;
                        $mpi = $vetKey[$item['mpiKey']];
                        $mpiTitle = $mpi['key'];
                        $mpiUrl = $mpi['url']; ?>
                        <div class="col-3">
                            <div class="card card--pag-relacionadas">
                                <a rel="nofollow" href="<?= $url . $mpiUrl ?>" title="<?= $mpiTitle ?>">
                                    <img class="card__cover" src="<?= $url ?>imagens/categorias/<?= $mpiUrl ?>-01.webp" title="<?= $mpiTitle ?>" alt="<?= $mpiTitle ?>" loading="lazy">
                                    <h2 class="card__title"><?= $mpiTitle ?></h2>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>