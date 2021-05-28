<?php 
require_once('header.php'); 

function callAPI($url){
    $crl = curl_init();    
    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($crl);
    
    if(!$response){
        die('Error: "' . curl_error($crl) . '" - Code: ' . curl_errno($crl));
    }
    else{
        $response = json_decode($response,true);    
    }
    curl_close($crl);
    return $response;
}


$apis = array(
    ['uri' => 'https://reqres.in/api/users/1', 'email' => ''], 
    ['uri' => 'https://reqres.in/api/users/3', 'email' => ''],
    ['uri' => 'https://reqres.in/api/users/10', 'email' => ''],
);

foreach($apis as &$api){  
    $data = callAPI($api['uri']);   
    $api['email'] = $data['data']['email'];    
}
?>
<table class="table table-bordered border-primary">
<thead>
    <tr>
      <th scope="col">URI</th>
      <th scope="col">Email</th>     
    </tr>
  </thead>
  <tbody>
  <?php
   foreach($apis as $k){
       echo "<tr><td>{$k['uri']}</td><td>{$k['email']}</td></tr>";
   }
  ?>
  </tbody>
</table>
<?php require_once('footer.php'); ?>