<?php if ($depoimentos):
    $vetDepoimentos = array(
        array(
            'depoimento' => 'Lorem ipsum sit dolor amet....!',
            'nomeCliente' => 'Lorem',
            'inicialCliente' => 'L',
        ),
        array(
            'depoimento' => 'Lorem ipsum sit dolor amet....!',
            'nomeCliente' => 'Lorem',
            'inicialCliente' => 'L',
        ),
        array(
            'depoimento' => 'Lorem ipsum sit dolor amet....!',
            'nomeCliente' => 'Lorem',
            'inicialCliente' => 'L',
        ),
    );
?>
    <section class="prova-social">
        <div class="container">
            <div class="wrapper">
                <h2 class="prova-social__title">Depoimentos</h2>
                <div class="slick-prova-social">
                    <?php foreach ($vetDepoimentos as $item): ?>
                        <div class="mr-16">
                            <div class="card card--prova-social">
                                <img width="72" height="24" class="card__image" src="<?= $url ?>imagens/icones/google.png" alt="Google" title="Google">
                                <div class="card__body" style="--inicialCliente: '<?= $item['inicialCliente'] ?>'">
                                    <p class="card__stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i>/5</i>
                                    </p>
                                    <blockquote class="card__text">
                                        <i><?= $item['depoimento'] ?></i>
                                    </blockquote>
                                    <p class="card__name">
                                        - <b><?= $item['nomeCliente'] ?></b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('.slick-prova-social').slick({
                autoplaySpeed: 1200,
                pauseOnFocus: true,
                autoplay: true,
                infinite: true,
                cssEase: 'linear',
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: false,
                dots: true,
                adaptiveHeight: true,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 577,
                        settings: {
                            slidesToShow: 1,
                            centerMode: true,
                        }
                    }
                ]
            });
        });
    </script>
<?php endif; ?>