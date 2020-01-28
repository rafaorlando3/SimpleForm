 <?php
include_once 'class/SimpleForm.class.php';

$objSimpleForm = new SimpleForm();
$pesquisa = "";

if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
}

$lista = $objSimpleForm->listar("WHERE ((nome LIKE '%".$pesquisa."%') OR (email LIKE '%".$pesquisa."%') OR (data LIKE '%".$pesquisa."%') OR (telefone LIKE '%".$pesquisa."%')) Order BY data DESC");
?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
       <th scope="col">Anexo</th>
      <th scope="col">Data</th>
      <th scope="col">IP</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if ($lista != null) {
        foreach ($lista as $item) {
      ?>
          <tr>
            <td><?=$item->nome?></td>
            <td><?=base64_decode($item->email)?></td>
            <td><?=base64_decode($item->telefone)?></td>
            <td><a href="<?=base64_decode($item->anexo)?>" target="_blank">Anexo</a></td>
            <td>
              <p class="text-dark">
                <u>Mensagem enviada em <?= date('d-m-Y', strtotime($item->data))." às ".date('H:i:s', strtotime($item->data))?> 
                </u>
              </p>
            </td>
            <td><?=$item->ip?></td>
          </tr>

    <?php
        }
    ?>

  </tbody>
</table>
    <?php
    } else {
        echo "<div class='alert alert-info'>Nenhum registro encontrado.</div>";
    } 
?>