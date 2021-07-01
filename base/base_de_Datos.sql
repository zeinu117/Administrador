CREATE SCHEMA `gestor` ;
create table `gestor`.`t_usuarios`(
`id_usuarios` int not null auto_increment,
`nombre` varchar(255) null,
`fechaNacimiento` date null,
`email` varchar(255) null,
`usuario` varchar(255) null,
`password` text null,
`insert` datetime not null default now(),
primary key (`id_usuarios`));

create table `gestor`.`t_categorias`(
`id_categoria` int not null auto_increment,
`id_usuario` int not null,
`nombre` varchar(255) not null,
`fechaInsert` datetime not null default now(),
primary key (`id_categoria`));

alter table `gestor`.`t_categorias`
add index `fkCategoriaUsuario_idx`(`id_usuario`asc);
;
alter table`gestor`.`t_categorias`
add constraint `fkCategoriaUsuario`
foreign key(`id_usuario`)
references `gestor`.`t_usuarios`(`id_usuarios`)
on delete no action
on update no action;

create table `gestor`.`t_archivos`(
`id_archivo` int not null auto_increment,
`id_categoria` int null,
`nombre`varchar(255) null,
`tipo`varchar(255) null,
`ruta` text null,
`fecha`datetime not null default now(),
primary key (`id_archivo`));

alter table `gestor`.`t_archivos`
add index `fkArchivosCategorias_idx`(`id_categoria`asc);
;
alter table`gestor`.`t_archivos`
add constraint `fkArchivosCategorias`
foreign key(`id_categoria`)
references `gestor`.`t_categorias`(`id_categoria`)
on delete no action
on update no action;

alter table `gestor`.`t_archivos`
add column `id_usuario` int not null after `id_archivo`;

alter table `gestor`.`t_archivos`
add index `fkUsuariosArchivos_idx`(`id_usuario`asc);
;
alter table`gestor`.`t_archivos`
add constraint `fkUsuariosArchivos`
foreign key(`id_usuario`)
references `gestor`.`t_usuarios`(`id_usuarios`)
on delete no action
on update no action;
