<?php include __DIR__ . "/../include/header.php"; ?>
<h2>Nova Classe</h2>
<?php if(isset($erro)): ?><div class="alert alert-danger"><?php echo htmlspecialchars($erro); ?></div><?php endif; ?>
<form method="post" action="">
  <div class="mb-3"><label class="form-label">Nome</label><input type="text" name="nome" class="form-control" value="<?php echo htmlspecialchars($_POST['nome'] ?? ''); ?>"></div>
  <button class="btn btn-success" type="submit">Salvar</button>
  <a class="btn btn-secondary" href="index.php?rota=classe&acao=listar">Cancelar</a>
</form>
<?php include __DIR__ . "/../include/footer.php"; ?>
