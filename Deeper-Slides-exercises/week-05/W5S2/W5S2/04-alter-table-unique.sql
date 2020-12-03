-- File: ~/projects/W5S2/04-alter-table-unique.sql

ALTER TABLE `user`
  ADD CONSTRAINT UNIQUE (email_address);
