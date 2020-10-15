{include 'templates/header.tpl'}


<div class="row"   id="producto" data-producto={$productos->id_producto}>
          <div class="col-lg-4 col-md-6 mb-4">
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
             {include file="templates/footer.tpl"}
