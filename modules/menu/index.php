<?php
mustlogin();
$dbobj=DB('menu')
;$data= $dbobj->all();
if(isset($_POST['del'])){
    $delid=implode(",",$_POST['del']);
    foreach($_POST['del'] as $did){
        if($pn=($dbobj->find($did,'picture')['picture']))
        unlink("public/images/$pn");
    }
    $dbobj->delete($delid);
    Session::set('gt',"Deleted Successfully!");
    redirect('menu');
    exit;
}
?>
<div class="mt-3">
    <a href="<?=ROOT;?>menu/form" class="btn btn-primary">Add Item</a>
</div>
<?php if($msg=Session::get('gt')){
    ?>
    <div class="alert alert-success text-center h3"><?=$msg;?></div>
    <?php
    Session::delete('gt');
}
?>
<form method="post">
<table class="table table-stripted" id="list">
    <thead class="table-dark">
        <tr>
            <th>S.No</th>
            <th> <input type="checkbox" id="all" onclick="checkdel(this)" > <label for="all">All</label></th>
            <th>Item Name</th>
            <th>Picture</th>
            <th>Categoris</th>
            <th>Status</th>
            <th>Item Inserted</th>
            <th>Item Updated</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $index=0;
        foreach($data as $info){ ?>
        <tr>
            <td><?=++$index;?></td>
            <td> <input type="checkbox" onclick="displaybtn()" name="del[] " 
            class="delc" value="<?=$info['id'];?>"></td>
            <td>
                <a href="<?=ROOT;?>menu/form/<?=$info['id'];?>" 
                title="Click for edit">  <!-- Item ko edit krne k liye  <td> m-->
            <?=$info['item'];?>
                </a>
            </td>
            <td>
                <?php if($info['picture']){ ?>
            <img class="rounded-circle" src="<?=ROOT.'public/images/'.$info['picture'];?>" height="150px"> 
            <?php }else{
                echo "<span class='text-muted'>N/a";
            }
            ?>
            </td>
            <td><?=$info['category'];?></td>
            <td><?=$info['status'];?></td>
            <td><?=date('d-M-Y h:i:s A',strtotime($info['created_at']));?></td>
            <td><?=date('d-M-Y h:i:s A',strtotime($info['updated_at']));?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<div id="ditem" style="display:none";>
    <button class="btn btn-danger" onclick="return confirm('Do you really want to delete these items?')">Delete Selected Item(s)</button>
</div>
</form>
