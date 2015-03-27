# grant_user.sql
#
# MySQL query for grant user access to database(s)
# 

### grant access ###
	
# localhost grant priveleges for user to database(s)
GRANT ALL PRIVILEGES ON noark5.* TO 'noarkBruker'@'localhost' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON tildatabase.* TO 'noarkBruker'@'localhost' WITH GRANT OPTION;

# global grant priveleges for user to database(s)
# GRANT ALL PRIVILEGES ON noark5.* TO 'noarkBruker' WITH GRANT OPTION;
# GRANT ALL PRIVILEGES ON tildatabase.* TO 'noarkBruker' WITH GRANT OPTION;
