{include 'templates/header.tpl'}

  <!-- Page Content -->
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Categorias
  </button>
  <div class="dropdown-menu">
      {foreach from=$cat item=p}
      <a class="dropdown-item" href="Categoria/{$p->id_categoria}">{$p->nombre}</a>              
      {if isset($userName)}
  - <a href='borrarCat/{$p->id_categoria}'>Borrar</a></td><td> 
  - <a href='precargarcat/{$p->id_categoria}'>editar</a></td><td> 
  
  {/if}
  
               {/foreach}
  
    </div>
  </div>
</div>

<!-- Split dropright button -->
<div class="btn-group dropright">
  <button type="button" class="btn btn-secondary">
    Ordenar Por
  </button>
  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropright</span>
  </button>
  <div class="dropdown-menu">
      <a class="dropdown-item" href="OrdenarPorPrecio">precio de menor a mayor</a>

  </div>
</div>
  
  <div class="container">
        <div class="row">
{foreach from=$lista_Productos item=p}
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="producto/{$p->id_producto}"><img class="card-img-top" src="{$p->imagen}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="producto/{$p->id_producto}">{$p->nombre} </a> 
                  {if isset($userName)}
- <a href='borrar/{$p->id_producto}'>Borrar</a></td><td>
<a href='precargar/{$p->id_producto}'>editar</a></td></tr>
{/if}
                </h4>
                <h5><span>$</span>{$p->precio}</h5>
               <h5>{$p->categoria}</h5>
                <p class="card-text"{$p->descripcion}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          {/foreach}

        </div>
</div>
</div>

{if isset($userName)}
<h3>agregue un  producto</h3>

<form action="agregar"  method="POST" enctype="multipart/form-data">  
<div class="container">
<select name=id_categoria>
{foreach from=$cat item=p}
  <option value="{$p->id_categoria}">{$p->nombre}</option> 
            {/foreach}
</select>
</div>
        <input class="form-control" type="text"  name="nombre" placeholder="nombre">
        <input class="form-control" type="number"  name="precio" placeholder="precio">
        <input class="form-control" type="text"   name="descripcion" placeholder="Descripcion">
        <input class="form-control" type="file"   name="imagen" placeholder="foto">
        <input type="submit"  value='agregar producto' class="btn btn-primary mr-2">

</form>
            <h3>agregue un categoria</h3>
            <form action="AgregarCategoria" method="POST" enctype="multipart/form-data>
    <div class="container">
        <input class="form-control" type="text"  name="nombre" placeholder="nombre">
        <input class="form-control" type="text"   name="descripcion" placeholder="Descripcion">
        <input type="submit"  value='Agregar  categoria' class="btn btn-primary mr-2">
  </div>
</form>

 {/if}

            {include file="footer.tpl"}

