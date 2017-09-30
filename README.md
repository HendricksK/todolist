## uses slim framework to add,update to do list, uses API, front end found at index api found at public/index
## uses scotchbox/vagrant as development environment
## mysql as database, running within vagrant, requires vagrant, virtualbox 
# https://www.vagrantup.com/
# https://www.virtualbox.org/wiki/Downloads
## uses foundation as front end 
# https://foundation.zurb.com/

## Installation requirements
# install virtualbox
# install vagrant
# you will need to change the Vagrantfile to root to you're specific use case eg 'D://xamp//htdocs'
# vagrant up within todolist root
# cd /var/www/public/todolist/
# composer install
# mysql -uroot -p password is root
# navigate to mygrations folder and copy SQL commands, currently on table in use is toDo_List, and run from within vagrant ssh
# navigate to http://192.168.33.10/ if you get a return of 'ping' you're good to go
# you can then navigate to http://192.168.33.10/todolist/ to play around with a basic front end for the todolist