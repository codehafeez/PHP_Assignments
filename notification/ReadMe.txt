CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT Primary KEY,
  `user_id` int(11) NOT NULL,
  `message` text,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) 

INSERT INTO `notifications` (`user_id`, `message`) 
VALUES (1, 'This is a test notification');