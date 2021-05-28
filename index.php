<?php 
require_once('header.php'); 
$string1 = $string2 = $output1 = $output2 = '';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $string1 = trim($_POST['string_1']);
    $string2 = trim($_POST['string_2']);
    list($output1, $output2) = checkString($string1, $string2);
}

function checkString($str_1, $str_2){
    $output[] = getOutput($str_1, $str_2);
    $output[] = getOutput($str_1, $str_2, 1);    
    return $output;
}

function getOutput($str_1, $str_2, $mod = 0){
    $output = array();
    if($mod == 0){
        $string_1 = $str_1;
        $string_2 = $str_2;
    }else{
        $string_1 = $str_2;
        $string_2 = $str_1;
    }

    $str_array = str_split($string_1,1);
    foreach ($str_array as $s) {
        if(!in_array($s, str_split($string_2,1))){
            $output[] = $s;
        }
    }
    return implode("", $output);

}

?>
<form id="" action="index.php" method="post">
  <div class="form-group">
    <label>String 1</label>
    <input type="text" name="string_1" class="form-control">    
  </div>
  <div class="form-group">
    <label>String 2</label>
    <input type="text" name="string_2" class="form-control">    
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<br>

<table class="table table-bordered border-primary">
<thead>
    <tr>
      <th scope="col">String 1</th>
      <th scope="col">String 2</th>
      <th scope="col">Output 1</th> 
      <th scope="col">Output 2</th>     
    </tr>
  </thead>
  <tbody>
  <tr>        
    <td><?=$string1?></td>
    <td><?=$string2?></td>
    <td><?=$output1?></td>
    <td><?=$output2?></td>        
    </tr>
  </tbody>
</table>

<?php require_once('footer.php'); ?>

<script>

</script>