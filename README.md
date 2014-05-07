# Sponge CakePHP

My CakePHP template like [FriendsOfCake/app-template](https://github.com/FriendsOfCake/app-template)

## Usage

    $ (create database)
    $ composer -sdev create-project k1LoW/sponge ProjectName
    $ vi app/Config/.env.defalut (Update SECURITY_SALT, SECURITY_CIPHER_SEED and DATABASE_URL)
    $ cd ProjectName
    $ chmod -R 777 app/tmp
    $ Vendor/bin/cake -app app Migrations.migration run all
