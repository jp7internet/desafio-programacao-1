<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://localhost/gerenciador-de-contas/application/views/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">
        <link href="http://localhost/gerenciador-de-contas/application/views/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Criar Compra</title>
    </head>
    
    <body>
        <div class="container-fluid">
            <header class="row">
                <nav class="navbar navbar-inverse" role="navigation">
                    
                </nav>
            </header>
        
            <div class="row">

                <aside class="col-md-6" role="complementary">
                    <form role="form" action="Crud/create" method="post">
                        <legend>Cadastro</legend>
                        <div class="form-group">
                            <label for=name_purchase">Purchaser Name:</label>
                            <input type="text" class="form-control" id="name_purchase" name="name_purchase">
                        </div>
                        
                        <div class="form-group">
                            <label for=description">Item Description:</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>

                        <div class="form-group">
                            <label for=price">Item Price:</label>
                            <input type="number" class="form-control" id="price" name="price">
                        </div>
                        
                        <div class="form-group">
                            <label for=count">Item Count:</label>
                            <input type="number" class="form-control" id="count_item" name="count_item">
                        </div>

                        <div class="form-group">
                            <label for=name_merchant">Name Merchant</label>
                            <input type="text" class="form-control" id="name_merchant" name="name_merchant">
                        </div>
                        
                        <div class="form-group">
                            <label for=address">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>

                        <button type="submit" class="btn btn-default">Enviar</button>
                    </form>
                </aside>
            </div>
    
        </div>
        
    </body>
</html>
