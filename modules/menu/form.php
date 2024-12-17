<?php
mustlogin();//login hone k bd hr page pr call kiya h
$obj=DB('menu');
if($uid){
    $info=$obj->find($uid);
    
}
if(isset($_POST['item'])){
    $info=[
        'item'=>$_POST['item'],
        'description'=>$_POST['description'],
        'category'=>($_POST['category'])?implode(',',$_POST['category']):"",//user category ko select na kre tb
        'status'=>$_POST['status']
    ];//project ko live k liye iss array ka use kiya h user hack nhi kr ske id ko
    
    if($obj->save($info,$uid)){
        Session::set('gt',"Data".($uid?"Updated":"Saved")."Successfully");
        redirect("menu");//menu k index pr bhej dega
    }else{
        echo "Something Went Wrong!";
    }
}
?>
<div class="alert alert-primary h3 text-center">
    Item <?=$uid?"Edit":'Add'?> Form
</div>    
<form method="post">
    <div class="mb-3">
        <lable for="item">Item Name</lable>
        <input type="text" class="form-control" placeholder="Enter Item Name" required 
        name="item" id="item" value="<?=$info['item']??''?>">
    </div>
    <div class="mb-3">
        <lable for="description">Description</lable>
        <textarea class="form-control" rows="10" placeholder="Enter Item Description" name="description" 
        id="description"><?=$info['description']?? ''?></textarea>
    </div>
    <div class="mb-3">
        <lable >Select Category <small>(Hold cntrol button for multiple selection)</small></lable>
        <?php $cats=explode(',',$info['category']??''); ?>
        <select name="category[]" class="form-select" multiple> <!-- [] multiple choise k liye category m-->
            <option value="Starter" <?=(in_array('Starter',$cats))? 'selected': '';?>>Starter</option>
            <option value="Main Course"<?=(in_array('Main Course',$cats))? 'selected': '';?>>Main Course</option>
            <option value="Fast Food"<?=(in_array('Fast Food',$cats))? 'selected': '';?>>Fast Food</option>
            <option value="Dessert"<?=(in_array('Dessert',$cats))? 'selected': '';?>>Dessert</option>
            <option value="Sweets"<?=(in_array('Sweets',$cats))? 'selected': '';?>>Sweets</option>
        </select>
    </div>
    <div class="mb-3">
        <lable >Status</lable>
        <select name="status" class="form-select">
            <option value="yes" >Yes</option> <!-- By default yes hota hai so -->
            <option value="no" <?=($info['status']??""=='no')?'selected':'';?> >NO</option>
        </select>
    </div>
    <div class="mb-3 text-center">
        <button class="btn btn-success"><?=$uid?"Update":'Save'?></button>
    </div> 
</form>