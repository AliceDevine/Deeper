#/bin/bash

deeperMessage() {
  echo "DEEPER: $1\n"
}

mysqlQuery() {
  docker exec -it deeper_mysql_1 mysql -u root -proot -e "$1" > /dev/null
}

phpstorm() {
    if [[ $# = 0 ]]
    then
      open -a "PhpStorm"
    else
      [[ $1 = /* ]] && F="$1" || F="$PWD/${1#./}"
      open -a "PhpStorm" -n --args "$F"
    fi
}

if [[ -d ~/projects/W5S2 ]]
then
  deeperMessage "Seems you've already run this script - aborting"
  exit
fi

DIR=`dirname $0`

cd ~/projects/deeper
deeperMessage "Rebooting docker..."
docker-compose down && docker-compose up -d

deeperMessage "Creating database..."
mysqlQuery "CREATE DATABASE IF NOT EXISTS project;"
mysqlQuery "CREATE TABLE IF NOT EXISTS project.product(id INT AUTO_INCREMENT PRIMARY KEY, title VARCHAR(255) NOT NULL);"

deeperMessage "Inserting sample products..."
mysqlQuery "INSERT INTO project.product (title) VALUES ('Macbook Pro'), ('Pencil'), ('Ruler'), ('Coat'), ('Milk');"

deeperMessage "Extracting files..."
unzip ${DIR}/W5S2.zip -d ~/projects/

deeperMessage "Done!  Opening in PhpStorm..."
phpstorm ~/projects/W5S2
