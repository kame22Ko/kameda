
/*
   -----------------------------------------------------
   �J�����_�[�i�����N�@�\�t���j
   Ver. 1.0.2
   update 2011.3.5
   Copyright (C) WEB-JOZU  URL:http://www.web-jozu.com/
   -----------------------------------------------------
*/


function holidaySet(MM,DD,WEEK,DAY,TTL){
	holiMM[i] = MM; holiDD[i] = DD; holiWEEK[i] = WEEK; holiDAY[i] = DAY; holiTTL[i++] = TTL;
}

function linkdaySet(MM,DD,ACT,URL,TTL){
	this['link' + MM + 'MM']['ok'] = "ok";

	this['link' + MM + 'MM']['d' + DD] = new Array;
	this['link' + MM + 'MM']['d' + DD]['act'] = ACT;
	this['link' + MM + 'MM']['d' + DD]['url'] = URL;
	this['link' + MM + 'MM']['d' + DD]['ttl'] = TTL;
}

function showCalen(MM){
	calenData = createCalen(MM);
	if(document.getElementById) {
		document.getElementById('calenArea').innerHTML = calenData;
	}
}

function showTtl(MM,DD){
	if(document.getElementById && this['link' + MM + 'MM']['d' + DD]['ttl']) {
		document.getElementById('d' + MM + DD).innerHTML = '<span class="linkPopup"><span class="popArrow">��</span><span class="popTxt">' + this['link' + MM + 'MM']['d' + DD]['ttl'] + '</span>';
	}
}

function hideTtl(MM,DD){
	if(document.getElementById) {
		document.getElementById('d' + MM + DD).innerHTML = '';
	}
}

function linkGo(MM,DD){
	actObj = this['link' + MM + 'MM']['d' + DD]['act'];
	urlObj = this['link' + MM + 'MM']['d' + DD]['url'];

	if(actObj == 0 || urlObj == ""){

	}else if(actObj == 1){
		location.href = 'http://' + urlObj;

	}else if(actObj == 2){
		newWin1 = window.open('http://' + urlObj, null);
		newWin1.focus();

	}else if(actObj == 3){
		newWin2 = window.open('http://' + urlObj, 'newWin', 'width=' + winWW + ', height=' + winHH + ', menubar=yes, toolbar=yes, scrollbars=' + winSCL + '');
		newWin2.focus();
	}
}


//�����N��ݒ�
for(i=1; i<=12; i++){
	this['link' + i + 'MM'] = new Array;
	this['link' + i + 'MM']['ok'] = "";
}

i = 0;





/* ---------- �ݒ�̈� start ---------- */

//�����N��ݒ�
//linkdaySet(��,��,�E�B���h�E [0:�����N�Ȃ�, 1:��win, 2:��win, 3:PopUpWin],�����N��,����)

linkdaySet(1,1,1,'www.yahoo.co.jp/','Yahoo!�ւ̃����N�ł��B<br>���E�B���h�E�ňړ����܂��B');
linkdaySet(1,10,2,'www.google.com/','Google�ւ̃����N�ł��B<br>�ʃE�B���h�E�ňړ����܂��B');
linkdaySet(1,25,0,'','�����N�͂��܂���B<br>���b�Z�[�W�̂ݕ\�����܂��B<br>�ʐ^������܂��B<br><img src="img/change_ph01.jpg" width="120" height="84" alt="�ʐ^" vspace="5">');
linkdaySet(1,29,3,'www.goo.ne.jp/','goo�ւ̃����N�ł��B<br>�|�b�v�A�b�v�ňړ����܂��B');

linkdaySet(2,8,1,'www.yahoo.co.jp/','Yahoo!�ւ̃����N�ł��B<br>���E�B���h�E�ňړ����܂��B');
linkdaySet(2,15,2,'www.google.com/','Google�ւ̃����N�ł��B<br>�ʃE�B���h�E�ňړ����܂��B');
linkdaySet(2,20,0,'','�����N�͂��܂���B<br>���b�Z�[�W�̂ݕ\�����܂��B<br>�ʐ^������܂��B<br><img src="img/change_ph01.jpg" width="120" height="84" alt="�ʐ^" vspace="5">');
linkdaySet(2,25,3,'www.goo.ne.jp/','goo�ւ̃����N�ł��B<br>�|�b�v�A�b�v�ňړ����܂��B');

linkdaySet(3,1,1,'www.yahoo.co.jp/','Yahoo!�ւ̃����N�ł��B<br>���E�B���h�E�ňړ����܂��B');
linkdaySet(3,10,2,'www.google.com/','Google�ւ̃����N�ł��B<br>�ʃE�B���h�E�ňړ����܂��B');
linkdaySet(3,25,0,'','�����N�͂��܂���B<br>���b�Z�[�W�̂ݕ\�����܂��B<br>�ʐ^������܂��B<br><img src="img/change_ph01.jpg" width="120" height="84" alt="�ʐ^" vspace="5">');
linkdaySet(3,29,3,'www.goo.ne.jp/','goo�ւ̃����N�ł��B<br>�|�b�v�A�b�v�ňړ����܂��B');

linkdaySet(4,8,1,'www.yahoo.co.jp/','Yahoo!�ւ̃����N�ł��B<br>���E�B���h�E�ňړ����܂��B');
linkdaySet(4,15,2,'www.google.com/','Google�ւ̃����N�ł��B<br>�ʃE�B���h�E�ňړ����܂��B');
linkdaySet(4,20,0,'','�����N�͂��܂���B<br>���b�Z�[�W�̂ݕ\�����܂��B<br>�ʐ^������܂��B<br><img src="img/change_ph01.jpg" width="120" height="84" alt="�ʐ^" vspace="5">');
linkdaySet(4,30,3,'www.goo.ne.jp/','goo�ւ̃����N�ł��B<br>�|�b�v�A�b�v�ňړ����܂��B');

linkdaySet(5,5,1,'www.yahoo.co.jp/','Yahoo!�ւ̃����N�ł��B<br>���E�B���h�E�ňړ����܂��B');
linkdaySet(5,15,2,'www.google.com/','Google�ւ̃����N�ł��B<br>�ʃE�B���h�E�ňړ����܂��B');
linkdaySet(5,20,0,'','�����N�͂��܂���B<br>���b�Z�[�W�̂ݕ\�����܂��B<br>�ʐ^������܂��B<br><img src="img/change_ph01.jpg" width="120" height="84" alt="�ʐ^" vspace="5">');
linkdaySet(5,24,3,'www.goo.ne.jp/','goo�ւ̃����N�ł��B<br>�|�b�v�A�b�v�ňړ����܂��B');

linkdaySet(6,1,1,'www.yahoo.co.jp/','Yahoo!�ւ̃����N�ł��B<br>���E�B���h�E�ňړ����܂��B');
linkdaySet(6,10,2,'www.google.com/','Google�ւ̃����N�ł��B<br>�ʃE�B���h�E�ňړ����܂��B');
linkdaySet(6,25,0,'','�����N�͂��܂���B<br>���b�Z�[�W�̂ݕ\�����܂��B<br>�ʐ^������܂��B<br><img src="img/change_ph01.jpg" width="120" height="84" alt="�ʐ^" vspace="5">');
linkdaySet(6,29,3,'www.goo.ne.jp/','goo�ւ̃����N�ł��B<br>�|�b�v�A�b�v�ňړ����܂��B');

linkdaySet(7,8,1,'www.yahoo.co.jp/','Yahoo!�ւ̃����N�ł��B<br>���E�B���h�E�ňړ����܂��B');
linkdaySet(7,15,2,'www.google.com/','Google�ւ̃����N�ł��B<br>�ʃE�B���h�E�ňړ����܂��B');
linkdaySet(7,20,0,'','�����N�͂��܂���B<br>���b�Z�[�W�̂ݕ\�����܂��B<br>�ʐ^������܂��B<br><img src="img/change_ph01.jpg" width="120" height="84" alt="�ʐ^" vspace="5">');
linkdaySet(7,30,3,'www.goo.ne.jp/','goo�ւ̃����N�ł��B<br>�|�b�v�A�b�v�ňړ����܂��B');

linkdaySet(8,5,1,'www.yahoo.co.jp/','Yahoo!�ւ̃����N�ł��B<br>���E�B���h�E�ňړ����܂��B');
linkdaySet(8,15,2,'www.google.com/','Google�ւ̃����N�ł��B<br>�ʃE�B���h�E�ňړ����܂��B');
linkdaySet(8,20,0,'','�����N�͂��܂���B<br>���b�Z�[�W�̂ݕ\�����܂��B<br>�ʐ^������܂��B<br><img src="img/change_ph01.jpg" width="120" height="84" alt="�ʐ^" vspace="5">');
linkdaySet(8,24,3,'www.goo.ne.jp/','goo�ւ̃����N�ł��B<br>�|�b�v�A�b�v�ňړ����܂��B');

linkdaySet(9,1,1,'www.yahoo.co.jp/','Yahoo!�ւ̃����N�ł��B<br>���E�B���h�E�ňړ����܂��B');
linkdaySet(9,10,2,'www.google.com/','Google�ւ̃����N�ł��B<br>�ʃE�B���h�E�ňړ����܂��B');
linkdaySet(9,25,0,'','�����N�͂��܂���B<br>���b�Z�[�W�̂ݕ\�����܂��B<br>�ʐ^������܂��B<br><img src="img/change_ph01.jpg" width="120" height="84" alt="�ʐ^" vspace="5">');
linkdaySet(9,29,3,'www.goo.ne.jp/','goo�ւ̃����N�ł��B<br>�|�b�v�A�b�v�ňړ����܂��B');

linkdaySet(10,8,1,'www.yahoo.co.jp/','Yahoo!�ւ̃����N�ł��B<br>���E�B���h�E�ňړ����܂��B');
linkdaySet(10,15,2,'www.google.com/','Google�ւ̃����N�ł��B<br>�ʃE�B���h�E�ňړ����܂��B');
linkdaySet(10,20,0,'','�����N�͂��܂���B<br>���b�Z�[�W�̂ݕ\�����܂��B<br>�ʐ^������܂��B<br><img src="img/change_ph01.jpg" width="120" height="84" alt="�ʐ^" vspace="5">');
linkdaySet(10,30,3,'www.goo.ne.jp/','goo�ւ̃����N�ł��B<br>�|�b�v�A�b�v�ňړ����܂��B');

linkdaySet(11,5,1,'www.yahoo.co.jp/','Yahoo!�ւ̃����N�ł��B<br>���E�B���h�E�ňړ����܂��B');
linkdaySet(11,15,2,'www.google.com/','Google�ւ̃����N�ł��B<br>�ʃE�B���h�E�ňړ����܂��B');
linkdaySet(11,20,0,'','�����N�͂��܂���B<br>���b�Z�[�W�̂ݕ\�����܂��B<br>�ʐ^������܂��B<br><img src="img/change_ph01.jpg" width="120" height="84" alt="�ʐ^" vspace="5">');
linkdaySet(11,24,3,'www.goo.ne.jp/','goo�ւ̃����N�ł��B<br>�|�b�v�A�b�v�ňړ����܂��B');

linkdaySet(12,1,1,'www.yahoo.co.jp/','Yahoo!�ւ̃����N�ł��B<br>���E�B���h�E�ňړ����܂��B');
linkdaySet(12,10,2,'www.google.com/','Google�ւ̃����N�ł��B<br>�ʃE�B���h�E�ňړ����܂��B');
linkdaySet(12,25,0,'','�����N�͂��܂���B<br>���b�Z�[�W�̂ݕ\�����܂��B<br>�ʐ^������܂��B<br><img src="img/change_ph01.jpg" width="120" height="84" alt="�ʐ^" vspace="5">');
linkdaySet(12,29,3,'www.goo.ne.jp/','goo�ւ̃����N�ł��B<br>�|�b�v�A�b�v�ňړ����܂��B');


//�|�b�v�A�b�v�E�B���h�E�̕��ƍ������w��
winWW = 400;	//��
winHH = 400;	//����
winSCL = "no";	//�X�N���[�� [yes, no]

//���݂̌����牽�����O�܂ŕ\��
bfMonNm = 6;

//���݂̌����牽������܂ŕ\��
afMonNm = 6;

/* ---------- �ݒ�̈� end ---------- */




function dateReset(){
	//���݂̓��t���擾
	nowDate = new Date();
	theYear = nowDate.getFullYear();
	theMonth = nowDate.getMonth();
	theDate = nowDate.getDate();
	theDay = nowDate.getDay();

	//���݂̓��t��ێ�
	nowMonth = theMonth;
	nowYear = theYear;
}

dateReset();


//�����N�̐����擾
linkNum = i;


//�J�����_�[�\�� �Ō�܂�
function createCalen(MM){

	i = 0;
	holiMM = new Array;
	holiDD = new Array;
	holiWEEK = new Array;
	holiDAY = new Array;
	holiTTL = new Array;
	

	theMonth = MM;
	
	if(theMonth >= 12){
		theYear++;
		theMonth = 0;
	} else if(theMonth <= -1){
		theYear--;
		theMonth = 11;
	}
	
	
	//���̓����擾
	monNum = new Date(theYear, theMonth + 1, 0).getDate();
	
	//1���̗j�����擾
	firstDay = new Date(theYear, theMonth, 1).getDay();
	
	//���̏T���擾
	theWeek = Math.ceil((monNum + firstDay) / 7);
	
	
	//�j����ݒ�
	holidaySet(1,1,0,0,'���U');
	holidaySet(1,0,2,1,'���l�̓�');
	holidaySet(2,11,0,0,'�����L�O�̓�');
	
	if(theYear%4 == 0 || theYear%4 == 1){
		holidaySet(3,20,0,0,'�t���̓�');
	}else{
		holidaySet(3,21,0,0,'�t���̓�');
	}
	
	holidaySet(4,29,0,0,'���a�̓�');
	holidaySet(5,3,0,0,'���@�L�O��');
	holidaySet(5,4,0,0,'�݂ǂ�̓�');
	holidaySet(5,5,0,0,'���ǂ��̓�');
	holidaySet(7,0,3,1,'�C�̓�');
	holidaySet(9,0,3,1,'�h�V�̓�');
	
	if(theYear >= 2012 && theYear <= 2044 && theYear%4 == 0){
		holidaySet(9,22,0,0,'�H���̓�');
	}else{
		holidaySet(9,23,0,0,'�H���̓�');
	}
	
	holidaySet(10,0,2,1,'�̈�̓�');
	holidaySet(11,3,0,0,'�����̓�');
	holidaySet(11,23,0,0,'�ΘJ���ӂ̓�');
	holidaySet(12,23,0,0,'�V�c�a����');
	
	//�j���̐����擾
	holiNum = i;
	

	diffY = (theYear - nowYear) * 12;
	diffM = theMonth - nowMonth;

	//���O��{�^���̕\����\��
	if(afMonNm > diffY + diffM){
		rtBtn = '<a href="javascript:showCalen(theMonth + 1); void(0);">��</a>';
	}else{
		rtBtn = '&nbsp;';
	}

	if(bfMonNm > - diffY - diffM){
		ltBtn = '<a href="javascript:showCalen(theMonth - 1); void(0);">��</a>';
	}else{
		ltBtn = '&nbsp;';
	}

	
	//�J�����_�[�\��
	calenData = '';
	calenData += '<table class="calTable">';
	calenData += '<tr>';
	calenData += '<td class="btn">' + ltBtn + '</td>';
	calenData += '<td colspan="5" class="mon"><span class="yView">' + theYear + '�N</span>&nbsp;' + (theMonth + 1) + '��&nbsp;</td>';
	calenData += '<td class="btn">' + rtBtn + '</td>';
	calenData += '</tr>';
	calenData += '<tr>';
	calenData += '<th>SUN</th>';
	calenData += '<th>MON</th>';
	calenData += '<th>TUE</th>';
	calenData += '<th>WED</th>';
	calenData += '<th>THU</th>';
	calenData += '<th>FRI</th>';
	calenData += '<th>SAT</th>';
	calenData += '</tr>';
	
	
	//�d�Ȃ菇�p
	zNum = 32;
	
	dateNum = 0;
	subHoli = "off"
	nationHoli = "off";
	weekSun = 0;
	weekMon = 0;
	weekTue = 0;
	weekWed = 0;
	weekThu = 0;
	weekFri = 0;
	weekSat = 0;
	weekNum = new Array;
	for(i=0; i<=6; i++){
		weekNum[i] = 0;
	}
	
	for(i=0; i<theWeek; i++){
	
		calenData += '<tr>';
	
		for(j=0; j<7; j++){
	
			calenData += '<td';
	
			if(i == 0 && j == firstDay){
				dateNum++;
			}
	
			holiMMDDCk = "off";
			for(k=0; k<holiNum; k++){
	
				holiMMCk = "off";
				holiDDCk = "off";
				if((theMonth + 1) == holiMM[k]){
					holiMMCk = "on";
				}
	
				if(holiMMCk == "on" && dateNum != 0 && holiDD[k] == 0 && holiWEEK[k] - 1 == weekNum[holiDAY[k]] && holiDAY[k] == j){
					holiDDCk = "on";
	
					if(dateNum != 0 && holiMM[k + 1] == holiMM[k] && holiDD[k + 1] == 0 && holiWEEK[k + 1] - 1 == weekNum[holiDAY[k + 1]] && holiDAY[k + 1] == j + 2){
						nationHoli = "on";
					}else if(dateNum != 0 && holiMM[k + 1] == holiMM[k] && holiDD[k + 1] == dateNum + 2 && holiWEEK[k + 1] == 0 && holiDAY[k + 1] == 0){
						nationHoli = "on";
					}
	
				}else if(holiMMCk == "on" && dateNum != 0 && holiDD[k] == dateNum && holiWEEK[k] == 0 && holiDAY[k] == 0){
					holiDDCk = "on";
	
					if(dateNum != 0 && holiMM[k + 1] == holiMM[k] && holiDD[k + 1] == 0 && holiWEEK[k + 1] - 1 == weekNum[holiDAY[k + 1]] && holiDAY[k + 1] == j + 2){
						nationHoli = "on";
					}else if(dateNum != 0 && holiMM[k + 1] == holiMM[k] && holiDD[k + 1] == dateNum + 2 && holiWEEK[k + 1] == 0 && holiDAY[k + 1] == 0){
						nationHoli = "on";
					}
	
				}
	
				if(holiMMCk == "on" && holiDDCk == "on"){
					holiMMDDCk = "on";
					viewTtl = holiTTL[k];
				}
	
			}
	
			if(holiMMDDCk == "on"){
				if(dateNum == theDate && theMonth == nowDate.getMonth() && theYear == nowDate.getFullYear()){
					calenData += ' class="sun today" title="' + viewTtl + '"';
				}else{
					calenData += ' class="sun" title="' + viewTtl + '"';
				}
	
				if(j == 0){
					subHoli = "on";
				}
	
			}else if(nationHoli == "on"){
				if(dateNum == theDate && theMonth == nowDate.getMonth() && theYear == nowDate.getFullYear()){
					calenData += ' class="sun today" title="�����̋x��"';
				}else{
					calenData += ' class="sun" title="�����̋x��"';
				}
	
				nationHoli = "off";
		
			}else if(subHoli == "on"){
				if(dateNum == theDate && theMonth == nowDate.getMonth() && theYear == nowDate.getFullYear()){
					calenData += ' class="sun today" title="�U�֋x��"';
				}else{
					calenData += ' class="sun" title="�U�֋x��"';
				}
	
				subHoli = "off";
		
			}else if(j == 0){
				if(dateNum == theDate && theMonth == nowDate.getMonth() && theYear == nowDate.getFullYear()){
					calenData += ' class="sun today"';
				}else{
					calenData += ' class="sun"';
				}
		
			}else if(j == 6){
				if(dateNum == theDate && theMonth == nowDate.getMonth() && theYear == nowDate.getFullYear()){
					calenData += ' class="sat today"';
				}else{
					calenData += ' class="sat"';
				}
	
			}else if(dateNum == theDate && theMonth == nowDate.getMonth() && theYear == nowDate.getFullYear()){
				calenData += ' class="today"';
			}
	
			calenData += '>';
	
	
			if((i == 0 && j < firstDay) || dateNum > monNum){
				calenData += '&nbsp;';
	
			}else{
				aObj = "";
				if(this['link' + (theMonth + 1) + 'MM']['ok'] == "ok" && this['link' + (theMonth + 1) + 'MM']['d' + dateNum]){
					calenData += '<span style="position:relative; display:block; z-index:' + zNum-- + ';"><span id="d' + (theMonth + 1) + dateNum + '"></span><a href="javascript:linkGo(\'' + (theMonth + 1) + '\',\'' + dateNum + '\'); void(0);" onmouseover="showTtl(\'' + (theMonth + 1) + '\',\'' + dateNum + '\')"  onmouseout="hideTtl(\'' + (theMonth + 1) + '\',\'' + dateNum + '\')" class="linkArea">';
					aObj = "on";
				}

				calenData += dateNum;

				if(aObj == "on"){
					calenData += '</a></span>';
					aObj = "";
				}

				dateNum++;
	
				switch(j){
					case 0: weekNum[0] = ++weekSun; break;
					case 1: weekNum[1] = ++weekMon; break;
					case 2: weekNum[2] = ++weekTue; break;
					case 3: weekNum[3] = ++weekWed; break;
					case 4: weekNum[4] = ++weekThu; break;
					case 5: weekNum[5] = ++weekFri; break;
					case 6: weekNum[6] = ++weekSat; break;
				}
			}
	
			calenData += '</td>';
		}
	
		calenData += '</tr>';
	}
	
	calenData += '<tr>';
	calenData += '<td colspan="7" class="webJozu"><a href="http://www.web-jozu.com/" target="_blank" title="WEB��� - JavaScript�EPHP�EFlash�̃T���v����f�ޏW">&copy;WEB���</a></td>';
	calenData += '</tr>';
	calenData += '</table>';

	return calenData;
}
//�ŏ�����

showCalen(nowMonth);
