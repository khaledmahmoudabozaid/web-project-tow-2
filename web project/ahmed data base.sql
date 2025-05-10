-- create database if not exists loge;
-- use loge;
-- create table if not exists users(
-- id_users int  primary key auto_increment,
-- passwerd  varchar (255 ) not null,
-- name varchar (255)not null,
-- email  varchar (255)not null,
-- phone  varchar (255)not null,
-- create_at timestamp default current_timestamp

-- );
-- create table if not exists posts(
-- id_posts  int  primary key auto_increment,
-- titile varchar(1255)not null,
-- content varchar(255),
-- imge varchar(2550),
-- id_user int,
-- create_at timestamp default current_timestamp,
-- updata_at timestamp default current_timestamp,
-- constraint fk_id_user
-- foreign key (id_user)  
-- references users(id_users)

--  on delete cascade
--   on update cascade

-- );
CREATE DATABASE IF NOT EXISTS loge;
USE loge;

-- 1. إنشاء جدول users أولاً
CREATE TABLE IF NOT EXISTS users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    password VARCHAR(255) NOT NULL,  -- تصحيح إملائي
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- تصحيح إملائي
);

-- 2. إنشاء جدول posts ثانياً
CREATE TABLE IF NOT EXISTS posts(
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,  -- تصحيح إملائي وتقليل الحجم
    content TEXT,  -- تغيير إلى TEXT لاحتواء محتوى أطول
    image VARCHAR(255),  -- تصحيح إملائي وتقليل الحجم
    id_users INT,  -- نفس اسم العمود في جدول users
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- تصحيح إملائي
    CONSTRAINT fk_posts_users
    FOREIGN KEY (id_users)
    REFERENCES users(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;  -- التأكد من استخدام InnoDB

-- 3. إنشاء جدول commends أخيراً
CREATE TABLE IF NOT EXISTS commends(
    id_commend INT PRIMARY KEY AUTO_INCREMENT,  -- تصحيح إملائي
    comment TEXT,  -- تصحيح إملائي
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- تصحيح إملائي
    id_users INT,  -- نفس اسم العمود في جدول users
    id_posts INT,  -- نفس اسم العمود في جدول posts
    CONSTRAINT fk_commends_users
    FOREIGN KEY (id_users)
    REFERENCES users(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    
    CONSTRAINT fk_commends_posts 
    FOREIGN KEY (id_posts)
    REFERENCES posts(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
