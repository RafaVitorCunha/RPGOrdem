<?php include __DIR__ . "/../include/header.php"; ?>
<h2>Excluir Personagem</h2>
<p>Confirma exclusão de <strong><?php echo htmlspecialchars($personagem['nome']); ?></strong>?</p>
<form method="post" action="">
  <input type="hidden" name="id" value="<?php echo htmlspecialchars($personagem['id']); ?>">
  <button class="btn btn-danger" type="submit">Excluir</button>
  <a class="btn btn-secondary" href="index.php?rota=personagem&acao=listar">Cancelar</a>
</form>
<?php include __DIR__ . "/../include/footer.php"; ?>
