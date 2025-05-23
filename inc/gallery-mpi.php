 <?php if ($hibrido):
    if ($urlBig !== true): ?>
     <div class="container pt-0">
       <ul class="mpi-gallery" itemprop="image" itemscope itemtype="https://schema.org/ImageGallery">
         <meta itemprop="name" content="Galeria de imagens de <?= $title ?>">
         <meta itemprop="description" content="Galeria de imagens relacionadas a <?= $title ?>">
         <?php $imagens = glob("imagens/categorias/" . $urlPagina . "*", GLOB_BRACE);
          foreach ($imagens as $key => $imagem) : ?>
           <li>
             <a href="<?= $url . $imagem ?>" data-fancybox="group1" class="lightbox" title="<?= $title ?>" data-caption="<?= $title ?>">
               <figure itemprop="associatedMedia" itemscope itemtype="https://schema.org/ImageObject">
                 <img src="<?= $url . $imagem ?>" alt="<?= $title ?>" title="<?= $title ?>" itemprop="url">
                 <meta itemprop="caption" content="Imagem de <?= $title ?>">
                 <meta itemprop="width" content="300">
                 <meta itemprop="height" content="300">
               </figure>
             </a>
           </li>
         <?php endforeach; ?>
       </ul>
     </div>
   <?php endif; ?>
 <?php elseif ($buscaone): ?>
   <div class="container pt-0">
     <ul class="mpi-gallery" itemprop="image" itemscope itemtype="https://schema.org/ImageGallery">
       <meta itemprop="name" content="Galeria de imagens de <?= $title ?>">
       <meta itemprop="description" content="Galeria de imagens relacionadas a <?= $title ?>">
       <?php $imagens = glob("imagens/categorias/" . $urlPagina . "-{,[0-9]}[0-9].webp", GLOB_BRACE);
        foreach ($imagens as $key => $imagem) : ?>
         <li>
           <a href="<?= $url . $imagem ?>" data-fancybox="group1" class="lightbox" title="<?= $title ?>" data-caption="<?= $title ?>">
             <figure itemprop="associatedMedia" itemscope itemtype="https://schema.org/ImageObject">
               <img src="<?= $url . $imagem ?>" alt="<?= $title ?>" title="<?= $title ?>" itemprop="url">
               <meta itemprop="caption" content="Imagem de <?= $title ?>">
               <meta itemprop="width" content="300">
               <meta itemprop="height" content="300">
             </figure>
           </a>
         </li>
       <?php endforeach; ?>
     </ul>
   </div>
 <?php endif; ?>