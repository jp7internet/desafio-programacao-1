<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Crud</title>
        <link href="http://localhost/gerenciador-de-contas/application/views/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">
        <link href="http://localhost/gerenciador-de-contas/application/views/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <aside class="col-md-10" role="complementary">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="text-align: center;">Lista</h3>
                </div>
                <table class="table table-bordered table-striped" id="mytable">
                    <tbody>
                        <tr>
                            <th style="text-align: center">Purchaser Name</th>
                            <th style="text-align: center">Item Description</th>
                            <th style="text-align: center">Item Price</th>
                            <th style="text-align: center">Purchase Count</th>
                            <th style="text-align: center">Merchant Address</th>
                            <th style="text-align: center">Merchant Name</th>
                            <th style="text-align: center">Função</th>
                        </tr>
                        <?php
                            $valor_pagar = 0;
                            if(isset($list)){
                                foreach ($list as $value){
                                    ?>  
                                <tr>
                                    <th> <?= $value['name_purchase']; ?> </th>
                                    <th> <?= $value['description'];  ?> </th>
                                    <th> <?= $value['price']; ?> </th>
                                    <th> <?= $value['count_item']; ?> </th>
                                    <th> <?= $value['name_merchant']; ?> </th>
                                    <th> <?= $value['address']; ?> </th>
                                    <th> 
                                        <form method="post" action="index.php/Crud/update">
                                            <button type="submit" name="id_cart" value= <?= $value['id_cart'] ?> class="btn btn-primary">Update</button>
                                        </form>
                                        
                                        <form method="post" action="index.php/Crud/delete">
                                            <button type="submit" name="id_cart" value= <?= $value['id_cart'] ?> class="btn btn-primary">Delete</button>
                                        </form>
                                    </th>
                                </tr>
                        <?php
                            $valor = $value['price'] * $value['count_item'];
                            $valor_pagar += $valor;
                            }
                        ?>
                        <?php 
                            }else{
                                
                            }
                        ?>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Valor Total: R$ <?= $valor_pagar ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                    </tbody>
                </table>
            </div>
            
            <div>
                <form method="post" action="index.php/Dashboard/upload" enctype="multipart/form-data">
                    <input type='file' name='filetext' value='Upload' id="fileToUpload"/>
                    <input type="submit" name="Enviar" value="Enviar">
                </form>
                
                <form method="post" action="index.php/Crud">
                    <input type="submit" name="Enviar" value="Create">
                </form>
            </div>
        </aside>
    </body>
</html>