# grant_user.sql
#
# MySQL query for grant user access to database 'noark5'
# 

### grant access ###
	
# localhost grant priveleges for user to database(s)
GRANT ALL PRIVILEGES ON noark5.* TO 'noarkBruker'@'localhost' WITH GRANT OPTION;

# global grant priveleges for user to database(s)
# GRANT ALL PRIVILEGES ON noark5.* TO 'noarkBruker' WITH GRANT OPTION;
