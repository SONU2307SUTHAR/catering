<?php
 if(Session::get('logindtl')){// login hone k bd koi url m users open krega to vo menu page pr hi rhega
    redirect('menu');
    exit;
}
$error=null;
if(isset($_POST['username'])){
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
            $error="Enter valid username and Password";
        }
    }else{
         $error="Enter Username and Password Both!";
    }
}
?>
<form method="post">
    <div class="cont">
    <div class="pagetitle">
        Login<span> Form </span>
    </div>
    <?php if($error){ ?>
    <div class="alert alert-danger">
        <?=$error;?>
    </div>
    <?php } ?>
    <div class="mb-3">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" class="form-control"
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

<style>
    .pagetitle{
        padding: 5px;
        text-align: center;
        font-size: 2em;
        font-weight: bold;
        color: #336;
        text-shadow: 2px 1px 3px #000;
        border-bottom: 1px solid #ccf;
        margin-bottom: 5px;
        
    }
    .pagetitle>span {
        color: #778103;
    }
    .cont{
        padding: 12px;
        width: 70%;
        margin: 10px auto;
        box-shadow: 1px 1px 5px #334;
        border-radius: 20px;
    }
    .F{
        font-size: 15px;
        color: #3498db;
        text-align: right;
        margin-bottom: 0.1px;
        
    }
    .form-group label{
        font-size: 15px;
    }
    </style>