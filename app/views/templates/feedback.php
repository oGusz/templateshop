<div class="container">


    <div class="feedback-container  text-center">
        <?php if ($resultado): ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">✅ Adicionado com sucesso!</h4>
               
                <a href="index.php" class="btn btn-success">Voltar para o início</a>
            </div>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">❌ Erro ao adicionar!</h4>
              
                <a href="index.php" class="btn btn-danger">Voltar para o início</a>
            </div>
        <?php endif; ?>
    </div>


</div>