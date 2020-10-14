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
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>

        {if $error}
        <div class="alert alert-danger" role="alert">
            {$error}
        </div>
        {/if}

        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>

</div>
          <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Supermecado mrh</p>
    </div>
    <!-- /.container -->
  </footer>