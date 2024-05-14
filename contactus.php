<? 
ob_start();

require_once("includes/header.html");
require_once("includes/masterinclude.php");

if (isset($_SESSION['ContactInfo']))
{ // Pull the previously entered form values from Session Variables.
	$arraySR			= &$_SESSION['ContactInfo'];
	$ErrHappened		= $arraySR['ErrHappened'];
	$MailToName			= $arraySR['MailToName']; 
	$MailToNameErr		= $arraySR['MailToNameErr'];
	$MailFromName		= $arraySR['MailFromName'];
	$MailFromNameErr	= $arraySR['MailFromNameErr'];
	$MailFromEmail		= $arraySR['MailFromEmail'];
	$MailFromEmailErr	= $arraySR['MailFromEmailErr'];
	$ClientPhone		= $arraySR['ClientPhone'];
	$ClientPhoneErr		= $arraySR['ClientPhoneErr'];
	$ClientAddress		= $arraySR['ClientAddress'];
	$ClientAddressErr	= $arraySR['ClientAddressErr'];
	$ClientAddress2		= $arraySR['ClientAddress2'];
	$ClientAddress2Err	= $arraySR['ClientAddress2Err'];
	$ClientCity			= $arraySR['ClientCity'];
	$ClientCityErr		= $arraySR['ClientCityErr'];
	$ClientState		= $arraySR['ClientState'];
	$ClientStateErr		= $arraySR['ClientStateErr'];
	$ClientZip			= $arraySR['ClientZip'];
	$ClientZipErr		= $arraySR['ClientZipErr'];
	$MailMessage		= $arraySR['MailMessage'];
	$MailMessageErr		= $arraySR['MailMessageErr'];
	$GeneralInfo		= $arraySR['GeneralInfo'];
}
else
{ // initialize the fields
	$ErrHappened 		= false;
	$MailToName 		= 'info@geminibusiness.com'; 
	$MailToNameErr	 	= '';	
	$MailFromName 		= '';
	$MailFromNameErr	= '';
	$MailFromEmail 		= '';
	$MailFromEmailErr 	= ''; 	
	$ClientPhone 		= '';
	$ClientPhoneErr 	= '';
	$ClientAddress 		= '';
	$ClientAddressErr 	= ''; 	
	$ClientAddress2 	= '';
	$ClientAddress2Err 	= ''; 	
	$ClientCity 		= '';
	$ClientCityErr 		= '';
	$ClientState 		= ''; 
	$ClientStateErr 	= '';	
	$ClientZip	 		= '';
	$ClientZipErr 		= '';
	$MailMessage 		= ''; 
	$MailMessageErr 	= '';
	$GeneralInfo		= " ";	
}
							///override session variable with query string, if present
 $MailToName 	= isset($_GET['MailToName']) 		? trim($_GET['MailToName']) : $MailToName;

 if (! isset($_SESSION['ContactInfo']) )
	{$_SESSION['ContactInfo'] = array();}

$arraySR = &$_SESSION ['ContactInfo'];			/// If they clicked a name, we must store it 
$arraySR['MailToName']			= $MailToName;  /// in the session variable

echo <<<CodeBlock
	<div id="content">
			<div class="right">
				<h3>Gemini Business Systems<br>
1089 Third Avenue S.W.
Suite 103<br>
Carmel, IN 46032<br><br>

P.O. Box 3188<br>
Carmel, IN 46082<br><br>

(317)848-1937<br>
(888)381-3276</h3>
				</div>
			<div id="instructions">
	
CodeBlock;

if ($ErrHappened == true)
{	echo "<span class=error>"
		.$MailToNameErr
		.$MailFromNameErr
		.$MailFromEmailErr
	 	.$ClientPhoneErr
  		.$ClientAddressErr
		.$ClientAddress2Err
		.$ClientCityErr
		.$ClientStateErr
		.$ClientZipErr
		.$MailMessageErr
		."</span>";
}
else 
	{echo $GeneralInfo;}
	
echo <<<CodeBlock
</div>
<div class="formbox">
<form method="POST" width="300" action="contactsubmit.php">
	<ul>
CodeBlock;

if ($MailToNameErr <> '') 		{echo "<span class=error>";}
echo	"<li>"
		."<h3>Contact Name:</h3>"
		."<h2>" . $MailToName ."</h2>"
		."</li><br>";
if ($MailToNameErr <> '') 		{echo "</span>";}

if ($MailFromNameErr <> '') 		{echo "<span class=error>";}		
echo 	"<li class='odd'>"
		."<h3>* Your Name:</h3>"
		."<input name='txtMailFromName' type='text' size='20' value = '" . $MailFromName ."'>"
		."</li>";
if ($MailFromNameErr <> '') 		{echo "</span>";}

if ($MailFromEmailErr <> '') 		{echo "<span class=error>";}		
echo 	"<li>"
		."<h3>* Your Email:</h3>"
		."<input name='txtMailFromEmail' type='text' size='20' value = '" . $MailFromEmail ."'>"
		."</li>";
if ($MailFromEmailErr <> '') 		{echo "</span>";}
				
if ($ClientPhoneErr <> '') 		{echo "<span class=error>";}
echo 	"<li class='odd'>"
		."<h3>  Phone Number</h3>"
		."<input name='txtClientPhone' type='text' size='20' value = '" . $ClientPhone ."'>"
		."</li>";
if ($ClientPhoneErr <> '') 		{echo "</span>";}

if ($ClientAddressErr <> '') 		{echo "<span class=error>";}		
echo 	"<li>"
		."<h3> Address</h3>"
		."<input name='txtClientAddress' type='text' size='20' value = '" . $ClientAddress ."'>"
		."</li>";
if ($ClientAddressErr <> '') 		{echo "</span>";}

if ($ClientAddress2Err <> '') 		{echo "<span class=error>";}
echo 	"<li class='odd'>"
		."<h3> Address</h3>"
		."<input name='txtClientAddress2' type='text' size='20' value = '" . $ClientAddress2 ."'>"
		."</li>";
if ($ClientAddress2Err <> '') 		{echo "</span>";}
				
if ($ClientCityErr <> '') 		{echo "<span class=error>";}
echo 	"<li>"
		."<h3>  City</h3>"
		."<input name='txtClientCity' type='text' size='20' value = '" . $ClientCity ."'>"
		."</li>";
if ($ClientCityErr <> '') 		{echo "</span>";}

if ($ClientStateErr <> '') 		{echo "<span class=error>";}
echo 	"<li class='odd'>"
		."<h3>  State</h3>"
		."<input name='txtClientState' type='text' size='20' value = '" . $ClientState ."'>"
		."</li>";
if ($ClientStateErr <> '') 		{echo "</span>";}
				
if ($ClientZipErr <> '') 		{echo "<span class=error>";}		
echo 	"<li>"
		."<h3>  Zip</h3>"
		."<input name='txtClientZip' type='text' size='10' value = '" . $ClientZip ."'>"
		."</li>";
if ($ClientZipErr <> '') 		{echo "</span>";}

if ($MailMessageErr <> '') 		{echo "<span class=error>";}
echo 	"<li class='odd'>"
		."<h3>* Message:</h3>"
		."<textarea name='txtMailMessage' cols='40' rows='12' wrap='VIRTUAL'>"
		. FixForBrowser($MailMessage)
		."</textarea>"
		."</li>";
if ($MailMessageErr <> '') 		{echo "</span>";}
				
echo <<<CodeBlock
				<li>
				<input type="submit" name="submessage" value="Thank You!">
				</li>
	</ul>

				
			</form>
		</div>
			</div>
CodeBlock;

require_once("includes/footer.html");

ob_end_flush();

?>

			