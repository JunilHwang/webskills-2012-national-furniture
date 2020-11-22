CREATE TABLE `admin_menu` (
  `idx` varchar(100) NOT NULL default '',
  `parent` varchar(100) NOT NULL default '',
  `title` varchar(100) NOT NULL default '',
  `od` int(11) NOT NULL default '0'
);

INSERT INTO `admin_menu` VALUES ('site', '0', '관리자 페이지', 0);
INSERT INTO `admin_menu` VALUES ('menu', 'site', '메뉴관리', 0);
INSERT INTO `admin_menu` VALUES ('member', 'site', '회원관리', 1);

CREATE TABLE `board` (
  `idx` int(11) NOT NULL auto_increment,
  `sidx` int(11) NOT NULL default '0',
  `subject` varchar(100) NOT NULL default '',
  `id` varchar(100) NOT NULL default '',
  `content` text NOT NULL,
  `date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`idx`)
) AUTO_INCREMENT=15 ;

INSERT INTO `board` VALUES (1, 15, 'ㄻㄴㅇㄹㅇㅁ', 'ㅁㄴㅇㄻㄴ', 'ㄴㄹㅇㅁㄴㄻㄴ', '0000-00-00');
INSERT INTO `board` VALUES (2, 15, 'ㄻㄴㅇㄻㄴㅇㄹ', 'ㅁㅇㄴㄹㄴㅁ', 'ㄴㅇㅁㄹㄴㅁㅇㄹ', '0000-00-00');
INSERT INTO `board` VALUES (3, 15, 'ㅊㅋㅌㅍㅌㅋㅍ', 'ㅊㅋㅌㅍㅌㅋㅍㅊㅋㅌ', 'ㅋㅊㅍㅋㅊㅌㅍ', '0000-00-00');
INSERT INTO `board` VALUES (4, 15, 'ㅁㄴㅇ', '21312', 'ㅁㄴㅇㄻㄴ', '0000-00-00');
INSERT INTO `board` VALUES (5, 15, 'ㅇㄴㅁ', 'ㅁㄴㅇ', 'ㅇㅁㄴㅇㄴㅁㅇ', '2012-08-28');
INSERT INTO `board` VALUES (6, 15, 'ㅊㅋㅌ', 'ㅋㅌㅊㅋㅌ', 'ㅌㅋㅊㅋㅌㅊㅋ', '2012-08-28');
INSERT INTO `board` VALUES (7, 15, 'ㅁㄴㅁㄴㄹ', 'ㄴㅁㅇㅇㅁㄴ', 'ㅂㅈㄷㅂㅈㄷㅂ', '2012-08-28');
INSERT INTO `board` VALUES (8, 15, 'ㅁㄴㅁㄴㄹ', 'ㄴㅁㅇㅇㅁㄴ', 'ㅂㅈㄷㅂㅈㄷㅂㅌㅊㅋㅌㅊ\r\nㅋㅌㅊ\r\nㅌㅋ\r\nㅊ\r\nㅎㅁ\r\nㄴ\r\nㅅㅎ\r\nㄴㅁㅇ\r\nㅅ\r\nㅂㅁㅅ\r\nㅂㅈ\r\nㅅ\r\nㅈㅂ\r\nㅅㄱㅈㅁ\r\n\r\nㅋㄹ\r\nㅌ\r\nㅎ', '2012-08-28');
INSERT INTO `board` VALUES (10, 15, '스킬스퍼니쳐 홈페이지가 완성되었습니다.', '작성자', '스킬스퍼니쳐 홈페이지가 완성되었습니다.', '2012-08-28');
INSERT INTO `board` VALUES (11, 15, '스킬스퍼니쳐 홈페이지가 완성되었습니다.', '3213', '스킬스퍼니쳐 홈페이지가 완성되었습니다.', '2012-08-28');
INSERT INTO `board` VALUES (12, 15, '스킬스퍼니쳐 홈페이지가 완성되었습니다.', 'ㅁㄻㄹ', '스킬스퍼니쳐 홈페이지가 완성되었습니다.', '2012-08-28');
INSERT INTO `board` VALUES (13, 15, '스킬스퍼니쳐 홈페이지가 완성되었습니다.', 'ㄴㅁㅇㅁㄴ', '스킬스퍼니쳐 홈페이지가 완성되었습니다.', '2012-08-28');
INSERT INTO `board` VALUES (14, 15, '제목', '작성자', '\r\n\r\n\r\n\r\n\r\n\r\n\r\nalert=\\\'ara\\\'</script>\r\nv\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nd\r\ng\r\ndsfs\r\nd\r\nf\r\nv\r\nxcv\r\nc\r\n', '2012-08-29');

CREATE TABLE `default_menu` (
  `idx` varchar(100) NOT NULL default '',
  `parent` varchar(100) NOT NULL default '',
  `title` varchar(100) NOT NULL default '',
  `od` int(11) NOT NULL default '0',
  `lv` char(1) NOT NULL default ''
);

INSERT INTO `default_menu` VALUES ('member', '0', '멤버쉽페이지', 0, '');
INSERT INTO `default_menu` VALUES ('sitemap', 'member', '사이트맵', 0, '');
INSERT INTO `default_menu` VALUES ('mypage', 'member', '마이페이지', 1, '1');

CREATE TABLE `furniture` (
  `idx` int(11) NOT NULL auto_increment,
  `type` varchar(100) NOT NULL default '',
  `fname` varchar(100) NOT NULL default '',
  `num` int(11) NOT NULL default '0',
  `content` text NOT NULL,
  `file` varchar(100) NOT NULL default '',
  `file_name` varchar(100) NOT NULL default '',
  `now` char(1) NOT NULL default '',
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`idx`)
) AUTO_INCREMENT=11 ;


INSERT INTO `furniture` VALUES (1, '책상', '가구입니다.', 10, 'ㄴㅇㄻㄴㅋㄹㅇ', '45.jpg', '1346211554_22964.jpg', '1', '', '');
INSERT INTO `furniture` VALUES (2, '책상', '가구입니다.', 33, '1234231321', '10.jpg', '1346211569_14813.jpg', '1', '', '');
INSERT INTO `furniture` VALUES (3, '의자', 'ㅁㄴㅇㄴㅁ', 8, 'ㅋㅍㅊ', '44.jpg', '1346211613_10877.jpg', '1', '', '');
INSERT INTO `furniture` VALUES (4, '책상', 'ㅋ', 7, 'ㅇㅁㅇ', '9.jpg', '1346211623_23922.jpg', '1', '', '');
INSERT INTO `furniture` VALUES (5, '의자', '의자', 7, '12321313', '51.jpg', '1346211642_17622.jpg', '1', '', '');
INSERT INTO `furniture` VALUES (6, '책상', '책상', 6, 'ㅇㅎㅅㅎㄴ', '23.jpg', '1346211650_13143.jpg', '1', '', '');
INSERT INTO `furniture` VALUES (7, '서랍장', '서랍장', 36, 'ㄹㅋㅎㅁㄻㅈ', '57.jpg', '1346211660_3652.jpg', '1', '', '');
INSERT INTO `furniture` VALUES (8, '옷장', 'ㅁㄴㅇㄻㄴ', 12, 'ㄹㅇㅁㄴ', '40.jpg', '1346212164_29464.jpg', '1', '', '');
INSERT INTO `furniture` VALUES (9, '책상', '가구', 56, '23156456ㅋㅇㄹㄴㅁㅇㄹㅇㄴㅁㄻㄴㄻㄴ', '52.jpg', '1346220724_13454.jpg', '1', '', '');
INSERT INTO `furniture` VALUES (10, '책상', '가구', 11, '내용', '로고심볼.jpg', '1346283338_1147.jpg', '0', '황준일', 'a@a.a');


CREATE TABLE `member` (
  `idx` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `pw` varchar(100) NOT NULL default '',
  `phone` varchar(100) NOT NULL default '',
  `cell` varchar(100) NOT NULL default '',
  `lv` char(1) NOT NULL default '',
  PRIMARY KEY  (`idx`)
) AUTO_INCREMENT=7 ;

INSERT INTO `member` VALUES (1, '관리자', 'skills@furniture.net', '81dc9bdb52d04dc20036dbd8313ed055', '031-505-4938', '010-3011-4883', '3');
INSERT INTO `member` VALUES (2, '황준일', 'a@a.a', '81dc9bdb52d04dc20036dbd8313ed055', '123-1234-1234', '', '1');
INSERT INTO `member` VALUES (3, '테스트', 'a@a.aa', '81dc9bdb52d04dc20036dbd8313ed055', '010-0000-000', '1241256434', '1');
INSERT INTO `member` VALUES (4, '이름름', 'a@a.b', '81dc9bdb52d04dc20036dbd8313ed055', '010-0000-000', '156a48wtwa', '1');
INSERT INTO `member` VALUES (6, '가구관리자', 'furniture@furniture.net', '81dc9bdb52d04dc20036dbd8313ed055', '031-000-0000', '', '2');

CREATE TABLE `menu` (
  `idx` int(11) NOT NULL auto_increment,
  `parent` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `od` int(11) NOT NULL default '0',
  `type` varchar(50) NOT NULL default '',
  `lv` char(1) NOT NULL default '',
  `content` text NOT NULL,
  PRIMARY KEY  (`idx`)
) AUTO_INCREMENT=18 ;

INSERT INTO `menu` VALUES (1, 0, '소개', 0, '', '', '');
INSERT INTO `menu` VALUES (2, 0, '통합검색', 1, '', '', '');
INSERT INTO `menu` VALUES (3, 0, '회원서비스', 2, '', '', '');
INSERT INTO `menu` VALUES (4, 0, '관리자', 3, '', '', '');
INSERT INTO `menu` VALUES (5, 0, '자유게시판', 4, '', '', '');
INSERT INTO `menu` VALUES (6, 1, '인사말', 0, 'HTML', '', '<div class="cont_html">\r\n<img src="/data/html/intro_img.png" alt="인사말" title="인사말" class="fr" />\r\n고객 여러분 안녕하십니까?<br />\r\n주식회사 스킬스가구 대표이사·회장 ○○○ 입니다.<br />\r\n스킬스가구 홈페이지에 오신것을 진심으로 환영합니다.<br />\r\n<br />\r\n저희 스킬스가구는 지난 30여년간 최고의 가구를 만들겠다는<br />\r\n소명아래 미래형디자인창조, 제일주의 추구, 자연을 생각하는<br />\r\n기업이라는 경영이념을 바탕으로 국내 최고의 종합가구<br />\r\n브랜드로 성장,발전해 왔습니다<br />\r\n<br />\r\n앞으로도 이러한 경영철학과 이념을 바탕으로 정직, 겸손, 열정의<br />\r\n사훈아래 우리나라의 주거문화와 경제발전에 이바지 한다는<br />\r\n사명감을 갖고 최선을 다할 것입니다.<br />\r\n<br />\r\n스킬스가구는 고객제일, 품질제일을 실천하며 창조적인 디자인과<br />\r\n자연에 가까운 가구로 고객여러분들의 건강하고 행복한 삶을 지키며<br />\r\n묵묵히 고객 여러분의 곁에 있겠습니다.<br />\r\n</div>');
INSERT INTO `menu` VALUES (7, 1, '대여안내', 1, 'HTML', '', '<div class="cont_html">\r\n<span class="h4 mint">스킬스가구는 대여신청을 24시간 할 수 있습니다.</span><br />\r\n<br />\r\n<span class="h4">○ 대여 신청방법</span><br />\r\n회원과 비회원은 가구를 대여할 수 있습니다. 비회원은 주문번호가 발급되니 주문번호로 조회해 주시길 바랍니다.<br />\r\n대여신청을 하면 대여 현황을 조회 할 수 있습니다. <br />\r\n<br />\r\n<span class="h4">○ 신청가구조회 방법</span><br />\r\n회원은 자동적으로 조회가 가능합니다.<br />\r\n비회원은 주문번호를 입력해야만 조회가 가능합니다.<br />\r\n</div>');
INSERT INTO `menu` VALUES (8, 2, '통합검색', 0, 'search', '', '');
INSERT INTO `menu` VALUES (9, 3, '회원가입', 0, 'join', '1', '');
INSERT INTO `menu` VALUES (10, 3, '가구신청', 1, 'hope', '1', '');
INSERT INTO `menu` VALUES (11, 3, '대여예약/현황조회', 2, 'fur', '1', '');
INSERT INTO `menu` VALUES (12, 4, '신규가구등록', 0, 'add', '2', '');
INSERT INTO `menu` VALUES (13, 4, '신청가구조회', 1, 'cnt', '1', '');
INSERT INTO `menu` VALUES (14, 4, '대여업무조회', 2, 'lend', '1', '');
INSERT INTO `menu` VALUES (15, 5, '자유게시판', 0, 'board', '', '');

CREATE TABLE `reser` (
  `idx` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `number` varchar(5) NOT NULL default '',
  `fname` varchar(100) NOT NULL default '',
  `fidx` varchar(100) NOT NULL default '',
  `re` int(11) NOT NULL default '0',
  `now` char(1) NOT NULL default '',
  `zip` varchar(100) NOT NULL default '',
  `date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`idx`)
) AUTO_INCREMENT=18 ;

INSERT INTO `reser` VALUES (15, '', '', '00488', '서랍장', '7', 38, '2', '', '2013-05-29');
INSERT INTO `reser` VALUES (16, '', '', '72518', '서랍장', '7', 3, '2', '', '2012-11-29');
INSERT INTO `reser` VALUES (17, '황준일', 'a@a.a', '', 'ㅋ', '4', 5, '2', '1346283544_23597.zip', '2012-11-29');

CREATE TABLE `site` (
  `title` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  UNIQUE KEY `title` (`title`)
);

INSERT INTO `site` VALUES ('나눔가구', 'skills@furniture.net');
