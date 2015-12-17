delete from demoevent where date <= adddate(current_date(),-30);
delete from demomode where date <= adddate(current_date(),-30);
delete from devicepower where date <= adddate(current_date(),-30);
delete from flhpower where date <= adddate(current_date(),-30);
delete from sensor where date <= adddate(current_date(),-30);

