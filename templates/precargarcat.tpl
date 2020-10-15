{include file="templates/header.tpl"}

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

         <h3>Editar Categoria</h3>
        <form action="editarcat/{$cat->id_categoria}"  method="POST">  
                <input class="form-control" type="text"  name=nombre placeholder="" value={$cat->nombre}>
                <input class="form-control" type="text"  name=descripcion placeholder="Descripcion" value={$cat->descripcion}>
                 <input type="submit"  value=editacat;  class="btn btn-primary mr-2"editar>

        </form>

            {include file="templates/footer.tpl"}