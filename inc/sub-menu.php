<?php

$vetProjetoBusca = [
    [
        'key' => 'Categoria 1',
        'url' => 'categoria1',
        'sub-menu' => [
            ['key' => 'Subcategoria 1.1', 'url' => 'subcategoria1.1'],
            ['key' => 'Subcategoria 1.2', 'url' => 'subcategoria1.2']
        ]
    ],
    [
        'key' => 'Categoria 2',
        'url' => 'categoria2',
        'sub-menu' => []
    ],
    [
        'key' => 'Categoria 3',
        'url' => 'categoria3',
        'sub-menu' => [
            ['key' => 'Subcategoria 3.1', 'url' => 'subcategoria3.1']
        ]
    ]
];

$vetKey = [
    'key1' => ['key' => 'Item 1', 'url' => 'item1'],
    'key2' => ['key' => 'Item 2', 'url' => 'item2'],
    'key3' => ['key' => 'Item 3', 'url' => 'item3']
];


// Verifica se $hibrido é verdadeiro
if ($hibrido):
    foreach ($vetProjetoBusca as $categoria): ?>
        <li <?php (!empty($categoria['sub-menu'])) ? 'class="dropdown"' : '' ?>>
            <a data-mpi href="<?= $url . $categoria['url'] ?>" title="<?= $url . $categoria['key'] ?>"><?= $categoria['key'] ?></a>
            <?php if (!empty($categoria['sub-menu'])): ?>
                <ul class="sub-menu">
                    <?php foreach ($categoria['sub-menu'] as $subItem): ?>
                        <li>
                            <a data-mpi href="<?= $url . $subItem['url'] ?>" title="<?= $subItem['key'] ?>"><?= $subItem['key'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </li>

   
    <?php endforeach;

// Verifica se $buscaone é verdadeiro
elseif ($buscaone):
    foreach ($vetKey as $key => $vetor): ?>
        <li>
            <a data-mpi href="<?= $url . $vetor['url'] ?>" title="<?= $vetor['key'] ?>"><?= $vetor['key'] ?></a>
        </li>
<?php endforeach;
endif;
?>