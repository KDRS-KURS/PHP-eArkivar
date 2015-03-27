# create_user.sql
#
# MySQL query for creating user
# 

##### User section #####
#
# user = 'noarkBruker', password = 'noarkPassord'

# Remove (if exist) existing localhost user
GRANT USAGE ON *.* TO 'noarkBruker'@'localhost';
DROP USER 'noarkBruker'@'localhost';

# Remove (if exist) existing global user
# GRANT USAGE ON *.* TO 'noarkBruker';
# DROP USER 'noarkBruker';

# localhost with masked password
CREATE USER 'noarkBruker'@'localhost' IDENTIFIED BY PASSWORD '*8F366A5873F3EFDA561ED16574EFF6745B0A949C';

# localhost with plain password
# CREATE USER 'noarkBruker'@'localhost' IDENTIFIED BY 'noarkPassord';

# global with masked password
# CREATE USER 'noarkBruker' IDENTIFIED BY PASSWORD '*8F366A5873F3EFDA561ED16574EFF6745B0A949C';

# global with plain password
# CREATE USER 'noarkBruker' IDENTIFIED BY 'noarkPassord';
