<?

    class Model_Form extends Model
    {
        public function get_data()
        {
            
            $connect=mysqli_connect('localhost','root','','tasklist');
            $login=$_POST['login'];
            $password=$_POST['password'];
            $submit=$_POST['submit'];
            
        
            $disallow = ['~', '\'', '"', '<', '>', '.', '%'];
            $login = str_replace($disallow, '', $login);
            $password = str_replace($disallow, '', $password);



                if($login && $password)
                {       
                    $str_login="SELECT * FROM `users` where `login`= '$login' and `password`='$password'";
                    echo $str_login;
                    $run_login=mysqli_query($connect,$str_login);

                    $login_users=mysqli_num_rows($run_login);
                    
                        if($login_users == 1)
                        {
                            $out_login=mysqli_fetch_array($run_login);
        
                            echo $out_login['login'];
        
                            $_SESSION['users']=array
                            (
                                'id' => $out_login['id'],
                                'login' => $out_login['login'],
                                'password' => $out_login['password'],
                            );
                              
                        }
                        else
                        {
        
                            $str_regist="INSERT INTO `users`(`login`, `password`, `created_at`) VALUES ('$login','$password', CURRENT_TIMESTAMP)";
                            $run_regist=mysqli_query($connect,$str_regist);
        
                            $str_login="SELECT * FROM `users` where `login`= '$login' and `password`='$password'";
                            $run_login=mysqli_query($connect,$str_login);
                            $out_login=mysqli_fetch_array($run_login);
                            
                            $_SESSION['users']=array
                            (
                                'id' => $out_login['id'],
                                'login' => $out_login['login'],
                                'password' => $out_login['password'],
                            );
                        }
                }
                else
                {
                    $_SESSION['good']="<font class=font color=red>Заполните все поля</font>";
                }

            }  
             
        }
                


?>