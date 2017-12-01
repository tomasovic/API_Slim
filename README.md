
runscope.com - this tool is usefull to be like a proxy for your api calls. 

something between my api and user. with this tool i can monitor the usage of my api.

using laravel illuminate for database



***** composer.json - update

When we make a new class, autolader dont know where is that class, so we need to update autoload. We need to add that mapping by ourself. 

If you see the namespace Chatter, that maps to folder src/Chatter/. 

"autoload": {
        "psr-4": {
            "Chatter\\" : "src/Chatter/"
        }
    }


Because we are using Eloquent, our every table needs to have created_at and updated_at fields.


For POST
    - HEaders
            Key - Authorization
            Value - Bearer <api_key from the DB>