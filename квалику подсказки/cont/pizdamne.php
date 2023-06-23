<?


$name=['avatar']['name'];
$type=['avatar']['type'];
$tmp_path=['avatar']['tmp_name'];
$size=['avatar']['size'];

$rand= rand(200, 600);
$Ext= explode('.', $name);

$name= $Ext['0'];
$Ext= $Ext['1'];
$full_name="$name"."_$rand".".$Ext";
$path="/css/img/$full_name";

if($sub){
    if(all){
        if($size < 500000){
            if($type == "image/jpeg")
            {
                $run;
                if($run)
                {
                    move_uploaded_file($tmp_path, $path);

                }
            }
        }
    }
}




?>