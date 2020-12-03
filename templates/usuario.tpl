{include file="header.tpl"}
<div class="container">
    <form action="verify" method="POST" class="col-md-4 offset-md-4 mt-4">
        <h1>{$titulo}</h1>

        <div class="form-group">
            <label>Usuario (email)</label>
            <input type="email" name="username" class="form-control" placeholder="Ingrese email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" id=password>
            
            <a href="registrarse">no tienes cuenta? registrate</a>

        </div>

        {if $error}
        <div class="alert alert-danger" role="alert">
            {$error}

        </div>
        {/if}

        <button type="submit" class="btn btn-primary">Ingresar</button>

    </form>
</div>
 
            {include file="footer.tpl"}

