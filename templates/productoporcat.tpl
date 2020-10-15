{include 'templates/header.tpl'}


       <div class="container-fluid">
        <div class="row">
{foreach from=$Categoria item=p}
          <div class="col-lg-4 col-md-6 mb-4">
              <div class="card-body">
                <h4 class="card-title">
                  <a href="producto/{$p->id_producto}">{$p->nombre}</a> 
                </h4>
                <h5><span>$</span>{$p->precio}</h5>
               <h5>{$p->categoria}</h5>
                <p class="card-text"{$p->descripcion}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
            {/foreach}
          </div>