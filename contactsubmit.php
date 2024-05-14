<?
ob_start();

require_once("includes/MasterInclude.php"); // this starts the session

$MailFromName 	= isset($_POST['txtMailFromName'])		? trim($_POST['txtMailFromName']) : '';
$MailFromEmail 	= isset($_POST['txtMailFromEmail']) 	? trim($_POST['txtMailFromEmail']) : '';
$ClientPhone	= isset($_POST['txtClientPhone'])		? trim($_POST['txtClientPhone']) : '';
$ClientAddress	= isset($_POST['txtClientAddress']) 	? trim($_POST['txtClientAddress']) : '';
$ClientAddress2	= isset($_POST['txtClientAddress2'])	? trim($_POST['txtClientAddress2']) : '';
$ClientCity 	= isset($_POST['txtClientCity']) 		? trim($_POST['txtClientCity']) : '';
$ClientState	= isset($_POST['txtClientState'])		? trim($_POST['txtClientState']) : '';
$ClientZip		= isset($_POST['txtClientZip']) 		? trim($_POST['txtClientZip']) : '';
$MailMessage	= isset($_POST['txtMailMessage'])		? trim($_POST['txtMailMessage']) : '';

				///var_dump($_POST);
				
if (isset($_SESSION['ContactInfo']))
{ // Pull the MailToName from Session Variables.
	$arraySR			= &$_SESSION['ContactInfo'];
	$MailToName			= $arraySR['MailToName']; 
}
				
$ErrHappened = false;
 	
if ($MailFromName == '')
	{$ErrHappened = true;
	$MailFromNameErr = "Please enter your name.<br>";}
else 
    {$MailFromNameErr = '';}
    
if ($MailFromEmail == '')
	{$ErrHappened = true;
	$MailFromEmailErr = "Please enter your email address.<br>";}
else 
    {$MailFromEmailErr = '';}
     
if ($MailMessage == '')
	{$ErrHappened = true;
	$MailMessageErr = "Please enter your message.<br>";}
else 
    {$MailMessageErr = '';}   

///----------------------------------------------------
switch ($MailToName)
{    
	case "Mike Campbell":
		$MailTo = "mikcam@abcmetals.com";
		break;		
	case "Jacki Gochenour":
		$MailTo = "jacgoc@abcmetals.com";
		break;		
	case "Clayton Oaks":
		$MailTo = "claoak@abcmetals.com";
		break;		
	case "Todd Wanty":
		$MailTo = "todwan@abcmetals.com";
		break;		
	case "Jeffrey Moe":
		$MailTo = "jefmoe@abcmetals.com";
		break;		
	case "Dan Kendall":
		$MailTo = "danken@abcmetals.com";
		break;		
	case "Scott Dunderman":
		$MailTo = "scodun@abcmetals.com";
		break;			
	case "Phil Carney":
		$MailTo = "PhilCarney@Kittiff.com";
		break;
	default:
		$MailToName = "Gemini Business";
		$MailTo = "info@geminibusiness.com";
		break;
} /// --------------------end switch ($MailToName) ------------------

if ($ErrHappened==false)
{	send_the_mail( 	$MailToName,
					$MailTo,
					$MailFromName,
					$MailFromEmail,
					$ClientPhone,
					$ClientAddress,
					$ClientAddress2,
					$ClientCity,
					$ClientState,
					$ClientZip,
					$MailMessage );
}


if (! isset($_SESSION['ContactInfo']) )
	{$_SESSION['ContactInfo'] = array();}

$arraySR = &$_SESSION ['ContactInfo'];
$arraySR['ErrHappened']			= $ErrHappened;
$arraySR['MailToName']			= $MailToName;
$arraySR['MailToNameErr']		= $MailToNameErr;
$arraySR['MailFromName']		= $MailFromName;
$arraySR['MailFromNameErr']		= $MailFromNameErr;
$arraySR['MailFromEmail']		= $MailFromEmail;
$arraySR['MailFromEmailErr']	= $MailFromEmailErr;
$arraySR['ClientPhone']			= $ClientPhone;
$arraySR['ClientPhoneErr']		= $ClientPhoneErr;
$arraySR['ClientAddress']		= $ClientAddress;
$arraySR['ClientAddressErr']	= $ClientAddressErr;
$arraySR['ClientAddress2']		= $ClientAddress2;
$arraySR['ClientAddress2Err']	= $ClientAddress2Err;
$arraySR['ClientCity']			= $ClientCity;
$arraySR['ClientCityErr']		= $ClientCityErr;
$arraySR['ClientState']			= $ClientState;
$arraySR['ClientStateErr']		= $ClientStateErr;
$arraySR['ClientZip']			= $ClientZip;
$arraySR['ClientZipErr']		= $ClientZipErr;
$arraySR['MailMessage']			= $MailMessage;
$arraySR['MailMessageErr']		= $MailMessageErr;
$arraySR['GeneralInfo']			= $GeneralInfo;

				///var_dump($_SESSION['ContactInfo']);
				///ob_end_flush();
				///exit;

header("Location: ContactForm.php");
ob_end_clean();

///-------------------------------------------------------------------------------------------------

function send_the_mail( $MailToName,
						$MailTo,
						$MailFromName,
						$MailFromEmail,
						$ClientPhone,
						$ClientAddress,
						$ClientAddress2,
						$ClientCity,
						$ClientState,
						$ClientZip,
						$MailMessage)
{
	global	$GeneralInfo,
			$ErrHappened,
			$MailFromEmailErr ;
	
					///echo "MailTo=" . $MailTo ."<br>";
					///var_dump($_SESSION['ContactInfo']);
					///ob_end_flush();
					///exit; 
	
	$MailHeader		= 'MIME-Version: 1.0' . "\r\n";
	$MailHeader		.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	/// Additional header stuff
	$MailHeader		.= "From:" . $MailFromName . "<" . $MailFromEmail . ">" . "\r\n";
	$MailHeader		.= "Mail-Reply-To:" . $MailFromEmail . "\r\n";
	$MailHeader		.= "Reply-To:" . $MailFromEmail . "\r\n";
	
	/// $MailHeader 	.= "X-Mailer: PHP/" . phpversion() . "\r\n";
	/// $MailHeader 	.= "X-Priority: 1" . "\r\n";

	///$MailHeader	.= "Cc: " . $EmailAddress . " \r\n";
	///$MailHeader	.= 'Bcc: birthdaycheck@example.com' . "\r\n";

	$MailSubject	= "Mail from Contact Us Web Page";
	
	$MailContent =	"Client Name:"		. FixForBrowser($MailFromName) . "<br>"
					. "Client Email:"	. FixForBrowser($MailFromEmail) . "<br>"
					. "Phone No:"		. FixForBrowser($ClientPhone) . "<br>"
					. "Address:"		. FixForBrowser($ClientAddress) . "<br>"
					. "Address2:"		. FixForBrowser($ClientAddress2) . "<br>"
					. "City:"			. FixForBrowser($ClientCity) . "<br>"
					. "State:" 			. FixForBrowser($ClientState) . "<br>"
					. "Zip Code:"		. FixForBrowser($ClientZip) . "<br>". "<br>"
					. $MailMessage;
				
	$MailResult = mail ($MailTo, $MailSubject, $MailContent, $MailHeader);	/// Sends the mail
	
	if ($MailResult == true)
		{$GeneralInfo = "Thank you for your interest in Gemini Business Systems.<br>"
					."Your email has been sent to " . $MailToName .".";
		}
	else 
		{	$ErrHappened = true;
			$MailFromEmailErr = "Please enter a valid address for Your Email .";
			$GeneralInfo = "";
		} 
	
}
?>