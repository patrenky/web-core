CREATE TABLE IF NOT EXISTS `news` (
    `id` int(10) NOT NULL,
    `title` varchar(100) NOT NULL,
    `time` date NOT NULL,
    `text` text NOT NULL
);

ALTER TABLE `news` ADD PRIMARY KEY (`id`);

ALTER TABLE `news` MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;