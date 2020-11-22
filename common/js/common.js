//��Ʈ ������ ����
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

//��ũ
function link(url){
	document.location.href = url;
}

//���Խ� �˻�
function regChk(obj){
	var msg = 'true';
	var reg;
	
	switch(obj.name){
		case 'name' :
			reg = new RegExp(/^[��-�R]{2,}$/);
			if(reg.test(obj.value) == false) msg = "�̸��� �� �ѱ۷� �Է����ּ���.";
		break;
		case 'num' :
			reg = new RegExp(/^[0-9]{1,2}$/);
			if(reg.test(obj.value) == false) msg = "���ڸ� �Է��� �����մϴ�.";
		break;
		case 'number' :
			reg = new RegExp(/^[0-9]{5}$/);
			if(reg.test(obj.value) == false) msg = "5�ڸ��� ���ڸ� �Է��� �����մϴ�.";
		break;		
		case 'email' :
			reg = new RegExp(/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9._-]+$/);
			if(reg.test(obj.value) == false) msg = "�̸����� ��Ĵ�� �Է����ּ���.";
		break;
		case 'phone' :
			reg = new RegExp(/^[0-9]{2,3}\-[0-9]{3,4}\-[0-9]{4}$/);
			if(reg.test(obj.value) == false) msg = "�ڵ��� ��ȣ�� ��Ĵ�� �Է����ּ���.";
		break;
		case 'pw' :
		case 're_pw' :
			if(obj.value.length < 4 || obj.value.length > 16) msg = obj.title + "��(��) �Է����ּ���.";
		break;

		default :
			if(obj.value.length == 0) msg = obj.title + "��(��) �Է����ּ���.";
		break;
	}
	return msg;
}

//�� üũ
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

//���޴�
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

//���� �޴� ����
function dep2view(dep1idx, cnt){
	var dep1 = document.getElementById('dep1'+dep1idx);
	dep1.innerHTML = dep1.innerHTML == '����' ? '�ݱ�' : '����';
	dep1.title = dep1.title == '����' ? '�ݱ�' : '����';	
	for(var i=1; i<=cnt; i++){
		var dep2 = document.getElementById('dep2'+dep1idx+'_'+i);
		dep2.style.display = dep2.style.display == 'none' ? 'block' : 'none';
	}
}

//�� ����
function frmSubmit(frm, idx, pass){
	var frm = document.forms[frm];
	if(pass){
		frm.idx.value = idx;
		frm.submit();
	} else {
		if(confirm('������ �����Ͻðڽ��ϱ�?')){
			frm.idx.value = idx;
			frm.submit();
		}
	}
}

//���÷���
function disp(one, two){
	var one = document.getElementById(one);
	var two = document.getElementById(two);
	one.style.display = 'block';
	two.style.display = 'none';
}