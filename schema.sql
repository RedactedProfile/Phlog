create table accounts
(
  id           char(36)                           not null
    primary key,
  email        varchar(128)                       not null,
  display_name varchar(32)                        not null,
  password     varchar(256)                       not null,
  date_created datetime default CURRENT_TIMESTAMP null,
  date_updated datetime default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP,
  blurb        varchar(256)                       null,
  constraint idx_display_name
    unique (display_name),
  constraint idx_email
    unique (email)
)
  comment 'for all user accounts';

create table posts
(
  id             char(36)                           not null
    primary key,
  author_id      char(36)                           not null,
  title          varchar(64)                        null,
  summary        varchar(128)                       null,
  content        text                               null,
  published      int      default 0                 null,
  date_created   datetime default CURRENT_TIMESTAMP null,
  date_updated   datetime default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP,
  date_published datetime                           null
);

create index idx_published
  on posts (published asc, date_published desc);

