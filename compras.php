<?php
  include_once 'layout/header.php';
  include_once 'layout/navegacion.php';
?>
        <!-- Tabla -->
        <h1 class="text-center mt-4">Compras</h1>
        <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-striped table-bordered zero-configuration">
                                  <thead>
                                      <tr>
                                          <th>Numero de Orden</th>
                                          <th>Fecha</th>
                                          <th>Total</th>
                                          <th>Detalle</th>                                         
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>123445</td>
                                          <td>22/04/2021</td>
                                          <td>$ 15</td>
                                          <td>Ver factura</td>
                                         
                                      </tr>
                                      <tr>
                                          <td>343434</td>
                                          <td>22/04/2021</td>
                                          <td>$ 40</td>
                                          <td>Ver factura</td>
                                         
                                      </tr>
                                     
                                      <tr>
                                          <td>6543343</td>
                                          <td>22/04/2021</td>
                                          <td>$ 10</td>
                                          <td>Ver factura</td>
                                          
                                      </tr>
                                      <tr>
                                          <td>523242</td>
                                          <td>22/04/2021</td>
                                          <td>$15</td>
                                          <td>Ver factura</td>
                                          
                                      </tr>
                                      <tr>
                                          <td>75445</td>
                                          <td>22/04/2021</td>
                                          <td>$ 25</td>
                                          <td>Ver factura</td>
                                          
                                      </tr>
                                      <tr>
                                          <td>6546465</td>
                                          <td>22/04/2021</td>
                                          <td>$ 10</td>
                                          <td>Ver factura</td>
                                          
                                      </tr>                            
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                        <th>Numero de Orden</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Detalle</th>
                                      </tr>
                                  </tfoot>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
<?php
    include_once 'layout/footer.php';    
?>