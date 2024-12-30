<?php
$ddata=DB('menu')->filter(['status'=>'yes']);
$finaldata=[];//menu m all item dikhane k liye
$size=0;
$categories=[];
foreach($ddata as $info){
    $cats=explode(',',$info['category']);
    if($categories){
        foreach($cats as $v){
            if(!in_array($v,$categories)){
                $categories[]=$v;
            }
        }
    }else{
        $categories=$cats;
    }
    
    //$finaldata[$info['category']][]=$info;
}
foreach($ddata as $info){ //categories main categories ko alg alg krna 
    $cats=explode(',',$info['category']);
    foreach($cats as $val){
        if(in_array($val,$categories)){
            $finaldata[$val][]=$info;
        }
    }
}
?>
<div class="container my-5">
    <h1 class="text-center mb-4 text-primary">Menu</h1>
    <?php foreach($finaldata as $category=>$data){ ?>
        <h3 class="mb-4 text-warning"><?=$category;?></h3>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <!-- Product 1 -->
         <?php
         $index=0;
         foreach($data as $info){ ?>
        <div class="col-md-4 mb-4">
            <div class="card product-card">
                <div class="product-image">
                    <img src="<?=ROOT."public/images/".($info['picture']);?>" alt="Product 1" 
                    class="product=image img-fluid">
                </div>
                <div class="product-info">
                    <h5 class="product-title"><?=$info['item'];?></h5>
                    <p class="product-price">₹100/-</p>
                    <p class="product-Price"><?=$info['description'];?></p>
                    
                </div>
            </div>
        </div>
            <?php } ?>
     
    </div>
    <?php }  ?>
</div>

   <!-- Bootstrap JS and Popper.js CDN -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
    integrity="sha384-oBqDVmMz4fnFO9gyb7D5b1M4c4RYp8UlYgErg4ECeQk4OhGoVYxngVzyx+1l5l0H" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" 
    integrity="sha384-pzjw8f+ua7Kw1TIq0v8Fq+wbV0ZxUbtBh4GxaVYaIS9z9/xm0Y0y8VlgQ/xor4p6" crossorigin="anonymous"></script>


