<?php

date_default_timezone_set("Asia/Kuala_Lumpur");

$uatUrl = 'https://dev.finexusgroup.com:3223/upp/faces/upp/payment.xhtml';

$uatMerchantId = '000000000056970';

$uatKey = 'F9240E2A4022BBAC0C83E13659101C72CB133D8040173DFFB32168C160F11896';


$b['h001_MTI'] = '0280';
$b['h002_VNO'] = '06';
$b['h003_TDT'] = date('Ymd');
$b['h004_TTM'] = date('his00');

$a['f001_MID'] = $uatMerchantId; //merchant id
$a['f004_PAN'] = '';
$a['f007_TxnAmt'] = '000000000100'; // amount
$a['f010_CurrCode'] = '458';
$a['f019_ExpTxnAmt'] = '2';
$a['f247_OrgTxnAmt'] = '';
$a['f248_OrgCurrCode'] = '';
$a['f249_TxnCh'] = 'WEB';
$a['f250_CCProcFeeAmt'] = '';
$a['f251_DDProcFeeAmt'] = '';
$a['f252_PromoCode'] = '';
$a['f253_CntyCode'] = 'MY';
$a['f255_IssCode'] = '';
$a['f256_FICode'] = 'ISP';
$a['f260_ServID'] = 'ISP';
$a['f261_HostID'] = '';
$a['f262_SessID'] = '';
$a['f263_MRN'] = date('Ymdhis').mt_rand(100, 999);
$a['f264_Locale'] = 'EN';
$a['f270_ORN'] = '';
$a['f271_ODesc'] = 'Testing 1234';
$a['f278_EMailAddr'] = 'abc@gmail.com';
$a['f279_HP'] = '0123456789';
$a['f280_RURL_UPPPS'] = 'https://webhook.site/4c092b58-df70-4e6a-9168-3c5b97e15990';
$a['f281_RURL_UPPPU'] = 'https://webhook.site/4c092b58-df70-4e6a-9168-3c5b97e15990';
$a['f282_RURL_UPPPC'] = 'https://webhook.site/4c092b58-df70-4e6a-9168-3c5b97e15990';
$a['f285_IPAddr'] = '192.168.100.6';
$a['f287_ExpOrgTxnAmt'] = '2';
//$a['f289_CustId'] = 'PWbASytDQGA=';  //added
//$a['f290_Signature'] = ''; //added
$a['f350_CrdTyp'] = '';
$a['f354_TID'] = '';
$a['f325_ECommMercInd'] = '0';
$a['f339_TokenFlg'] = 'N';
$a['f344_MercCustId'] = '1234567';
$a['f347_TokenShrtNm'] = 'TestUPP';
$a['f362_PreAuthFlg'] = 'N';
$a['f363_InvNum'] = '';
$a['f364_Fee'] = '';
$a['f365_POSEnvFlg'] = '';

$d = array_merge($b, $a);

$c = "";
foreach($d as $key => $val) {
    $c .= "".$key."=".$val."&";
}
$c = rtrim($c, '&');


$hash = $c.$uatKey;

// var_dump($hash);


$hashmac = hash_hmac('sha256', $hash, $uatKey);


$c .= "&t001_SHT=SH2&t002_SHV=".$hashmac;

echo $uatUrl.'?'.$c."\r\n";

?>