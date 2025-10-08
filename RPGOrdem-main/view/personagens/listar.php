<?php 

//Carregar a lista de personagens
//Chamar personagemController -> personagemDAO 

//$personagens = 



include __DIR__ . "/../include/header.php"; 

?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Personagens</h2>
  <a class="btn btn-primary" href="index.php?rota=personagem&acao=inserir">Novo Personagem</a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Idade</th>
      <th>NEX</th>
      <th>Classe</th>
      <th>Origem</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($personagens as $p): ?>
      <tr>
        <td><?php echo htmlspecialchars($p['nome']); //$p->getNome() ?></td>
        <td><?php echo htmlspecialchars($p['idade']); ?></td>
        <td><?php echo htmlspecialchars($p['nex']); ?></td>
        <td><?php echo htmlspecialchars($p['classe']); ?></td>
        <td><?php echo htmlspecialchars($p['origem']); ?></td>
        <td>
          <a class="btn btn-sm btn-outline-secondary" href="index.php?rota=personagem&acao=alterar&id=<?php echo $p['id']; ?>">Editar</a>
          <a class="btn btn-sm btn-outline-danger" href="index.php?rota=personagem&acao=excluir&id=<?php echo $p['id']; ?>">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php include __DIR__ . "/../include/footer.php"; ?>
