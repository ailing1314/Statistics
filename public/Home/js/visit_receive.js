function loadXMLDoc()
{
    var nowurl=window.location.href;
    var rUrl = document.referrer;


    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.open("POST","http://115.28.175.102/count/public/index.php/visit/receive",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("now_url="+nowurl+"&=come_url="+rUrl);
}
loadXMLDoc();