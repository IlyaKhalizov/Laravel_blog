create table categories
(
	id int(10) unsigned auto_increment
		primary key,
	name varchar(255) not null,
	created_at timestamp null,
	updated_at timestamp null
)
;

create table comment_replies
(
	id int(10) unsigned auto_increment
		primary key,
	comment_id int(10) unsigned not null,
	is_active int default '0' not null,
	author varchar(255) not null,
	email varchar(255) not null,
	body text not null,
	created_at timestamp null,
	updated_at timestamp null,
	photo varchar(255) not null
)
;

create index comment_replies_comment_id_index
	on comment_replies (comment_id)
;

create table comments
(
	id int(10) unsigned auto_increment
		primary key,
	post_id int(10) unsigned not null,
	is_active int default '0' not null,
	author varchar(255) not null,
	email varchar(255) not null,
	body text not null,
	created_at timestamp null,
	updated_at timestamp null,
	photo varchar(255) not null
)
;

create index comments_post_id_index
	on comments (post_id)
;

alter table comment_replies
	add constraint comment_replies_comment_id_foreign
		foreign key (comment_id) references comments (id)
			on delete cascade
;

create table migrations
(
	migration varchar(255) not null,
	batch int not null
)
;

create table password_resets
(
	email varchar(255) not null,
	token varchar(255) not null,
	created_at timestamp default CURRENT_TIMESTAMP not null
)
;

create index password_resets_email_index
	on password_resets (email)
;

create index password_resets_token_index
	on password_resets (token)
;

create table photos
(
	id int(10) unsigned auto_increment
		primary key,
	file varchar(255) not null,
	created_at timestamp null,
	updated_at timestamp null
)
;

create table posts
(
	id int(10) unsigned auto_increment
		primary key,
	user_id int(10) unsigned not null,
	category_id int not null,
	photo_id int not null,
	title varchar(255) not null,
	body varchar(255) not null,
	created_at timestamp null,
	updated_at timestamp null
)
;

create index posts_category_id_index
	on posts (category_id)
;

create index posts_photo_id_index
	on posts (photo_id)
;

create index posts_user_id_index
	on posts (user_id)
;

alter table comments
	add constraint comments_post_id_foreign
		foreign key (post_id) references posts (id)
			on delete cascade
;

create table roles
(
	id int(10) unsigned auto_increment
		primary key,
	name varchar(255) not null,
	created_at timestamp null,
	updated_at timestamp null
)
;

create table users
(
	id int(10) unsigned auto_increment
		primary key,
	role_id int(10) unsigned null,
	ia_active int default '0' not null,
	name varchar(255) not null,
	email varchar(255) not null,
	password varchar(255) not null,
	remember_token varchar(100) null,
	created_at timestamp null,
	updated_at timestamp null,
	photo_id varchar(255) not null,
	constraint users_email_unique
		unique (email)
)
;

create index users_role_id_index
	on users (role_id)
;

alter table posts
	add constraint posts_user_id_foreign
		foreign key (user_id) references users (id)
			on delete cascade
;


