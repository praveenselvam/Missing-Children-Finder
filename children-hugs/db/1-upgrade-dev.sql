use mc_db;

drop table rel_child_status;

alter table child add ( child_type varchar(15), child_status varchar(15) );  	