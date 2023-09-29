<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/form.css">
    <title>Editar Registro</title>
</head>

<body>

    <div class="box">
        <form action="#" id="formEdit" onsubmit="return false;">
            <fieldset>
                <legend><b>Editar Registro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="id" id="id" class="inputId" value="<?= $user['id'] ?>" disabled>
                    <label for="nome" class="labelId">Código</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?= htmlspecialchars($user['nome'], ENT_QUOTES) ?>" required>
                    <label for="nome" class="labelInput">Nome</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" value="<?= htmlspecialchars($user['email'], ENT_QUOTES) ?>" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?= htmlspecialchars($user['telefone'], ENT_QUOTES) ?>" .l required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="Feminino" <?= ($user['genero'] == 'Feminino') ? 'checked' : '' ?> required>
                <label for="feminino">Feminino</label>
                <br><br>
                <input type="radio" id="masculino" name="genero" value="Masculino" <?= ($user['genero'] == 'Masculino') ? 'checked' : '' ?> required>
                <label for="masculino">Masculino</label>
                <br><br>
                <input type="radio" id="outro" name="genero" value="Outro" <?= ($user['genero'] == 'Outro') ? 'checked' : '' ?> required>
                <label for="outro">Outro</label>
                <br><br>
                <div class="inputBox">
                    <label for="data">Data de Nascimento:</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" class="inputDate" value="<?= $user['nascimento'] ?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" value="<?= htmlspecialchars($user['cidade'], ENT_QUOTES) ?>" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" maxlength="2" value="<?= htmlspecialchars($user['estado'], ENT_QUOTES) ?>">
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <input type="submit" value="Atualizar" onclick="editar()">
                <input type="button" value="Cancelar" onclick="window.location.href = '/usuarios'">
            </fieldset>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>
    <script src="/js/form.js"></script>
</body>

</html>