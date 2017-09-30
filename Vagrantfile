# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "192.168.33.10"
    config.vm.network "forwarded_port", guest: 80, host: 8080
    config.vm.hostname = "scotchbox"
    config.vm.synced_folder "D://xampp//htdocs//", "/var/www/public/", :mount_options => ["dmode=777", "fmode=666"]
 
    # config.vm.synced_folder "D://xampp//htdocs//", "/var/www"

    # Optional NFS. Make sure to remove other synced_folder line too
    #config.vm.synced_folder ".", "/var/www", :nfs => { :mount_options => ["dmode=777","fmode=666"] }

end
