<?php include('layouts/header.php'); ?>

<h1 class="text-center mb-4">Descubra seu Signo</h1>

<img src="assets/imgs/zodiaco.png" class="inicial-img">

<form method="POST" action="show_zodiac_sign.php" class="card p-4 shadow">

    <div class="mb-3">
        <label class="form-label">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Descobrir</button>

</form>

</div>
</body>
</html>