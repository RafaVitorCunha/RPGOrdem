<?php include __DIR__ . "/../include/header.php"; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Classes</h2>
  <a class="btn btn-primary" href="index.php?rota=classe&acao=inserir">Nova Classe</a>
</div>
<table class="table">
  <thead><tr><th>Nome</th><th>Ações</th></tr></thead>
  <tbody>
    <?php foreach($classes as $c): ?>
      <tr>
        <td><?php echo htmlspecialchars($c['nome']); ?></td>
        <td>
          <a class="btn btn-sm btn-outline-secondary" href="index.php?rota=classe&acao=alterar&id=<?php echo $c['id']; ?>">Editar</a>
          <a class="btn btn-sm btn-outline-danger" href="index.php?rota=classe&acao=excluir&id=<?php echo $c['id']; ?>">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php include __DIR__ . "/../include/footer.php"; ?>
