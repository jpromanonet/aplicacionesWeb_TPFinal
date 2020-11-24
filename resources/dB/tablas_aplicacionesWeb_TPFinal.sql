CREATE TABLE `usuarios` (
  `id` bigint PRIMARY KEY AUTO_INCREMENT,
  `rol_id` bigint,
  `email` varchar(191) UNIQUE,
  `password` varchar(191),
  `nombre` varchar(191),
  `apellido` varchar(191),
  `dni` varchar(50),
  `token` varchar(191),
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted` boolean DEFAULT false
);

CREATE TABLE `roles` (
  `id` bigint PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(191) UNIQUE,
  `descripcion` text,
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted` boolean DEFAULT false
);

CREATE TABLE `aulas` (
  `id` bigint PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(191),
  `descripcion` text,
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted` boolean DEFAULT false
);

CREATE TABLE `carreras` (
  `id` bigint PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(191),
  `descripcion` text,
  `tiempo` varchar(30),
  `horas` varchar(30),
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted` boolean DEFAULT false
);

CREATE TABLE `materias` (
  `id` bigint PRIMARY KEY AUTO_INCREMENT,
  `carrera_id` bigint,
  `aula_id` bigint,
  `nombre` varchar(191),
  `descripcion` text,
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted` boolean DEFAULT false
);

CREATE TABLE `materias_usuarios` (
  `id` bigint PRIMARY KEY AUTO_INCREMENT,
  `usuario_id` bigint,
  `materia_id` bigint,
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted` boolean DEFAULT false
);

CREATE TABLE `notas` (
  `id` bigint PRIMARY KEY AUTO_INCREMENT,
  `materia_usuario_id` bigint,
  `calificacion` double,
  `estado` varchar(30),
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted` boolean DEFAULT false
);

CREATE TABLE `mesas_finales` (
  `id` bigint PRIMARY KEY AUTO_INCREMENT,
  `materia_id` bigint,
  `fecha` date,
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted` boolean DEFAULT false
);

CREATE TABLE `inscripciones_mesas` (
  `id` bigint PRIMARY KEY AUTO_INCREMENT,
  `usuario_id` bigint,
  `mesa_final_id` bigint,
  `created_at` timestamp,
  `updated_at` timestamp,
  `deleted` boolean DEFAULT false
);

ALTER TABLE `usuarios` ADD FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

ALTER TABLE `materias_usuarios` ADD FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

ALTER TABLE `notas` ADD FOREIGN KEY (`materia_usuario_id`) REFERENCES `materias_usuarios` (`id`);

ALTER TABLE `materias` ADD FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`);

ALTER TABLE `materias_usuarios` ADD FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`);

ALTER TABLE `materias` ADD FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`id`);

ALTER TABLE `mesas_finales` ADD FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`);

ALTER TABLE `inscripciones_mesas` ADD FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

ALTER TABLE `inscripciones_mesas` ADD FOREIGN KEY (`mesa_final_id`) REFERENCES `mesas_finales` (`id`);
