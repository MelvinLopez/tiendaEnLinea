
<br>
<br>
<br>
<br>
<br>
<br>
<br>

  <div class="product-area pb-80">
                <div class="container">
                    <div class="section-title text-center mb-20">
                        <h2>Producto</h2>
                    </div>
                    <div class="product-tab-list text-center mb-60 nav product-menu-mrg" >

              
               
 


    <div class="tab-content">
  
               <div class="row">
               <?php foreach ($productos as $value) { ?>
       
                   <div class="col-md-6 col-lg-4 col-xl-3">
                       <div class="product-wrapper mb-45">
                           <div class="product-img">
                               <a href="#">
                                   <img src="<?= base_url($value->img ) ?>" width="200" height="200">
                               </a>
                               <span>!FalseShop</span>
                               <div class="product-action">
                                   <div class="product-action-style">
              
                                   <button type="button" class="action-plus" data-toggle="modal" data-target="#exampleModalCenter<?= $value->id ?>">
                                 

                                 <i class="ti-plus"></i>


                                 </button>
                                      
                                       <form action='<?= base_url("carrito/agregar") ?>' method="post">
                <input type="hidden" name="id" value="<?= $value->id ?>" />
                <input type="hidden" name="cantidad" value="1" min="1"/>
                <button type="submit" class="action-cart"> <i class="ti-shopping-cart"></i> </button>
                </form> 
                                   </div>
                               </div>
                           </div>
                           <div class="product-content text-center">
                               <h4><a href="product-details.html"><?= $value->nombre  ?></a></h4>
                               <div class="product-rating">
                                   <i class="ion-ios-star"></i>
                                   <i class="ion-ios-star"></i>
                                   <i class="ion-ios-star"></i>
                                   <i class="ion-ios-star"></i>
                                   <i class="ion-ios-star-outline"></i>
                               </div>
                               <div class="product-price">
                                   <?php $aleatorio = '0.' . rand(0, 99); ?>
                                   <span class="old">$<?= $value->precio + $aleatorio?></span>
                                   <span>$<?= $value->precio ?></span>
                               </div>
                           </div>
                       </div>
                    
                   </div>  
                
                   <?php  } ?> 
               </div>
           
           </div>
        
       </div>




                                
    </div>
    
    </div>
    


<?php foreach ($productos as $value) { ?>
<div class="modal fade" id="exampleModalCenter<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"> <center> TIENDA ONLINE </center></h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
     


  
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?= base_url($value->img ) ?>" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $value->nombre ?></h5>
        <p class="card-text"><?= $value->descripcion ?></p>
       
        <form method="post" action='<?= base_url("carrito/agregar") ?>'>
            <input type="hidden" name="id" value="<?= $value->id ?>" />
            <div class="row">
            <div class="col">
            <p class="text-decoration-none" style="color: #690f11; font-family: 'Roboto', sans-serif;">$<?= $value->precio ?></p>
            <input class="form-control" type="number" name="cantidad" value="1" min="1" max="<?= $value->cantidad ?>"/>
            </div>
            <div class="col">
            <button type="submit" class="btn btn-success">Agregar&nbsp;<i class="fas fa-cart-plus"></i></button>
            </div>
            </div>
            </form>
      </div>
    </div>
  </div>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>


