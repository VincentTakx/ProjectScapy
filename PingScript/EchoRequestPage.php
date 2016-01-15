
<!DOCTYPE html>
<html>
<head>
    
    <title></title>
	<meta charset="utf-8" />

</head>
<body>
    <h1>EchoRequestPage</h1>
    <h5>Packet settings</h5>


    <form method="GET">
	DestinationIp:  <input type="text" name="Destination"><br>
	Payload:  <input type="text" name="Payload"><br>
	Amount:  <input type="text" name="Amount"><br>
	<input type="submit">
	</form>

    

</body>
</html>
<?php



if(isset($_GET["Destination"]))
	$destination = $_GET["Destination"];
if(isset($_GET["Payload"]))
	$payload = $_GET["Payload"];
if(isset($_GET["Amount"]))
	$amount = $_GET["Amount"];


$File_handle = fopen("Ping.txt", "w");
$txt = "Destination = $destination\r\n
		Payload = $payload\r\n
		Amount = $amount\r\n";
fwrite($File_handle, $txt);
fclose($File_handle);


$command = "http://127.0.0.1:81/Ping.txt 2>&1";
$pid = popen($command , "r");
while(!feof($pid))
{
  echo fread($pid, 256);
  flush();
  ob_flush();
  usleep(100000);
}
pclose($pid);
echo file_get_contents("http://127.0.0.1:81/Ping.txt");


?>
