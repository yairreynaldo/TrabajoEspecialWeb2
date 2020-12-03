{include 'templates/header.tpl'}


<div class="row"   id="producto" data-producto={$productos->id_producto}>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="{$productos->imagen}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <span id=  producto></span>
                    <p href="#">{$productos->nombre} </p>
                </h4>
                <h5><span>$</span>{$productos->precio}</h5>
                <p class="card-text"{$productos->descripcion}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
 </div>
 </div>                     
  </div>
                                      
</div>
{include file="templates/Vue/Comentarios.tpl"}
            
            <form id="form-comentario" action="insertar" method="post">
                {if  ((isset($isAdmin))&&($isAdmin))||(isset($userName))}

                      <input type="hidden" name=id_producto value="{$productos->id_producto}" >
                       
                <input type="text" name="usuario" placeholder="usuario">
                <input type="text" name="comentario" placeholder="comentario">
                <select name="puntaje">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>

                  </select>


                <input type="submit" value="agregar">
            </form>
            {/if}

        <script src="js/comentarios.js"></script>
             {include file="templates/footer.tpl"}
