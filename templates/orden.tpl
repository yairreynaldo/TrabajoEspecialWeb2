{include file="header.tpl"}


        <div class="row">
{foreach from=$orden item=p}
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="{$p->imagen}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">{$p->nombre} </a> 
                </h4>
                <h5><span>$</span>{$p->precio}</h5>
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
             {include file="footer.tpl"}

   </div>