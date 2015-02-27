<?php
// User certificate issuer certificate file location
$ocsp_info = Array();

// EID-SK - CA for alternative ID cards until 13.01.2007
$ocsp_info["EID-SK"]["CA_CERT_FILE"]="certs/eid_sk.pem";
// OCSP server adress for this CA
$ocsp_info["EID-SK"]["OCSP_SERVER_URL"]='http://ocsp.sk.ee';
// OCSP responder certificate location for this CA
$ocsp_info["EID-SK"]["OCSP_SERVER_CERT_FILE"]="certs/eid_sk_ocsp.pem";

// EID-SK - CA for alternative ID cards since 13.01.2007
$ocsp_info["EID-SK 2007"]["CA_CERT_FILE"]="certs/eid_sk_2007.pem";
// OCSP server adress for this CA
$ocsp_info["EID-SK 2007"]["OCSP_SERVER_URL"]='http://ocsp.sk.ee';
// OCSP responder certificate location for this CA
$ocsp_info["EID-SK 2007"]["OCSP_SERVER_CERT_FILE"]="certs/EID-SK_2007_OCSP_RESPONDER_2010.pem";

// EID-SK 2011
$ocsp_info["EID-SK 2011"]["CA_CERT_FILE"]="certs/EID-SK_2011.crt";
// OCSP server adress for this CA
$ocsp_info["EID-SK 2011"]["OCSP_SERVER_URL"]='http://ocsp.sk.ee';
// OCSP responder certificate location for this CA
$ocsp_info["EID-SK 2011"]["OCSP_SERVER_CERT_FILE"]="certs/SK_OCSP_RESPONDER_2011.crt";



// ESTEID-SK - CA for Estonian national ID-card certificates issued until 13.01.2007
$ocsp_info["ESTEID-SK"]["CA_CERT_FILE"]="certs/esteid_sk.pem";
$ocsp_info["ESTEID-SK"]["OCSP_SERVER_URL"]='http://ocsp.sk.ee';
$ocsp_info["ESTEID-SK"]["OCSP_SERVER_CERT_FILE"]="certs/ESTEID-SK_OCSP_RESPONDER_2005.pem";


// Checking status of certificates issued from "ESTEID-SK 2007" against live OCSP
// ESTEID-SK 2007 - CA for Estonian national ID-card certificates issued since 13.01.2007
$ocsp_info["ESTEID-SK 2007"]["CA_CERT_FILE"]="certs/esteid_sk_2007.pem";
$ocsp_info["ESTEID-SK 2007"]["OCSP_SERVER_URL"]='http://ocsp.sk.ee';
$ocsp_info["ESTEID-SK 2007"]["OCSP_SERVER_CERT_FILE"]="certs/ESTEID-SK_2007_OCSP_RESPONDER_2010.pem";

// added 2011.08.31
// Checking status of certificates issued from "ESTEID-SK 2007" against Test OCSP (openxades)
//
//$ocsp_info["ESTEID-SK 2007"]["CA_CERT_FILE"]="certs/esteid_sk_2007.pem";
//$ocsp_info["ESTEID-SK 2007"]["OCSP_SERVER_URL"]='http://www.openxades.org/cgi-bin/ocsp.cgi';
//$ocsp_info["ESTEID-SK 2007"]["OCSP_SERVER_CERT_FILE"]="certs/TEST-SK_OCSP_RESPONDER_2005.pem";

// Checking status of certificates issued from "ESTEID-SK 2011" against live OCSP
// ESTEID-SK 2011 - CA for Estonian national ID-card certificates issued since 2011
$ocsp_info["ESTEID-SK 2011"]["CA_CERT_FILE"]="certs/ESTEID-SK_2011.crt";
$ocsp_info["ESTEID-SK 2011"]["OCSP_SERVER_URL"]='http://ocsp.sk.ee';
$ocsp_info["ESTEID-SK 2011"]["OCSP_SERVER_CERT_FILE"]="certs/SK_OCSP_RESPONDER_2011.crt";

// added 2011.08.31
// Checking status of certificates issued from "ESTEID-SK 2011" against Test OCSP (openxades OCSP)
//
//$ocsp_info["ESTEID-SK 2011"]["CA_CERT_FILE"]="certs/ESTEID-SK_2011.crt";
//$ocsp_info["ESTEID-SK 2011"]["OCSP_SERVER_URL"]='http://www.openxades.org/cgi-bin/ocsp.cgi';
//$ocsp_info["ESTEID-SK 2011"]["OCSP_SERVER_CERT_FILE"]="certs/TEST-SK_OCSP_RESPONDER_2005.pem";

// KLASS3-SK - CA for company certificates
$ocsp_info["KLASS3-SK"]["CA_CERT_FILE"]="certs/KLASS3-SK.pem";
$ocsp_info["KLASS3-SK"]["OCSP_SERVER_URL"]='http://ocsp.sk.ee';
$ocsp_info["KLASS3-SK"]["OCSP_SERVER_CERT_FILE"]="certs/KLASS3-SK_OCSP_RESPONDER_2009.pem";

// KLASS3-SK 2010 - CA for company certificates
$ocsp_info["KLASS3-SK 2010"]["CA_CERT_FILE"]="certs/KLASS3-SK_2010.pem";
$ocsp_info["KLASS3-SK 2010"]["OCSP_SERVER_URL"]='http://ocsp.sk.ee';
$ocsp_info["KLASS3-SK 2010"]["OCSP_SERVER_CERT_FILE"]="certs/KLASS3-SK_2010_OCSP_RESPONDER.pem";



// TEST-SK - CA for test certificates
$ocsp_info["TEST-SK"]["CA_CERT_FILE"]="certs/TEST-SK_2009.pem";
$ocsp_info["TEST-SK"]["OCSP_SERVER_URL"]='http://www.openxades.org/cgi-bin/ocsp.cgi';
$ocsp_info["TEST-SK"]["OCSP_SERVER_CERT_FILE"]="certs/TEST-SK_OCSP_RESPONDER_2005.pem";

// TEST-SK - CA for test certificates
$ocsp_info["TEST of ESTEID-SK 2011"]["CA_CERT_FILE"]="certs/test_esteid_2011.crt";
$ocsp_info["TEST of ESTEID-SK 2011"]["OCSP_SERVER_URL"]='http://www.openxades.org/cgi-bin/ocsp.cgi';
$ocsp_info["TEST of ESTEID-SK 2011"]["OCSP_SERVER_CERT_FILE"]="certs/test_ocsp_2011.crt";



// Openssl binary location
$ocsp_info["OPEN_SSL_BIN"] = '/usr/local/ssl/bin/openssl';

// Temp folder to store certificates
$ocsp_info["OCSP_TEMP_DIR"] = '/var/tmp/';

// When true, then OCSP check will be made
$ocsp_info["OCSP_ENABLED"] = true;


/*
Params:
$cert - user certificate in PEM format

Output:
 0 - OCSP certificate status unknown
 1 - OCSP certificate status valid
 2 - OCSP internal error
 4 - Some error in script
*/

function doOCSPcheck($cert) {

	global $ocsp_info; // Global config array
	
	$user_good = 0;
	$issuer_dn=$_SERVER["SSL_CLIENT_I_DN_CN"];
	
	if ($ocsp_info["OCSP_ENABLED"]===false) {
		return Array("OCSP_ENABLED === false", 0);
	}

	// Saving user certificate file to OCSP temp folder
	$tmp_f = fopen($tmp_f_name = tempnam($ocsp_info["OCSP_TEMP_DIR"],'ocsp_check'),'w');
	fwrite($tmp_f,$cert);
	fclose($tmp_f);

	if ($ocsp_info["OCSP_ENABLED"] && isset($ocsp_info[$issuer_dn]["CA_CERT_FILE"]) && isset($ocsp_info[$issuer_dn]["OCSP_SERVER_CERT_FILE"]) && isset($ocsp_info[$issuer_dn]["OCSP_SERVER_URL"])) {


		// Making OCSP request using OpenSSL ocsp command
		$command = $ocsp_info["OPEN_SSL_BIN"].' ocsp -issuer '.$ocsp_info[$issuer_dn]["CA_CERT_FILE"].' -cert '.$tmp_f_name.' -url '.$ocsp_info[$issuer_dn]["OCSP_SERVER_URL"].' -VAfile '.$ocsp_info[$issuer_dn]["OCSP_SERVER_CERT_FILE"];

		$descriptorspec = array(
		   0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
		   1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
		   2 => array("pipe", "w") // stderr is a pipe that the child will write to
		);

		$process = proc_open($command, $descriptorspec, $pipes);

		if (is_resource($process)) {
			fclose($pipes[0]);


			// Getting errors from stderr
			$errorstr="";
			while ($line = fgets($pipes[2])) {
				$errorstr.=$line;
			}

			if ($errorstr!="" && (strpos($errorstr,"Response verify OK")!==0)) {
				$user_good = 4;
			} else {
				// Parsing OpenSSL command stdout
				while ($line = fgets($pipes[1])) {
					if (strstr($line,'good')) {
						$user_good = 1;
					} else if (strstr($line,'internalerror (2)')) {
						$user_good = 2;
					}
				}
				fclose($pipes[1]);
			}

			proc_close($process);
		}
	}

	return Array($errorstr, $user_good);
}
?>