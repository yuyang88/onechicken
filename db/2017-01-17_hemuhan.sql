ALTER TABLE `onechicken`.`chicken` ADD COLUMN `no_get_eggs` int DEFAULT 0 COMMENT '未拾取的蛋的数量' AFTER `create_at`;
ALTER TABLE `onechicken`.`soil` DROP COLUMN `name`, CHANGE COLUMN `henroost_a` `henroost_a` tinyint(4) DEFAULT NULL COMMENT '鸡窝A是否有鸡在住', CHANGE COLUMN `henroost_b` `henroost_b` tinyint(4) DEFAULT NULL COMMENT '鸡窝b中是否有鸡在住';

drop table `user_addition`;
CREATE TABLE `user_addition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '所属用户',
  `money` decimal(10,2) DEFAULT NULL,
  `recommand` int(11) DEFAULT NULL COMMENT '推荐人',
  `eggs` int(11) DEFAULT NULL COMMENT '蛋的数量',
  `chickens` int(11) DEFAULT NULL COMMENT '鸡的数量',
  `soils` int(11) DEFAULT NULL COMMENT '土地的数量',
  `today_eggs` int(11) DEFAULT '0' COMMENT '今天获取蛋的数量',
  `recommand_code` varchar(255) DEFAULT NULL COMMENT '推荐代码',
  `recommand_eggs` int(11) DEFAULT '0' COMMENT '昨天从推荐用户处获取的蛋的数量',
  `recommand_total_eggs` int(11) DEFAULT NULL COMMENT '用户从推荐用户处获取蛋的总数量',
  `total_eggs` int(11) DEFAULT NULL COMMENT '用户总的蛋数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COMMENT='用户附加信息表，重要信息都放在此表中'