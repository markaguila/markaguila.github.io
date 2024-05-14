<?
	function fixforbrowser($strOutputField)
{
	$strOutputField = stripslashes($strOutputField);/// Compensate for Magic Quotes 
	$strOutputField=htmlspecialchars($strOutputField, ENT_QUOTES);
	Return ($strOutputField);
}
?>