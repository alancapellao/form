<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Usuários</title>
</head>

<body>

    <div class="box">
        <button class="add btn btn-primary" onclick="window.location.href = '/usuarios/salvar'">Adicionar Registro</button>
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button class="btn btn-primary" onclick="searchData()">OK</button>
    </div>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome Completo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <?php $date = $user['nascimento'] ? date("d/m/Y", strtotime($user['nascimento'])) : ''; ?>

                    <tr>
                        <th> <?= $user['id'] ?> </th>
                        <td> <?= htmlspecialchars($user['nome'], ENT_QUOTES) ?> </td>
                        <td> <?= htmlspecialchars($user['email'], ENT_QUOTES) ?> </td>
                        <td> <?= htmlspecialchars($user['telefone'], ENT_QUOTES) ?> </td>
                        <td> <?= $date ?> </td>
                        <td> <?= htmlspecialchars($user['genero'], ENT_QUOTES) ?> </td>
                        <td> <?= htmlspecialchars($user['cidade'], ENT_QUOTES) ?> </td>
                        <td> <?= htmlspecialchars($user['estado'], ENT_QUOTES) ?> </td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="/usuarios/editar/<?= $user['id'] ?>" title="Editar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 15 22">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                            <a class="btn btn-sm btn-danger" onclick="deletar('<?= $user['id'] ?>')" title="Deletar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 15 22">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>