<h1>Commands</h1>
<h3>
    To start the application
</h3>
<p>
    Laravel Version: 6.0.0
    PHP Version: 7.3.6
    Create a new folder as dbdata inside .docker
    <br/>
    $ chmod -R 777 ./.docker/dbdata (That's okay use this inside a test, right??)
    <br/>
    <b> $ docker-compose up --build
    to have access to database you have to run inside your docker container for db a 
    $ ifconfig 
    command to get the ip
    and then you can connect to postgres in DBeaver</b>
    <br/>
    to connect
    HOST = the ip that your container give
    Database = blog
    username =  postgres
    pass = postgres
</p>
<p>
I'm using vue2 bcs i've heard that appmax have a expert o.o
so run 
$ npm i
$ npm run dev
and then make the tests
</p>