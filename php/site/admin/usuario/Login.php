<?php
    include "../db.class.php";

    include_once "../header.php";



        $db = new db('usuario');
        $data = null;
        $errors = [];
        $success = '';

        if (!empty($_POST)) {

            $data = (object) $_POST;

            //função trim remove espaços em branco do inicio e fim da string
            if(empty(trim($_POST['nome']))){
                $errors[] = "<li>O nome é obrigatório</li>";
            }
            if(empty(trim($_POST['telefone']))){
                $errors[] = "<li>O telefone é obrigatório</li>";
            }
            if(empty(trim($_POST['email']))){
                $errors[] = "<li>O email é obrigatório</li>";
            }
            if(empty(trim($_POST['cpf']))){
                $errors[] = "<li>O cpf é obrigatório</li>";
            }
            if(empty(trim($_POST['login']))){
                $errors[] = "<li>O login é obrigatório</li>";
            }
            if(empty(trim($_POST['senha']))){
                $errors[] = "<li>A senha é obrigatório</li>";
            }

            if (empty($errors)) {
                try{
                    if(empty($_POST['senha'] === $_POST['c_senha'])){
                        
                        $_POST['senha'] = password_hash($_POST['senha'], PASSWORD_BCRYPT);
                        unset($_POST['c_senha']);
                        
                        $db->store($_POST);
                        $success = "Registro criado com sucesso!";

                    echo "<script>
                            setTimeout(
                                ()=> window.location.href = 'UsuarioList.php', 1500
                            )
                        </script>";
                    } else {
                        $errors[] = "<li>As senhas não coincidem. Tente novamente</li>";
                    }
                } catch (Exception $e) {
                    $errors[] = $e->getMessage();
                }
            }
        }   

        if(!empty($_GET['id'])){
            $data = $db->find($_GET['id']);
        }

        /*function getValue($field, $data = null){
            if($data && isset($data->$field)){
                return  
            } 
        } */

        // serve para depurar o codigo, ver o que tem dentro da variavel:
        //var_dump($data);
        
        /*Interrompe a execução do codigo na linha onde foi colocada:
        exit;
        */
    ?>



                <?php if(!empty($errors)) { ?>
                    <div class="alert alert-danger">
                        <strong>Erro ao salvar</strong>
                        <ul class="mb-0">
                            <?php foreach($errors as $error) {?>
                                <?= $error ?>
                            <?php } ?>
                        </ul>
                    </div> 
                <?php } ?>

                <?php if(!empty($success)) { ?>
                    <div class="alert alert-success">
                        <strong>
                            <?= $success ?>
                        </strong>
                    </div> 
                <?php } ?>

                <h3>Formulário Usuário</h3>
                
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $data->id ?? ''?>">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Nome</label>
                            <input type="text" name="nome" value="<?= $data->nome ?? '' ?>" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Telefone</label>
                            <input type="text" name="telefone" value="<?= $data->telefone ?? '' ?>" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" value="<?= $data->email ?? '' ?>"  class="form-control">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="" class="form-label">CPF</label>
                            <input type="text" name="cpf" value="<?= $data->cpf ?? '' ?>"  class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Login</label>
                            <input type="text" name="login" value="<?= $data->login ?? '' ?>"  class="form-control">
                        </div>
                        
                        <div class="col-md-4">
                            <label for="" class="form-label">Senha</label>
                            <input type="password" name="senha" value="<?= $data->senha ?? '' ?>"  class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label">Confirmar Senha</label>
                            <input type="password" name="c_senha" class="form-control">
                        </div>
                    </div>

 
                    <div class="row">
                        <div class="col mt-4">
                            <button type="submit" class="btn btn-primary" >
                                Salvar
                            </button>
                            <a href="./login.php" class="btn btn-secondary">Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
    </body>

</html>
            <?php
            include_once "../footer.php";
            ?>
