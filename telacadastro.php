<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cadastro de usuário</title>
  </head>
  <body>
                <form action="cadastro.php" method="GET">
                    <fieldset>
                        <legend>Faça o seu cadastro</legend>
                        <label>
                            Nome de usuário:<strong>(Obrigatório)</strong>
                            <input type="text" name="nome"  id="nome" name="text" placeholder="Seu usuário" autofocus=""/>
                        </label>

                        <label>
                            Senha:<strong>(Obrigatório)</strong>
                            <input type="password" name="senha" id="senha"  type="password" placeholder="Sua senha"/>
                        </label>
                        <label>
                            E-mail:<strong>(Obrigatório)</strong>
                            <input type="text" name="email" id="email"  type="password" placeholder="Seu e-mail"/>
                        </label>
                        <label>
                            De que forma pode ajudar:
                            <input type="textarea" name="formaajuda" type="text" placeholder="Seja autruísta"/>
                        </label>
                        <label>
                            De que forma quer ser ajudado:
                            <input type="textarea" name="formaajudado"  type="text" placeholder="Compartilhe"/>
                        </label>
                        <br> </br>
                        <button type="submit" value="Cadastrar">Cadastrar</button>
                      </fieldset>
    </form>

    <script type="text/javascript">
    function validar(){
        if(nome.value == ""){
            alert("O nome é obrigatório!");
            nome.focus();
        }
        if(senha.value == ""){
            alert("A senha é obrigatória!");
            senha.focus();
        }
        if(email.value == ""){
            alert("O e-mail e obrigatório");
            email.focus();
        }
    }

  </script>
  </body>
</html>
