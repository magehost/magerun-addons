magerun addons
==============

Installation
------------
There are a few options.  You can check out the different options in the [magerun
Github wiki](https://github.com/netz98/n98-magerun/wiki/Modules).

Here's the easiest:

1. Create ~/.n98-magerun/modules/ if it doesn't already exist.

        mkdir -p ~/.n98-magerun/modules/

2. Clone the magerun-addons repository in there

        cd ~/.n98-magerun/modules/ && git clone https://github.com/magehost/magerun-addons.git magehost-addons

3. It should be installed. To see that it was installed, check to see if one of the new commands is in there;

        n98-magerun.phar magehost:helloworld

Commands
--------

### Hello world

Using this command, you can see our fancy hello world, this is used as a template for new commands

    magerun magehost:helloworld

### Lock admin
Using this command, you lock all active admin users, this will also write the locked user_ids in `~/.locked_admin_users`

    magerun magehost:admin:lock

### Unlock admin
Using this command, you unlock admin users locked by us, this will read the ids from `~/.locked_admin_users`

    magerun magehost:admin:unlock

