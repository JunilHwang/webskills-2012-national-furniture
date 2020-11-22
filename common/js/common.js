//ÆùÆ® »çÀÌÁî Á¶Á¤
size = 90;
function zoom(n){
	if( n == 0){
		size = 90;
		document.getElementById('content').style.fontSize = "12px";
	} else {
		size = size + n;
		document.getElementById('content').style.fontSize = size + "%";
	}
}

//¸µÅ©
function link(url){
	document.location.href = url;
}

//Á¤±Ô½Ä °Ë»ç
function regChk(obj){
	var msg = 'true';
	var reg;
	
	switch(obj.name){
		case 'name' :
			reg = new RegExp(/^[°¡-ÆR]{2,}$/);
			if(reg.test(obj.value) == false) msg = "ÀÌ¸§À» ¼ø ÇÑ±Û·Î ÀÔ·ÂÇØÁÖ¼¼¿ä.";
		break;
		case 'num' :
			reg = new RegExp(/^[0-9]{1,2}$/);
			if(reg.test(obj.value) == false) msg = "¼ıÀÚ¸¸ ÀÔ·ÂÀÌ °¡´ÉÇÕ´Ï´Ù.";
		break;
		case 'number' :
			reg = new RegExp(/^[0-9]{5}$/);
			if(reg.test(obj.value) == false) msg = "5ÀÚ¸®ÀÇ ¼ıÀÚ¸¸ ÀÔ·ÂÀÌ °¡´ÉÇÕ´Ï´Ù.";
		break;		
		case 'email' :
			reg = new RegExp(/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9._-]+$/);
			if(reg.test(obj.value) == false) msg = "ÀÌ¸ŞÀÏÀ» ¾ç½Ä´ë·Î ÀÔ·ÂÇØÁÖ¼¼¿ä.";
		break;
		case 'phone' :
			reg = new RegExp(/^[0-9]{2,3}\-[0-9]{3,4}\-[0-9]{4}$/);
			if(reg.test(obj.value) == false) msg = "ÇÚµåÆù ¹øÈ£¸¦ ¾ç½Ä´ë·Î ÀÔ·ÂÇØÁÖ¼¼¿ä.";
		break;
		case 'pw' :
		case 're_pw' :
			if(obj.value.length < 4 || obj.value.length > 16) msg = obj.title + "À»(¸¦) ÀÔ·ÂÇØÁÖ¼¼¿ä.";
		break;

		default :
			if(obj.value.length == 0) msg = obj.title + "À»(¸¦) ÀÔ·ÂÇØÁÖ¼¼¿ä.";
		break;
	}
	return msg;
}

//Æû Ã¼Å©
function frmChk(frm){
	var ok = new Array;
	var arg;
	var argLen = arguments.length - 1;
	
	for(var i=argLen; i>=1; i--){
		arg = arguments[i];
		ok[arg]  = regChk(frm[arg]);
		if(ok[arg] != 'true'){
			frm[arg].style.backgroundColor = "#FF0";
			frm[arg].focus();
		} else {
			frm[arg].style.backgroundColor = "";
		}
	}
	
	for(var i=1; i<=argLen; i++){
		arg = arguments[i];
		if(ok[arg] != 'true'){
			alert(ok[arg]);
			return false;
		}
	}
}

//Äü¸Ş´º
function quick(id, Y){
	var m = document.getElementById(id);
	m.style.top = 0;
	setInterval(
	function(){
		var sp, ep, am;
		sp = parseInt(m.style.top);
		ep = Math.max(document.documentElement.scrollTop, document.body.scrollTop) + Y;
		am = Math.abs(Math.ceil(ep-sp)/15);
		m.style.top = sp + ((ep<sp) ? -am : am) + "px";
	}, 10);
}

//ÇÏÀ§ ¸Ş´º º¸±â
function dep2view(dep1idx, cnt){
	var dep1 = document.getElementById('dep1'+dep1idx);
	dep1.innerHTML = dep1.innerHTML == 'º¸±â' ? '´İ±â' : 'º¸±â';
	dep1.title = dep1.title == 'º¸±â' ? '´İ±â' : 'º¸±â';	
	for(var i=1; i<=cnt; i++){
		var dep2 = document.getElementById('dep2'+dep1idx+'_'+i);
		dep2.style.display = dep2.style.display == 'none' ? 'block' : 'none';
	}
}

//Æû Àü¼Û
function frmSubmit(frm, idx, pass){
	var frm = document.forms[frm];
	if(pass){
		frm.idx.value = idx;
		frm.submit();
	} else {
		if(confirm('Á¤¸»·Î »èÁ¦ÇÏ½Ã°Ú½À´Ï±î?')){
			frm.idx.value = idx;
			frm.submit();
		}
	}
}

//µğ½ºÇÃ·¹ÀÌ
function disp(one, two){
	var one = document.getElementById(one);
	var two = document.getElementById(two);
	one.style.display = 'block';
	two.style.display = 'none';
}