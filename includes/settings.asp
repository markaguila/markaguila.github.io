
<%
Dim calDataConnStr, prayDataConnStr, emcDataConnStr, mediaDataConnStr, photoDataConnStr
'GENERAL SETTINGS
session("vsite") = "abcmetals"


'DATABASE CONNECTION SETTINGS
calDataConnStr = "Driver={Microsoft Access Driver (*.mdb)};DBQ=" & server.MapPath("database/cal.mdb")&";"

'"Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & server.MapPath("database/cal.mdb")&";"

prayDataConnStr = "Driver={Microsoft Access Driver (*.mdb)};DBQ=" & server.MapPath("database/prayer.mdb")&";"
emcDataConnStr = "Driver={Microsoft Access Driver (*.mdb)};DBQ=" & server.MapPath("../database/emc.mdb")&";"
mediaDataConnStr = "Driver={Microsoft Access Driver (*.mdb)};DBQ=" & server.MapPath("../database/media.mdb")&";"
photoDataConnStr = "Driver={Microsoft Access Driver (*.mdb)};DBQ=" & server.MapPath("../database/photo.mdb")&";"

'Set also the following parameters to get an automatic email in case there is an error and mormal settings cannot be retrieved from the database
pSupportErrorEmailFrom 		= "email@yourdomain.com"
pSupportErrorSMTP      		= "yourdomain.com"
pSupportErrorEmailComponent	= "cdonts"
' Error debugging
pTrapDbErrors=0
%>