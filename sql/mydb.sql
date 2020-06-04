-- Create Database (Non Essential)
CREATE DATABASE "myBlog"
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'English_United States.1252'
    LC_CTYPE = 'English_United States.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;

-- Connect to the Database
\c myBlog

-- CREATE USER TABLE
CREATE TABLE public."Users"
(
    id bigint NOT NULL GENERATED ALWAYS AS IDENTITY,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    display_name character varying(255) NOT NULL,
    is_admin boolean DEFAULT FALSE,
    PRIMARY KEY (id)
);

-- CREATE POSTS TABLE
CREATE TABLE public."Posts"
(
    id bigint NOT NULL GENERATED ALWAYS AS IDENTITY,
    title character varying(255) NOT NULL,
    body text NOT NULL,
    posted_on date NOT NULL DEFAULT CURRENT_DATE,
    user_id bigint NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_post_user FOREIGN KEY (user_id)
        REFERENCES public."Users" (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE
        NOT VALID
);

-- CREATE COMMENTS TABLE
CREATE TABLE public."Comments"
(
    id bigint NOT NULL GENERATED ALWAYS AS IDENTITY,
    body text NOT NULL,
    posted_on date NOT NULL DEFAULT CURRENT_DATE,
    user_id bigint NOT NULL,
    post_id bigint NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_comment_user FOREIGN KEY (user_id)
        REFERENCES public."Users" (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE
        NOT VALID,
    CONSTRAINT fk_comment_post FOREIGN KEY (post_id)
        REFERENCES public."Posts" (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE
        NOT VALID
);

-- CREATE TAGS TABLE
CREATE TABLE public."Tags"
(
    id bigint NOT NULL GENERATED ALWAYS AS IDENTITY,
    name character varying COLLATE pg_catalog."default" NOT NULL,
    PRIMARY KEY (id)
);

-- CREATE POST/TAGS PIVOT TABLE
CREATE TABLE public."PostTags"
(
    id bigint NOT NULL GENERATED ALWAYS AS IDENTITY,
    post_id bigint NOT NULL,
    tag_id bigint NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_pivot_post_tags FOREIGN KEY (post_id)
        REFERENCES public."Posts" (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE
        NOT VALID,
    CONSTRAINT fk_pivot_tags_post FOREIGN KEY (tag_id)
        REFERENCES public."Tags" (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE
        NOT VALID
);
