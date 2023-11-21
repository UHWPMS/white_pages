drop view if exists person_role_view;

create view person_role_view as
    select Person.id as pid, name_of_record, Person.email as per_email,
    Person.phone as per_phone, Department.name as dept_name,
    Role.name as role_name from
    Department join person_department on Department.id = person_department.dept_id
    join Person on person_department.person_id = Person.id join
    Person_Role on Person_Role.person_id = Person.id join
    Role on Role.id = Person_Role.role_id;
