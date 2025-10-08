<?php include __DIR__ . "/../include/header.php"; ?>
<h2>Novo Personagem</h2>
<?php if(isset($erro)): ?><div class="alert alert-danger"><?php echo htmlspecialchars($erro); ?></div><?php endif; ?>
<form method="post" action="">
  <div class="mb-3">
    <label class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" value="<?php echo htmlspecialchars($_POST['nome'] ?? ''); ?>">
  </div>
  <div class="row">
    <div class="col-md-4 mb-3">
      <label class="form-label">Idade</label>
      <input type="number" name="idade" class="form-control" value="<?php echo htmlspecialchars($_POST['idade'] ?? ''); ?>">
    </div>
    <div class="col-md-4 mb-3">
      <label class="form-label">NEX</label>
      <input type="number" name="nex" class="form-control" value="<?php echo htmlspecialchars($_POST['nex'] ?? ''); ?>">
    </div>
    <div class="col-md-4 mb-3">
      <label class="form-label">Classe</label>
      <select name="classe_id" class="form-select">
        <option value="">Selecione</option>
        <?php foreach($classes as $c): ?>
          <option value="<?php echo $c['id']; ?>" <?php if(isset($_POST['classe_id']) && $_POST['classe_id']==$c['id']) echo 'selected'; ?>><?php echo htmlspecialchars($c['nome']); ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Origem</label>
    <select name="origem_id" class="form-select">
      <option value="">Selecione</option>
      <?php foreach($origens as $o): ?>
        <option value="<?php echo $o['id']; ?>" <?php if(isset($_POST['origem_id']) && $_POST['origem_id']==$o['id']) echo 'selected'; ?>><?php echo htmlspecialchars($o['nome']); ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">História</label>
    <textarea name="historia" class="form-control" rows="5"><?php echo htmlspecialchars($_POST['historia'] ?? ''); ?></textarea>
  </div>
  <button class="btn btn-success" type="submit">Salvar</button>
  <a class="btn btn-secondary" href="index.php?rota=personagem&acao=listar">Cancelar</a>
</form>
<?php include __DIR__ . "/../include/footer.php"; ?>
