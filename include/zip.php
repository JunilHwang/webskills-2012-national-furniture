<?
	//zip ��Ŭ���
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/zip.lib.php");
	
	$zip = new zipfile();
	
	//CSV �����
	$file_name = time()."_".rand();
	$fur = fetch("select * from furniture where idx='{$_POST['fidx']}' ");
	$dir1 = "{$_SERVER['DOCUMENT_ROOT']}/data/csv/{$file_name}.csv";
	$dir2 = "{$_SERVER['DOCUMENT_ROOT']}/data/txt/{$file_name}.txt";
	$dir3 = "{$_SERVER['DOCUMENT_ROOT']}/data/furniture/{$fur['file_name']}";
	$name1 = basename($dir1);
	$name2 = basename($dir2);
	$name3 = basename($dir3);
	
	//���Ͼ���
	$member = fetch("select * from member where email='{$_SESSION['email']}' ");
	$content = "�̸�,�̸���,��ȭ��ȣ,�ڵ�����ȣ\r\n";
	$content .= "{$member['name']},{$member['email']},{$member['phone']},{$member['cell']}\r\n";
	$fp = fopen($dir1, "w");
	fwrite($fp, $content);
	fclose($fp);
	
	$content = "
�����з� : {$fur['type']}\r\n
������ : {$fur['fname']}\r\n
�������� : {$fur['num']}\r\n
�������� : {$fur['content']}\r\n
	";
	$fp = fopen($dir2, "w");
	fwrite($fp, $content);
	fclose($fp);
	
	//���ϻ�����
	$size1 = filesize($dir1);
	$size2 = filesize($dir2);
	$size3 = filesize($dir3);
	
	//���� �б�
	$fr = fopen($dir1, "rb", false);
	$data = fread($fr, $size1);
	$zip->addFile($data, $name1);
	fclose($fr);
	
	$fr = fopen($dir2, "rb", false);
	$data = fread($fr, $size2);
	$zip->addFile($data, $name2);
	fclose($fr);
	
	$fr = fopen($dir3, "rb", false);
	$data = fread($fr, $size3);
	$zip->addFile($data, $name3);
	fclose($fr);	
	
	//�����ϻ���
	$zip_dir = "{$_SERVER['DOCUMENT_ROOT']}/data/zip/{$file_name}.zip";
	$fd = fopen($zip_dir, "wb");
	fwrite($fd, $zip->file());
	fclose($fd);
	
	$zip_name = basename($zip_dir);
	$add_sql .= ", zip='{$zip_name}'";
?>