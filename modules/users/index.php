<?php
 if(Session::get('logindtl')){// login hone k bd koi url m users open krega to vo menu page pr hi rhega
    redirect('menu');
    exit;
}
$error=null;
if(!isset($_POST['username'])){//3 attempt hone pr 3 equal value aane pr
    if(Session::get('attempt') && Session::get('attempt')==BNO){
    
        if(!isset($_COOKIE['isblock'])){
            Session::delete('attempt');
            Session::delete('blockerror');
        }
    }
     ?>
        <?php
    }
    
if(isset($_POST['username'])){
    if((Session::get('attempt')??0) < BNO){//3 time attempt hone pr
    extract($_POST);
    $username=addslashes($username);
    $password=md5($password);
    if(trim($username)) {
        $sql="select id,username,password from users where username='$username'";
        $data=DB('users')->custom($sql,0);
        if($data && is_array($data) && $data['password']==$password) {
            Session::set('logindtl',$data);
            redirect('menu');
        }else{
            Session::set('attempt',(Session::get('attempt')? (Session::get('attempt')+1):1));//block krne k liye turnury opretor
            $error="Enter valid username and Password";
        }
    }else{
         $error="Enter Username and Password Both!";
    }
}else{
    if(!isset($_COOKIE['isblock'])){ //block hone k bd timer dene k liye kitna bhi
        $tval=time() + TIME;
        setcookie('isblock',$tval-1,$tval);
    }  
    Session::set('blockerror',"You are Blocked");
    $counter=TIME;
echo <<<JS
    
             <script>
            let i= $counter;
            setInterval(()=>{
                if(i==0)
                    location.href=location.href;
                timer.innerHTML=`00:`+i;
                i--;
            },1000);
             </script>
            JS;
        
        }
    }

   ?>
<form method="post">
    <div class="cont">
    <div class="pagetitle">
        Login<span> Form </span>
    </div>
    <?php if($error or Session::get('blockerror')){ ?>
    <div class="alert alert-danger">
        <?=$error;?>
       <?= Session::get('blockerror') ?> <span id="timer"></span>
    </div>
    <?php } ?>
    <div class="mb-3">
        <label for="username">Username:</label>
        <input type="text" id="username" autofocus name="username" class="form-control"
        placeholder="Enter Username" required>
    </div>
    <div class="mb-3">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="form-control"
        placeholder="Enter Password" required>
    </div>
    <div class="form-group">
        <input type="checkbox">
        <label for="checkbox">Remember me</label>
        </div>
        <div class="F">
        <a herf="">Forgot password?</a>
        </div>
    
    <div class="mb-3 text-center">
        <button class="btn btn-success">Login</button>
    </div>
</div>
</form>
