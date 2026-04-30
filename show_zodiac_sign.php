<?php include('layouts/header.php'); ?>

<?php
$data_nascimento = $_POST['data_nascimento'];
$signos = simplexml_load_file("signos.xml");

$data = DateTime::createFromFormat('Y-m-d', $data_nascimento);
$dia_mes = $data->format('d/m');

$hoje = new DateTime();
$idade = $hoje->diff($data)->y;

function converterData($data) {
    return DateTime::createFromFormat('d/m', $data);
}

$signo_encontrado = null;

foreach ($signos->signo as $signo) {

    $inicio = converterData((string)$signo->dataInicio);
    $fim = converterData((string)$signo->dataFim);
    $nascimento = converterData($dia_mes);

    // ajuste para signos que cruzam o ano (ex: Capricórnio)
    if ($inicio > $fim) {
        if ($nascimento >= $inicio || $nascimento <= $fim) {
            $signo_encontrado = $signo;
            break;
        }
    } else {
        if ($nascimento >= $inicio && $nascimento <= $fim) {
            $signo_encontrado = $signo;
            break;
        }
    }
}
?>

<div class="card p-4 shadow text-center">

<?php if ($signo_encontrado): ?>

    <h2>Seu signo é:</h2>
    <h1 class="text-primary"><?php echo $signo_encontrado->signoNome; ?></h1>

    <p><strong>Idade:</strong> <?php echo $idade; ?> anos</p>

    <img src="assets/imgs/<?php echo $signo_encontrado->imagem; ?>" 
     class="signo-img">

    <p class="mt-3"><?php echo $signo_encontrado->descricao; ?></p>

<?php else: ?>

    <h3>Não foi possível identificar o signo.</h3>

<?php endif; ?>

    <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>

    

</div>

</div>
</body>
</html>