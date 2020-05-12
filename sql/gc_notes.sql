-- Team Assignment
CREATE DATABASE gc_notes;

-- Connect to DB (Local)
\c gc_notes

-- Create Users Table
CREATE TABLE users (
  id SERIAL NOT NULL PRIMARY KEY,
  display_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

-- Create Speakers Table
CREATE TABLE speakers (
  id SERIAL NOT NULL PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);

-- Create Enum (Season)
CREATE TYPE season AS ENUM ('spring', 'fall');

-- Create Conferences Table
CREATE TABLE conferences (
  id SERIAL NOT NULL PRIMARY KEY,
  current_season season
);

-- Create Notes Table
CREATE TABLE notes (
  id SERIAL NOT NULL PRIMARY KEY,
  body TEXT NOT NULL,
  user_id bigint NOT NULL REFERENCES id ON users,
  speaker_id bigint NOT NULL REFERENCES id ON speakers,
  conference_id bigint NOT NULL REFERENCES id ON conferences  
);

-- Create Conference Speaker Ref. Table
CREATE TABLE conference_speaker (
  id SERIAL NOT NULL PRIMARY KEY,
  conference_id bigint NOT NULL REFERENCES id ON conferences,
  speaker_id bigint NOT NULL REFERENCES id ON speakers
);