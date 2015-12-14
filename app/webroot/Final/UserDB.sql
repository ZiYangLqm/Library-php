/*

Date: 2015-01-4 
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `User`
-- ----------------------------
DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `id` int(11) NOT NULL auto_increment COMMENT '用户ID号',
  `User_user` varchar(25) collate utf8_unicode_ci NOT NULL COMMENT '注册名称',
  `User_password` varchar(32) collate utf8_unicode_ci NOT NULL COMMENT '注册密码',
  `User_sex` varchar(1) collate utf8_unicode_ci NOT NULL COMMENT '性别',
  `User_phone` varchar(15) collate utf8_unicode_ci NOT NULL COMMENT '手机号',
  `User_email` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT 'email',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `User_account` (`User_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO User VALUES ('1', 'admin', '202cb962ac59075b964b07152d234b70', '男', '101', '010');
INSERT INTO User VALUES ('2', 'xydoor', '202cb962ac59075b964b07152d234b70', '男', '1340000', 'xydoor@163.com');
INSERT INTO User VALUES ('3', 'xinyonghu', '202cb962ac59075b964b07152d234b70', '女', '0106926956', 'xinyonghu@163.com');