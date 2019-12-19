var drz;
function lihat(katanyo){
    if(katanyo.length==0){
        document.getElementById("kotaksugest").style.visibility = "hidden";
    }else{
        drz = buatajax();
        var url="proses.php";
        drz.onreadystatechange=stateChanged;
        var params = "q="+katanyo;
        drz.open("POST",url,true);
        //beberapa http header harus kita set kalau menggunakan POST
        drz.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        drz.setRequestHeader("Content-length", params.length);
        drz.setRequestHeader("Connection", "close");
        drz.send(params);
    }
}
/*
 <input id="text" type="text" name="pattern" value="" autocomplete="off" size="10" style="display: block">
echo '<input type="text" onclick="Cisi(\''.$k[0].'\');" style="cursor:pointer" value=\''.$k[0].'\' size="50">
$kata = $_POST['q'];
	$query = mysql_query("select *from m_pasien where nama like '%$kata%' or idpas like '%$kata%' limit 10");
	while($k=mysql_fetch_array($query))
	{
	$id=$k[idpas];
	$nama=$k[nama];
	$ker=$k[ker];
    echo '<li onClick="isi(\''.$k[idpas].'\');" style="cursor:pointer"> '.$k[idpas].'/'.$nama.' /'.$ker.' </li>';}
*/
function buatajax(){
    if (window.XMLHttpRequest){
        return new XMLHttpRequest();
    }
    if (window.ActiveXObject){
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}

function stateChanged(){
var data;
    if (drz.readyState==4 && drz.status==200){
        data=drz.responseText;
        if(data.length>0){
            document.getElementById("kotaksugest").innerHTML = data;
            document.getElementById("kotaksugest").style.visibility = "";
        }else{
            document.getElementById("kotaksugest").innerHTML = "";
            document.getElementById("kotaksugest").style.visibility = "hidden";
        }
    }
}



function isinyo(katanyo){
    document.getElementById("katanyo").value = katanyo;
    document.getElementById("kotaksugest").style.visibility = "hidden";
    document.getElementById("kotaksugest").innerHTML = "";
}

