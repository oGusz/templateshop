<?php
require_once "app/models/Categoria.php";
$categorias = Categoria::listarTodas();
include "app/views/layouts/head.php";
?>
<header class="header-mvc bg-primary-color p-16">
    <div class="wrapper">
        <nav class="navbar">
            <!-- Logo -->
            <a class="logo" href="<?= $urlBase ?>">
                <img src="<?= $urlBase ?>public/img/logo.png" alt="Template Shop" width="74" height="42">
            </a>

            
           
        </nav>
    </div>


  
</header>

<script>
    // Script para abrir e fechar o menu lateral (sidenav)
    document.getElementById('hamburger-btn').addEventListener('click', function() {
        const sidenav = document.getElementById('sidenav');
        sidenav.classList.toggle('active');
    });

    // Script para o comportamento do dropdown
    document.getElementById('categories-dropdown').addEventListener('click', function() {
        const dropdownMenu = document.getElementById('dropdown-categorias');
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });
</script>