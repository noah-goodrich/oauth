DROP TABLE IF EXISTS `oauth2_clients`;

CREATE TABLE `oauth2_clients` (
	`id` varchar(40) NOT NULL PRIMARY KEY,
	`type` enum('confidential', 'public') NOT NULL DEFAULT 'public',
	`name` varchar(150) NOT NULL,
	`secret` varchar(40) NOT NULL,
	`redirect_uri` varchar(255) NULL
) ENGINE=Innodb DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `oauth2_codes`;

CREATE TABLE `oauth2_codes` (
	`code` varchar(40) NOT NULL PRIMARY KEY,
	`client_id` varchar(40) NOT NULL,
	`redirect_uri` varchar(255) NOT NULL,
	`expires` timestamp NULL,
	`scope` varchar(255),
	CONSTRAINT `fk-oauth2_client-oauth2_code` FOREIGN KEY (client_id) REFERENCES oauth2_clients(id) ON DELETE CASCADE
) ENGINE=Innodb DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `oauth2_server_tokens`

CREATE TABLE `oauth2_tokens` (
	`token` varchar(40) NOT NULL PRIMARY KEY,
	`type` enum('access', 'refresh') NOT NULL DEFAULT 'access',
	`client_id` varchar(40) NOT NULL,
	`expires` timestamp NULL,
	`scope` varchar(255) NULL,
	CONSTRAINT `fk-oauth2_client-oauth2_tokens` FOREIGN KEY (client_id) REFERENCES oauth2_clients(id) ON DELETE CASCADE
) ENGINE=Innodb DEFAULT CHARSET=utf8;