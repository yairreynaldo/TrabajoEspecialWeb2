{include file="header.tpl"}



              {if isset($userName)}
            
            <form action="AgregarCategoria" method="POST" enctype="multipart/form-data>
    <div class="container">
        <input class="form-control" type="text"  name="nombre" placeholder="nombre">
                <input class="form-control" type="file"   name="imagen" placeholder="foto">
        <input class="form-control" type="text"   name="descripcion" placeholder="Descripcion">
        <input type="submit"  value=Agregar  class="btn btn-primary mr-2">
  </div>
</form>

 {/if}

                {include file="footer.tpl"}
