insert into Person (id, username,name,name_of_record,job_title, email, alias_email, phone,location,fax,website,publishable,lastApprovedAt,lastApprovedBy) values 
    (1,'masakoi','Masako K Ikeda', 'Masako K Ikeda', 'Exec Editor','masakoi@hawaii.edu','','808-956-8696','UHP','','',true,'2023-11-08',0),
    (2,'suthers','Daniel D Suthers','Daniel D Suthers','Professor','suthers@hawaii.edu','daniel.suthers@hawaii.edu','808-856-3890','UH Manoa','','',true,'2023-11-08',0),
    (3,'psadow','Peter Joseph Sadowski','Peter J Sadowski','Assistant Professor','psadow@hawaii.edu','peter.sadowski@hawaii.edu','808-956-2023','UH Manoa','','',true,'2023-11-08',0),
    (4,'lynettec', 'Lynette Chin','Lynette Y Chin', 'Ofc Asst','lynettec@hawaii.edu','','808-845-9266','Honolulu Community College','808-356-0640','',true,'2023-11-19',0),
    (5,'jmiyash3', 'Jamie Miyashiro', 'Jamie K Miyashiro', 'Sec', 'jmiyash3@hawaii.edu','','808-734-9521','Ilima 212','808-734-9162','',true,'2023-11-19',0),
    (6, 'amo3111', 'Alison Ohata','Alison M Ohata', 'Sec to Chancellor','amo3111@hawaii.edu','alison.ohata@hawaii.edu','808-734-9565','Ilima 213','808-734-9162','',true,'2023-11-20',0)
    ;


insert into person_department (person_id,dept_id) values
    (1,1),
    (2,2),
    (3,2),
    (4,6),
    (5,7),
    (6,7);
